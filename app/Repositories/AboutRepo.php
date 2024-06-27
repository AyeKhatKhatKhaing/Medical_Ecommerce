<?php


namespace App\Repositories;


use App\Models\About;
use App\Models\Empower;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class AboutRepo
{
    public function getAbouts($request)
    {
        $abouts      = $this->aboutData($request);
        $datatables = DataTables::of($abouts)
            ->addIndexColumn()
            ->addColumn("no", function ($abouts) {
                return '';
            })

            ->editColumn('banner_photo', function($abouts) {
                return "<img src='".$abouts->banner_img."' width='80px' height='50px' />";

            })

            ->editColumn('banner_title', function($abouts) {
                $banner_title  = Str::limit($abouts->banner_title_en,30);

                return $banner_title;
            })
            ->editColumn('cooperation_photo', function($abouts) {
                return "<img src='".$abouts->cooperation_img."' width='80px' height='50px' />";

            })

            ->editColumn('cooperation_title', function($abouts) {
                $cooperation_title  = Str::limit($abouts->cooperation_title_en,30);

                return $cooperation_title;
            })
            ->editColumn('group_photo', function($abouts) {
                return "<img src='".$abouts->group_img."' width='80px' height='50px' />";

            })

            ->editColumn('group_title', function($abouts) {
                $group_title  = Str::limit($abouts->group_title_en,30);

                return $group_title;
            })


            ->editColumn('updated_at', function($abouts) {
                $latest_update   =  '';
                $latest_update  .= $abouts->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-bold'>";
                $latest_update  .= $abouts->updated_by ? $abouts->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })

            ->addColumn('action', function ($abouts) {
                $btn  = '';

                $btn .=' <a href="'. route('about.edit', $abouts->id) .'" title="Edit About"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="'.route('about.destroy', $abouts->id) .'" method="POST" style="display:inline">
                                                        '.csrf_field().''.method_field("DELETE").'
                                                            <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                                                        </form>
                                                    </div>';

                return "<div class='action-column'>" . $btn . "</div>";

            })
            ->rawColumns([ 'banner_photo', 'banner_title','cooperation_photo', 'cooperation_title', 'group_photo','group_title', 'updated_at', 'action' ]);


        return $datatables->make(true);
    }

    public function aboutData($request)
    {
        $search   = $request->search;
        $data     = About::orderBy('abouts.id', 'DESC')->whereNull('deleted_at');
        return $data->get();
    }

    public function getAbout($id)
    {
        $about = About::findOrFail($id);

        return $about;
    }

    public function saveAbout(Request $request)
    {
        $input                  = $request->all();
        // dd($input);
        if(!existImagePath($input['banner_img'])){
            $input['banner_img'] = null ;
        }else{
            $input['banner_img'] = getImage($request->banner_img)     ;
        }
        if(!existImagePath($input['cooperation_img'])){
            $input['cooperation_img'] = null ;
        }else{
            $input['cooperation_img'] = getImage($request->cooperation_img)     ;
        }
        if(!existImagePath($input['group_img'])){
            $input['group_img'] = null ;
        }else{
            $input['group_img'] = getImage($request->group_img)     ;
        }

        if(!existImagePath($input['meta_img'])){
            $input['meta_img'] = null ;
        }else{
            $input['meta_img'] = getImage($request->meta_img) ;
        }

        if(!existImagePath($input['empower_logo1'])){
            $input['empower_logo1'] = null ;
        }else{
            $input['empower_logo1'] = getImage($request->empower_logo1) ;
        }
        if(!existImagePath($input['empower_logo2'])){
            $input['empower_logo2'] = null ;
        }else{
            $input['empower_logo2'] = getImage($request->empower_logo2) ;
        }
        if(!existImagePath($input['empower_logo3'])){
            $input['empower_logo3'] = null ;
        }else{
            $input['empower_logo3'] = getImage($request->empower_logo3) ;
        }
        if(!existImagePath($input['empower_logo4'])){
            $input['empower_logo4'] = null ;
        }else{
            $input['empower_logo4'] = getImage($request->empower_logo4) ;
        }
        if(!existImagePath($input['footer_img1'])){
            $input['footer_img1'] = null ;
        }else{
            $input['footer_img1'] = getImage($request->footer_img1) ;
        }
        if(!existImagePath($input['footer_img2'])){
            $input['footer_img2'] = null ;
        }else{
            $input['footer_img2'] = getImage($request->footer_img2) ;
        }

        if(!existImagePath($input['footer_img3'])){
            $input['footer_img3'] = null ;
        }else{
            $input['footer_img3'] = getImage($request->footer_img3) ;
        }

        if ($request->has('holder4')) {

            foreach ($request['holder4'] as $key => $horder4) {

                if (!existImagePath($horder4)) {

                    $holder4_arr[$key] = null;
                } else {

                    $holder4_arr[$key] = getImage($horder4);
                }
            }
        } else {

            $holder4_arr = NULL;
        }
        // $holder4_arr = [];

        // // if(isset($request['holder4'])){
        //     foreach ($request['holder4'] as $key => $horder4) {
        //         // dd($horder4);
        //         if (!existImagePath($horder4)) {
    
        //             $holder4_arr[$key] = null;
        //         } else {
    
        //             $holder4_arr[$key] = getImage($horder4);
        //         }
        //     }

        //      $input['rewords_img'] = $holder4_arr;

        // // }else{
        // //     $input['rewords_img'] = "";
        // // }
       
       $input['rewords_img'] = $holder4_arr;
        
        // dd($holder4_arr);


        $about   = About::first();
        $empower   = Empower::first();
        

        if($about){
            $about->update($input);
        }else{
            $about  = About::create($input);

        }
        if($empower){
            // $empower   = Empower::first();
            $empower->empower_title_en = $input['empower_title_en'];
            $empower->empower_title_tc = $input['empower_title_tc'];
            $empower->empower_title_sc = $input['empower_title_sc'];
    
            $empower->empower_text1_en = $input['empower_text1_en'];
            $empower->empower_text2_en = $input['empower_text2_en'];
            $empower->empower_text3_en = $input['empower_text3_en'];
            $empower->empower_text4_en = $input['empower_text4_en'];

            $empower->empower_text1_tc = $input['empower_text1_tc'];
            $empower->empower_text2_tc = $input['empower_text2_tc'];
            $empower->empower_text3_tc = $input['empower_text3_tc'];
            $empower->empower_text4_tc = $input['empower_text4_tc'];

            $empower->empower_text1_sc = $input['empower_text1_sc'];
            $empower->empower_text2_sc = $input['empower_text2_sc'];
            $empower->empower_text3_sc = $input['empower_text3_sc'];
            $empower->empower_text4_sc = $input['empower_text4_sc'];

            $empower->empower_sub_title1_en = $input['empower_sub_title1_en'];
            $empower->empower_sub_title2_en = $input['empower_sub_title2_en'];
            $empower->empower_sub_title3_en = $input['empower_sub_title3_en'];
            $empower->empower_sub_title4_en = $input['empower_sub_title4_en'];

            $empower->empower_sub_title1_tc = $input['empower_sub_title1_tc'];
            $empower->empower_sub_title2_tc = $input['empower_sub_title2_tc'];
            $empower->empower_sub_title3_tc = $input['empower_sub_title3_tc'];
            $empower->empower_sub_title4_tc = $input['empower_sub_title4_tc'];
          
            $empower->empower_sub_title1_sc = $input['empower_sub_title1_sc'];
            $empower->empower_sub_title2_sc = $input['empower_sub_title2_sc'];
            $empower->empower_sub_title3_sc = $input['empower_sub_title3_sc'];
            $empower->empower_sub_title4_sc = $input['empower_sub_title4_sc'];

            $empower->empower_logo1 = $input['empower_logo1'];
            $empower->empower_logo2 = $input['empower_logo2'];
            $empower->empower_logo3 = $input['empower_logo3'];
            $empower->empower_logo4 = $input['empower_logo4'];

    
            $empower->update();
        }
        else{
            $empower = New Empower();
            $empower->empower_title_en = $input['empower_title_en'];
            $empower->empower_title_tc = $input['empower_title_tc'];
            $empower->empower_title_sc = $input['empower_title_sc'];
    
            $empower->empower_text1_en = $input['empower_text1_en'];
            $empower->empower_text2_en = $input['empower_text2_en'];
            $empower->empower_text3_en = $input['empower_text3_en'];
            $empower->empower_text4_en = $input['empower_text4_en'];

            $empower->empower_text1_tc = $input['empower_text1_tc'];
            $empower->empower_text2_tc = $input['empower_text2_tc'];
            $empower->empower_text3_tc = $input['empower_text3_tc'];
            $empower->empower_text4_tc = $input['empower_text4_tc'];

            $empower->empower_text1_sc = $input['empower_text1_sc'];
            $empower->empower_text2_sc = $input['empower_text2_sc'];
            $empower->empower_text3_sc = $input['empower_text3_sc'];
            $empower->empower_text4_sc = $input['empower_text4_sc'];

            $empower->empower_sub_title1_en = $input['empower_sub_title1_en'];
            $empower->empower_sub_title2_en = $input['empower_sub_title2_en'];
            $empower->empower_sub_title3_en = $input['empower_sub_title3_en'];
            $empower->empower_sub_title4_en = $input['empower_sub_title4_en'];

            $empower->empower_sub_title1_tc = $input['empower_sub_title1_tc'];
            $empower->empower_sub_title2_tc = $input['empower_sub_title2_tc'];
            $empower->empower_sub_title3_tc = $input['empower_sub_title3_tc'];
            $empower->empower_sub_title4_tc = $input['empower_sub_title4_tc'];
          
            $empower->empower_sub_title1_sc = $input['empower_sub_title1_sc'];
            $empower->empower_sub_title2_sc = $input['empower_sub_title2_sc'];
            $empower->empower_sub_title3_sc = $input['empower_sub_title3_sc'];
            $empower->empower_sub_title4_sc = $input['empower_sub_title4_sc'];

            $empower->empower_logo1 = $input['empower_logo1'];
            $empower->empower_logo2 = $input['empower_logo2'];
            $empower->empower_logo3 = $input['empower_logo3'];
            $empower->empower_logo4 = $input['empower_logo4'];

            $empower->save();
        }

        return ($about) ? $about : FALSE;

    }

    public function deleteAbout($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return ($about) ? $about : false;
    }

    public function translateContent($request)
    {
        $val=request()->val;
        $banner_title=request()->banner_title;
        $banner_description=request()->banner_description;
        $cooperation_title=request()->cooperation_title;
        $cooperation_description=request()->cooperation_description;
        $group_title=request()->group_title;
        $group_description=request()->group_description;
        $mission_and_vision_description=request()->mission_and_vision_description;
        $meta_title=request()->meta_title;
        $meta_description=request()->meta_description;
        $fields=[
            "banner_title"=>$banner_title,
            "banner_description"=>$banner_description,
            "cooperation_title"=>$cooperation_title,
            "cooperation_description"=>$cooperation_description,
            "group_title"=>$group_title,
            "group_description"=>$group_description,
            "mission_and_vision_description"=>$mission_and_vision_description,
            "meta_title"=>$meta_title,
            "meta_description"=>$meta_description,
        ];
        $data = autoTranslate($val,$fields);
        return $data;

    }


}

