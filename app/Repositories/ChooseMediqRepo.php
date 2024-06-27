<?php


namespace App\Repositories;


use App\Models\ChooseMediq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ChooseMediqRepo
{

    public function chooseMediqData($request)
    {
        $search   = $request->search;

        $data     = DB::table('choose_mediqs')
            ->orderBy('choose_mediqs.id', 'DESC')
            ->whereNull('choose_mediqs.deleted_at');

        return $data->get();
    }

    public function getChooseMediq($id)
    {
        $choose_mediq = ChooseMediq::findOrFail($id);

        return $choose_mediq;
    }

    public function saveChooseMediq(Request $request)
    {
        $input                  = $request->all();
        if(!existImagePath($input['main_img'])){
            $input['main_img'] = null ;
        }else{
            $input['main_img'] = getImage($request->main_img)     ;
        }
        if(!existImagePath($input['shopping_guide_img'])){
            $input['shopping_guide_img'] = null ;
        }else{
            $input['shopping_guide_img'] = getImage($request->shopping_guide_img)     ;
        }
        if(!existImagePath($input['quick_start_guide_icon'])){
            $input['quick_start_guide_icon'] = null ;
        }else{
            $input['quick_start_guide_icon'] = getImage($request->quick_start_guide_icon)     ;
        }

        if(!existImagePath($input['booking_icon'])){
            $input['booking_icon'] = null ;
        }else{
            $input['booking_icon'] = getImage($request->booking_icon) ;
        }

        $choose_mediq   = ChooseMediq::first();

        if($choose_mediq){

            $choose_mediq->update($input);
        }else{
            $choose_mediq  = ChooseMediq::create($input);

        }

        return ($choose_mediq) ? $choose_mediq : FALSE;

    }

    public function deleteChooseMediq($id)
    {
        $choose_mediq = ChooseMediq::findOrFail($id);
        $choose_mediq->delete();

        return ($choose_mediq) ? $choose_mediq : false;
    }

    public function translateContent($request)
    {
        $val=request()->val;
        $main_title=request()->main_title;
        $main_content=request()->main_content;
        $shopping_guide_title=request()->shopping_guide_title;
        $quick_start_guide_title=request()->quick_start_guide_title;
        $quick_start_guide_content=request()->quick_start_guide_content;
        $booking_title=request()->booking_title;
        $booking_content=request()->booking_content;

        $fields=[
            "main_title"=>$main_title,
            "main_content"=>$main_content,
            "shopping_guide_title"=>$shopping_guide_title,
            "quick_start_guide_title"=>$quick_start_guide_title,
            "quick_start_guide_content"=>$quick_start_guide_content,
            "booking_title"=>$booking_title,
            "booking_content"=>$booking_content,
        ];
        $data = autoTranslate($val,$fields);
        return $data;

    }


}

