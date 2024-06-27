<?php


namespace App\Repositories;

use App\Models\BestPrice;
use App\Models\BestPriceDetail;
use Illuminate\Http\Request;

class BestPriceRepo
{

    public function getBestPrice($id)
    {
        $bestPrice = BestPrice::findOrFail($id);
        return $bestPrice;
    }

    public function saveBestPrice(Request $request)
    {
       
        if(!existImagePath($request['banner_img'])){
            $request['banner_img'] = null ;
        }else{
            $request['banner_img']  = getImage($request->banner_img)     ;
        }
        if(!existImagePath($request['service_img'])){
            $request['service_img'] = null ;
        }else{
            $request['service_img'] = getImage($request->service_img)     ;
        }
        if(!existImagePath($request['meta_img'])){
            $request['meta_img'] = null ;
        }else{
            $request['meta_img'] = getImage($request->meta_img)     ;
        }

       

        $bestPrice   = BestPrice::first();
        if($bestPrice){
            $bestPrice->update($request->all());
        }else{
            $bestPrice  = BestPrice::create($request->all());
        }
        return ($bestPrice) ? $bestPrice : FALSE;
    }


    public function saveBestPriceDetail($request, $id = null)
    { 
        // dd($request->all());
        $holder4_arr = [];
        foreach ($request['best_price_img'] as $key => $horder4) {
            // dd($horder4);
            if (!existImagePath($horder4)) {

                $holder4_arr[$key] = null;
            } else {

                $holder4_arr[$key] = getImage($horder4);
            }
        }
        // dd($holder4_arr);
        // $request['rewords_img'] = $holder4_arr;
        
        $best_price_detail = $request->best_price_ids_en;
        if(isset($best_price_detail)){
            $detail = BestPriceDetail::pluck('id')->all();
            $diffs = array_diff($detail, $best_price_detail);
            if (count($diffs) > 0) {
                foreach ($diffs as $key => $diff) {
                    BestPriceDetail::where('id', $diff)->delete();
                }
            }
        }
        $best_price_title_en = $request->best_price_title_en;

        if (isset($best_price_title_en)) {
            for ($i = 0; $i < count($best_price_title_en); $i++) {
                $data        =   [
        
                    "best_price_title_en"       => $request->best_price_title_en[$i],
                    "best_price_title_sc"       => $request->best_price_title_sc[$i],
                    "best_price_title_tc"       => $request->best_price_title_tc[$i],
                    "best_price_text_en"    => $request->best_price_text_en[$i],
                    "best_price_text_sc"    => $request->best_price_text_sc[$i],
                    "best_price_text_tc"    => $request->best_price_text_tc[$i],
                    "best_price_description_en"    => $request->best_price_description_en[$i],
                    "best_price_description_tc"    => $request->best_price_description_tc[$i],
                    "best_price_description_sc"    => $request->best_price_description_sc[$i],
                    "best_price_img"    => $holder4_arr[$i],
                ];

               

                if (isset($best_price_detail) == null) {
                    $best_price_detail   =   new BestPriceDetail();
                } else {
                    $best_price_detail   =   BestPriceDetail::get();
                }

                if (isset($best_price_detail) == null) {
                    $best_price_detail->fill($data)->save();
                } elseif ($i < $best_price_detail->count()) {
                  
                    $best_price_detail[$i]->update($data);
                } else {
                    $best_price_detail       = new BestPriceDetail();
                    $best_price_detail->fill($data)->save();
                }
            }
        }
    }

}

