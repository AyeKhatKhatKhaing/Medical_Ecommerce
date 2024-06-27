<?php


namespace App\Repositories;

use App\Models\DashboardSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Yajra\DataTables\Facades\DataTables;

class DashboardSliderRepo
{
    public function getSliders($request)
    {
        $sliders      = $this->sliderData($request);
        $datatables = DataTables::of($sliders)
            ->addIndexColumn()
            ->addColumn('no', function ($sliders) {
                return '';
            })

            ->editColumn('name', function($sliders) {
                $name  = $sliders->title_en;

                return $name;
            })

            // ->editColumn('img', function($sliders) {
            //         return "<img src='".$sliders->img."' width='50px' height='50px'/>";
            // })
            ->editColumn('img', function ($sliders) {
                $img = isset($sliders->img) ? asset($sliders->img) : asset('/backend/media/blank-image.svg');
                return "<img src='" . $img . "'style='width: 132px;height: 50px !important;'/>";
            })

            ->editColumn('status', function($sliders) {
                $status='';

                if($sliders->is_published){
                    $status .='<span class="badge bg-primary" style="padding:5px 8px;">Active</span>';
                }else{

                    $status .='<span class="badge bg-danger" style="padding:5px 8px;">Inactive</span>';
                }

                return $status;
            })

          
            ->editColumn('is_published', function($sliders) {

                $btn       ='';

                $btn      .='<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'".route('dashboard.slider.changeStatus')."'";
                if($sliders->is_published){
                    $btn  .='<input data-id="'.$sliders->id.'" onclick="statusChange('.$sliders->id.','.$route .')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0" checked >';
                    $btn  .='</div>';
                }else{
                    $btn  .='<input data-id="'.$sliders->id.'" onclick="statusChange('.$sliders->id.','. $route .')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0"  >';
                    $btn  .='</div>';

                }

                return $btn;
            })

            ->addColumn('action', function ($sliders) {
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }
                $btn  = '';
                if($checkAdminRole == true){
                    $btn .=' <a href="'. route('dashboard-sliders.edit', $sliders->id) .'" title="Edit Slider"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                    $btn .= '<form action="'.route('dashboard-sliders.destroy', $sliders->id) .'" method="POST" style="display:inline">
                                                            '.csrf_field().''.method_field("DELETE").'
                                                                <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                                                            </form>
                                                        </div>';
                }
                else{
                    $btn .=' <a href="'. route('dashboard-sliders.edit', $sliders->id) .'" title="Edit Slider"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';
                }
             

                return "<div class='action-column'>" . $btn . "</div>";

            })
            ->rawColumns([ 'name', 'img','type', 'page','link','status','is_published', 'updated_at', 'action' ]);


        return $datatables->make(true);
    }

    public function sliderData($request)
    {
        $search   = $request->search;
        $data     = DB::table('dashboard_sliders')->select('dashboard_sliders.*')
                    ->where('dashboard_sliders.deleted_at', null)
                    ->orderBy('dashboard_sliders.id', 'DESC')
                    ;
        if($search){
            $data->Where('dashboard_sliders.title_en', 'LIKE', "%$search%");
        }
        return $data->get();
    }

    public function getSlider($id)
    {
        $slider = DashboardSlider::findOrFail($id);

        return $slider;
    }

    public function saveSlider(Request $request, $id = null)
    {

        if(!existImagePath($request['img'])){
            $request['img'] = null ;
        }else{
            $request['img'] = getImage($request->img);
        }

            if ($id === NULL) {
                $slider = new DashboardSlider();
            }
            else {
                $slider = DashboardSlider::findOrFail($id);
            }
        $saved    = $slider->fill($request->all())->save();
        return ($saved) ? $saved : FALSE;

    }

    public function changeStatus($request)
    {
        $slider   = DashboardSlider::findOrFail($request->id);
        $slider->update(['is_published' => !$slider->is_published]);

        return $slider;
    }
    public function deleteSlider($id)
    {
        $slider = DashboardSlider::findOrFail($id);
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

