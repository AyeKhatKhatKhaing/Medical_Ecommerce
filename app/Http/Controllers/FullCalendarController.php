<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {

        $locationId = $request->location_id;
        if (!$request->ajax()) {


            $events = Event::where('location_id', $locationId)->get(['id', 'title', 'close_date']);
            
            foreach ($events as $key => $event) {
                $event->start = $event->close_date;
                $event->backgroundColor = "#ff595f";
                $event->borderColor = "#ff595f";
            }

            // dd($data);

            return response()->json($events);
        }

        return view('fullcalender');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {

        switch ($request->type) {
            case 'add':
                $is_exist = Event::where('close_date', $request->close_date)->where('location_id', $request->location_id)->exists();
                if (!$is_exist) {
                    $event = Event::create([
                        'title'         => $request->title,
                        'close_date'    => $request->close_date,
                        'week_days'     => $request->week_days,
                        'location_id'   => $request->location_id
                    ]);
                }else{
                    $event = Event::where('close_date', $request->close_date)->where('location_id', $request->location_id)->first();
                }

                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Event::find($request->id);
                if($event){
                    $event->delete();
                }

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
}
