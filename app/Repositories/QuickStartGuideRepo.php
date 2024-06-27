<?php


namespace App\Repositories;

use App\Models\QuickStartGuide;
use App\Models\QuickStartPage;
use Illuminate\Http\Request;

class QuickStartGuideRepo
{

    public function getQuickGuide($id)
    {
        $quickGuide = QuickStartGuide::findOrFail($id);
        return $quickGuide;
    }

    public function saveQuickGuidePage(Request $request)
    {
       
        if(!existImagePath($request['meta_img'])){
            $request['meta_img'] = null ;
        }else{
            $request['meta_img'] = getImage($request->meta_img)     ;
        }
        $quick_start   = QuickStartPage::first();
        if($quick_start){
            $quick_start->update($request->all());
        }else{
            $quick_start  = QuickStartPage::create($request->all());
        }
        return ($quick_start) ? $quick_start : FALSE;
    }

    public function saveQuickGuide(Request $request)
    {
       
        //   dd($request->all());
          $holder4_arr = [];
          foreach ($request['img'] as $key => $horder4) {
              // dd($horder4);
              if (!existImagePath($horder4)) {
  
                  $holder4_arr[$key] = null;
              } else {
  
                  $holder4_arr[$key] = getImage($horder4);
              }
          }
          
          $quick_start_guide = $request->ids_en;
        //   dd($quick_start_guide);
          if(isset($quick_start_guide)){
              $detail = QuickStartGuide::pluck('id')->all();
              $diffs = array_diff($detail, $quick_start_guide);
              if (count($diffs) > 0) {
                  foreach ($diffs as $key => $diff) {
                      QuickStartGuide::where('id', $diff)->delete();
                  }
              }
          }
  
          if (isset($holder4_arr)) {
              for ($i = 0; $i < count($holder4_arr); $i++) {
                  $data        =   [
                      "img"    => $holder4_arr[$i],
                      "sort"    => $request->sort[$i],
                  ];
  
                
                  if (isset($quick_start_guide) == null) {
                    // dd("save");

                      $quick_start_guide   =   new QuickStartGuide();
                  } else {
                    // dd("update");
                      $quick_start_guide   =   QuickStartGuide::get();
                  }
  
                  if (isset($quick_start_guide) == null) {
                      $quick_start_guide->fill($data)->save();
                  } elseif ($i < $quick_start_guide->count()) {
                      $quick_start_guide[$i]->update($data);
                  } else {
                    // dd("save");
                      $quick_start_guide       = new QuickStartGuide();
                      $quick_start_guide->fill($data)->save();
                  }
              }
          }
    }
}

