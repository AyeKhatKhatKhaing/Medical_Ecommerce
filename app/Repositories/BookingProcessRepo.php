<?php


namespace App\Repositories;

use App\Models\BookingProcess;
use App\Models\BookingProcessPage;
use App\Models\QuickStartGuide;
use App\Models\QuickStartPage;
use Illuminate\Http\Request;

class BookingProcessRepo
{

    public function getBookingProcess($id)
    {
        $quickGuide = BookingProcess::findOrFail($id);
        return $quickGuide;
    }

    public function saveBookingProcessPage(Request $request)
    {
       
        if(!existImagePath($request['meta_img'])){
            $request['meta_img'] = null ;
        }else{
            $request['meta_img'] = getImage($request->meta_img)     ;
        }
        $booking_process   = BookingProcessPage::first();
        if($booking_process){
            $booking_process->update($request->all());
        }else{
            $booking_process  = BookingProcessPage::create($request->all());
        }
        return ($booking_process) ? $booking_process : FALSE;
    }

    public function saveBookingProcess(Request $request)
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
          
          $booking_process = $request->ids_en;
        //   dd($booking_process);
          if(isset($booking_process)){
              $detail = BookingProcess::pluck('id')->all();
              $diffs = array_diff($detail, $booking_process);
              if (count($diffs) > 0) {
                  foreach ($diffs as $key => $diff) {
                      BookingProcess::where('id', $diff)->delete();
                  }
              }
          }
  
          if (isset($holder4_arr)) {
              for ($i = 0; $i < count($holder4_arr); $i++) {
                  $data        =   [
                      "img"    => $holder4_arr[$i],
                      "sort"    => $request->sort[$i],
                  ];
  
                
                  if (isset($booking_process) == null) {
                    // dd("save");

                      $booking_process   =   new BookingProcess();
                  } else {
                    // dd("update");
                      $booking_process   =   BookingProcess::get();
                  }
  
                  if (isset($booking_process) == null) {
                      $booking_process->fill($data)->save();
                  } elseif ($i < $booking_process->count()) {
                      $booking_process[$i]->update($data);
                  } else {
                    // dd("save");
                      $booking_process       = new BookingProcess();
                      $booking_process->fill($data)->save();
                  }
              }
          }
    }
}

