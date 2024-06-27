<?php


namespace App\Repositories;

use App\Models\BestPrice;
use App\Models\BestPriceDetail;
use App\Models\Partnership;
use App\Models\PartnershipDetail;
use App\Models\PartnershipHelp;
use Illuminate\Http\Request;

class PartnershipRepo
{

    public function getPartnership($id)
    {
        $partnership = Partnership::findOrFail($id);
        return $partnership;
    }

    public function savepartnership(Request $request)
    {
        //  dd($request);
       
        if(!existImagePath($request['banner_img'])){
            $request['banner_img'] = null ;
        }else{
            $request['banner_img']  = getImage($request->banner_img);
        }
        if(!existImagePath($request['benefit1_img'])){
            $request['benefit1_img'] = null ;
        }else{
            $request['benefit1_img'] = getImage($request->benefit1_img);
        }
        if(!existImagePath($request['benefit2_img'])){
            $request['benefit2_img'] = null ;
        }else{
            $request['benefit2_img'] = getImage($request->benefit2_img);
        }

        if(!existImagePath($request['benefit3_img'])){
            $request['benefit3_img'] = null ;
        }else{
            $request['benefit3_img'] = getImage($request->benefit3_img);
        }

        if(!existImagePath($request['step1_img'])){
            $request['step1_img'] = null ;
        }else{
            $request['step1_img'] = getImage($request->step1_img);
        }

        if(!existImagePath($request['step2_img'])){
            $request['step2_img'] = null ;
        }else{
            $request['step2_img'] = getImage($request->step2_img)     ;
        }

        if(!existImagePath($request['step3_img'])){
            $request['step3_img'] = null ;
        }else{
            $request['step3_img'] = getImage($request->step3_img)     ;
        }

        if(!existImagePath($request['contact_us_img'])){
            $request['contact_us_img'] = null ;
        }else{
            $request['contact_us_img'] = getImage($request->contact_us_img)     ;
        }

        if(!existImagePath($request['meta_img'])){
            $request['meta_img'] = null ;
        }else{
            $request['meta_img'] = getImage($request->meta_img)     ;
        }

       

        $partnership   = Partnership::first();
        if($partnership){
            $partnership->update($request->all());
        }else{
            $partnership  = Partnership::create($request->all());
        }
        return ($partnership) ? $partnership : FALSE;
    }


    public function savePartnershipDetail($request, $id = null)
    { 
       
        // dd($request);
        // if(!existImagePath($request['image'])){
        //     $request['image'] = null ;
        // }else{
        //     $request['image'] = getImage($request->image)     ;
        // }
        $holder4_arr = [];
        foreach ($request['image'] as $key => $horder4) {
            // dd($horder4);
            if (!existImagePath($horder4)) {

                $holder4_arr[$key] = null;
            } else {

                $holder4_arr[$key] = getImage($horder4);
            }
        }
        
        $details = $request->details_ids_en;
        // dd($details);
        if(isset($details)){
            $detail = PartnershipDetail::pluck('id')->all();
            $diffs = array_diff($detail, $details);
            if (count($diffs) > 0) {
                foreach ($diffs as $key => $diff) {
                    PartnershipDetail::where('id', $diff)->delete();
                }
            }
        }
        $title_en = $request->title_en;

        if (isset($title_en)) {
            // dd($title_en);
            for ($i = 0; $i < count($title_en); $i++) {
                $data        =   [
        
                    "title_en"       => $request->title_en[$i],
                    "title_sc"       => $request->title_sc[$i],
                    "title_tc"       => $request->title_tc[$i],
                    "title1_en"    => $request->title1_en[$i],
                    "title1_sc"    => $request->title1_sc[$i],
                    "title1_tc"    => $request->title1_tc[$i],
                    "description_en"    => $request->description_en[$i],
                    "description_tc"    => $request->description_tc[$i],
                    "description_sc"    => $request->description_sc[$i],
                    "link_text_en"    => $request->link_text_en[$i],
                    "link_text_tc"    => $request->link_text_tc[$i],
                    "link_text_sc"    => $request->link_text_sc[$i],
                    "link_en"    => $request->link_en[$i],
                    "link_tc"    => $request->link_tc[$i],
                    "link_sc"    => $request->link_sc[$i],
                    "image"    => $holder4_arr[$i],
                ];

                if (isset($details) == null) {
                    $details   =   new PartnershipDetail();
                } else {
                    $details   =   PartnershipDetail::get();
                }

                if (isset($details[$i])) {
                    $details[$i]->update($data);
                } else {
                    $newDetail = new PartnershipDetail();
                    $newDetail->fill($data)->save();
                }

                // if (isset($details) == null) {
                //     $details->fill($data)->save();
                // } elseif ($i < $details->count()) {
                  
                //     $details[$i]->update($data);
                // } else {
                //     // dd($request)->all();
                //     // $details       = new PartnershipDetail();
                //     // $details->fill($data)->save();
                //     $newDetail = new PartnershipDetail();
                //     $newDetail->fill($data)->save();
                // }

               

                // if (isset($details) == null) {
                //     $details   =   new PartnershipDetail();
                // } else {
                //     $details   =   PartnershipDetail::get();
                // }

                // if (isset($details) == null) {
                //     $details->fill($data)->save();
                // } elseif ($i < $details->count()) {
                  
                //     $details[$i]->update($data);
                // } else {
                //     $details       = new PartnershipDetail();
                //     $details->fill($data)->save();
                // }
            }
        }
    }


    public function savepartnershipHelp($request, $id = null)
    { 
    
        $partnership_help = $request->help_ids_en;
        if(isset($partnership_help)){
            $detail = PartnershipHelp::pluck('id')->all();
            $diffs = array_diff($detail, $partnership_help);
            if (count($diffs) > 0) {
                foreach ($diffs as $key => $diff) {
                    PartnershipHelp::where('id', $diff)->delete();
                }
            }
        }

        $help_subtitle_en = $request->help_subtitle_en;

        if (isset($help_subtitle_en)) {
            for ($i = 0; $i < count($help_subtitle_en); $i++) {
                $data        =   [
        
                    "help_subtitle_en"       => $request->help_subtitle_en[$i],
                    "help_subtitle_sc"       => $request->help_subtitle_sc[$i],
                    "help_subtitle_tc"       => $request->help_subtitle_tc[$i],
                    "help_description_en"    => $request->help_description_en[$i],
                    "help_description_tc"    => $request->help_description_tc[$i],
                    "help_description_sc"    => $request->help_description_sc[$i],
                    [$i],
                ];

               

                if (isset($partnership_help) == null) {
                    $partnership_help   =   new PartnershipHelp();
                } else {
                    $partnership_help   =   PartnershipHelp::get();
                }

                if (isset($partnership_help) == null) {
                    $partnership_help->fill($data)->save();
                } elseif ($i < $partnership_help->count()) {
                    $partnership_help[$i]->update($data);
                } else {
                    $partnership_help       = new PartnershipHelp();
                    $partnership_help->fill($data)->save();
                }
            }
        }
    }

}

