<?php


namespace App\Repositories;


use App\Models\FeatureTag;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Yajra\DataTables\Facades\DataTables;

class SliderRepo
{
    public function getSliders($request)
    {
        $sliders      = $this->sliderData($request);
    //    / dd($sliders);
        $datatables = DataTables::of($sliders)
            ->addIndexColumn()
            ->addColumn('no', function ($sliders) {
                return '';
            })

            ->editColumn('name', function($sliders) {
                $name  = $sliders->name;

                return $name;
            })

            ->editColumn('image', function($sliders) {
                if ($sliders->slider_type=='0'){
                    return "<img src='".$sliders->img."' width='150px' height='50px'/>";
                }
                else
                {
                    return "<video  width='150px' height='50px' controls><source src='".$sliders->video."'></video>";
                }
            })

            ->editColumn('type', function($sliders) {
                $type=$sliders->slider_type=='0'? 'Image':'Video';

                return $type;
            })
            ->editColumn('page', function($sliders) {
                $page=$sliders->name_en;

                return $page;
            })
            ->editColumn('link', function($sliders) {
                $link=$sliders->link;

                return $link;
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

            ->editColumn('updated_at', function($sliders) {
                $latest_update   =  '';
                $latest_update  .= $sliders->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-bold'>";
                $latest_update  .= $sliders->updated_by;
                $latest_update  .= "</span>";

                return $latest_update;
            })

            ->editColumn('is_published', function($sliders) {

                $btn       ='';

                $btn      .='<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'".route('sliderChangeStatus')."'";
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
                    $btn .=' <a href="'. route('sliders.edit', $sliders->id) .'" title="Edit Slider"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                    $btn .= '<form action="'.route('sliders.destroy', $sliders->id) .'" method="POST" style="display:inline">
                                                            '.csrf_field().''.method_field("DELETE").'
                                                                <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                                                            </form>
                                                        </div>';
                }else{
                    $btn .=' <a href="'. route('sliders.edit', $sliders->id) .'" title="Edit Slider"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';
                }
          

                return "<div class='action-column'>" . $btn . "</div>";

            })
            ->rawColumns([ 'name', 'image','type', 'page','link','status','is_published', 'updated_at', 'action' ]);


        return $datatables->make(true);
    }

    public function sliderData($request)
    {
        $search   = $request->search;
        $status   = $request->slider_status;
        // dd($status);
        $data     = DB::table('sliders')->select('sliders.*','pages.id as page_id','pages.img as page_img','pages.name_en as name_en')
                    ->leftJoin('pages', 'pages.id','sliders.page_type')
                    ->orderBy('sliders.id', 'DESC');
        // $data = DB::table('sliders');
        if($search){
            $data->Where('sliders.name', 'LIKE', "%$search%");
        }
        // if($status != 'all'){
        //     $data->where('sliders.is_published',$status);
        // }
        return $data->get();
    }

    public function getSlider($id)
    {
        $slider = Slider::findOrFail($id);

        return $slider;
    }

    public function saveSlider(Request $request, $id = null)
    {

        $input                  = $request->all();
//        dd($input);
        if($request->slider_type=='0')
        {
            if(!existImagePath($input['img'])){
                $input['img'] = null ;
            }else{
                $input['img'] = getImage($request->img) ;
            }
        }
        else
        {
            if(!existImagePath($input['video'])){
                $input['video'] = null ;
            }else{
                $input['video'] = getImage($request->video) ;
            }
        }

        if(!existImagePath($input['mobile_img'])){
            $input['mobile_img'] = null ;
        }else{
            $input['mobile_img'] = getImage($request->mobile_img) ;
        }

        if ($id === NULL) {
            $input['user_name']   = auth()->user()->name;
            $slider = new Slider();
        }
        else {
            $input['user_name']   = auth()->user()->name;
            $input['updated_by']   = auth()->user()->name;
            $slider = Slider::findOrFail($id);
        }


        $saved    = $slider->fill($input)->save();

        return ($saved) ? $slider : FALSE;

    }

    public function changeStatus($request)
    {
        $slider   = Slider::findOrFail($request->id);
        $slider->update(['is_published' => !$slider->is_published]);

        return $slider;
    }
    public function deleteSlider($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return ($slider) ? $slider : false;
    }

    public function duration($request)
    {
        $sliders = Slider::all();
        foreach ($sliders as $slider) {
            $slider->update(['time_setup' => $request->duration]);
        }
        return $slider;
    }

}

