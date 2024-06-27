<?php


namespace App\Repositories;

use App\Models\DashboardSlider;
use App\Models\SeoPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Yajra\DataTables\Facades\DataTables;

class SeoRepo
{
    public function getSeoDate($request)
    {
        $seo      = $this->seoData($request);
        $datatables = DataTables::of($seo)
            ->addIndexColumn()
            ->addColumn('no', function ($seo) {
                return '';
            })

            // ->editColumn('title', function ($seo) {
            //     $name  = $seo->title;

            //     return $name;
            // })
            ->editColumn('title', function ($seo) {
                return isset($seo->title) ? config('mediq.page_title')[$seo->title] : '-';
            })
            ->editColumn('img', function ($seo) {
                $img = '';
                if(!empty($seo->meta_image)){
                    $img=  asset($seo->meta_image);
                }
                else{
                    $img = asset('backend/media/blank-image.svg');
                }
               
                return "<img src='" . $img . "'style='width: 132px;height: 50px !important;'/>";
            })

        
            ->addColumn('action', function ($seo) {
                $btn  = '';

                $btn .= ' <a href="' . route('seo-page.edit', $seo->id) . '" title="Edit Slider"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                // $btn .= '<form action="'.route('seo-page.destroy', $seo->id) .'" method="POST" style="display:inline">
                //                                         '.csrf_field().''.method_field("DELETE").'
                //                                             <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                //                                         </form>
                //                                     </div>';

                return "<div class='action-column'>" . $btn . "</div>";
            })
            ->rawColumns(['title', 'img', 'type', 'page', 'updated_at', 'action']);


        return $datatables->make(true);
    }

    public function seoData($request)
    {
        $search   = $request->search;
        $status   = $request->status;
        $data     = DB::table('seo_pages')->select('seo_pages.*')
            ->orderBy('seo_pages.id', 'DESC');
        if (isset($status) && $status != 'all') {
            $data = $data->where('is_published', $status);
        }

        if ($search) {
            $data = $data->Where('title_en', 'LIKE', "%$search%");
        }

        if (isset($status) && $status != 'all' && isset($search)) {
            $data = $data->where('is_published', $status)->Where('title_en', 'LIKE', "%$search%");
        }
        return $data->get();
    }

    public function getSeo($id)
    {
        $slider = SeoPage::findOrFail($id);

        return $slider;
    }

    public function saveSeo(Request $request, $id = null)
    {

        if (!existImagePath($request['meta_image'])) {
            $request['meta_image'] = null;
        } else {
            $request['meta_image'] = getImage($request->meta_image);
        }

        if ($id === NULL) {
            $slider = new SeoPage();
        } else {
            $slider = SeoPage::findOrFail($id);
        }
        $saved    = $slider->fill($request->all())->save();
        return ($saved) ? $saved : FALSE;
    }

    public function changeStatus($request)
    {
        $slider   = SeoPage::findOrFail($request->id);
        $slider->update(['is_published' => !$slider->is_published]);

        return $slider;
    }
    public function deleteSlider($id)
    {
        $slider = SeoPage::findOrFail($id);
        $slider->delete();

        return ($slider) ? $slider : false;
    }

    public function translateContent($request)
    {
        $val       = $request->val;
        $title      = $request->title;
        $description   = $request->description;

        $fields    = [
            "title"    => $title,
            "description" => $description,
        ];

        $data      = autoTranslate($val, $fields);

        return $data;
    }
}
