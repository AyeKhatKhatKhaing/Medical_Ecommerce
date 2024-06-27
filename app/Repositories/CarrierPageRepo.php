<?php

namespace App\Repositories;


use App\Models\CarrierPage;
use Illuminate\Http\Request;

class CarrierPageRepo
{
    public function saveCarrierPageInfo(Request $request, $id = null)
    {

        $input    = $request->all();

        if(!existImagePath($input['meta_img'])){
            $input['meta_img'] = null ;
        }else{
            $input['meta_img'] = getImage($request->meta_img);
        }

        if(!existImagePath($input['img'])){
            $input['img'] = null ;
        }else{
            $input['img'] = getImage($request->img);
        }

        // if(!existImagePath($input['bank2_logo'])){
        //     $input['bank2_logo'] = null ;
        // }else{
        //     $input['bank2_logo'] = getImage($request->bank2_logo);
        // }

        // if(!existImagePath($input['bank3_logo'])){
        //     $input['bank3_logo'] = null ;
        // }else{
        //     $input['bank3_logo'] = getImage($request->bank3_logo);
        // }

        $carrier_page   = CarrierPage::first();
        if($carrier_page){
            $carrier_page->update($request->all());
        }else{
            $carrier_page  = CarrierPage::create($request->all());

        }
       
        $saved    = $carrier_page->fill($input)->save();

        return ($saved) ? $carrier_page : FALSE;
    }

    public function getCarrierPageData()
    {
        $carrier_page = CarrierPage::first();

        return $carrier_page;
    }

}
