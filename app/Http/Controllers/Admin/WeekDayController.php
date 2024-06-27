<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WeekDay;
use Illuminate\Http\Request;

class WeekDayController extends Controller
{
    public function addweekDay(Request $request)
    {
        $locationId = $request->location_id;
        $week_day = $request->weekDay;

        $booking_times = [];
        if ($request->bookingtimes) {
            $bookings = $request->bookingtimes;
            $bookings = json_decode($bookings, true);
            if (count($bookings) > 0) {
                foreach ($bookings as $key => $booking) {
                    $booking_times[] = $booking['value'];
                }
            }
        }


        $is_time = true;
        if (in_array("AM", $booking_times) && in_array("PM", $booking_times)) {
            $is_time = false;
        }


        $is_record = WeekDay::where('location_id', $locationId)->where('week_days', $week_day)->exists();
        if ($is_record) {
            $weekdayInfo = WeekDay::where('week_days', $week_day)->where('location_id', $locationId)->first();
            $data = [
                'booking_times' => $request->bookingtimes ? $booking_times : [],
                'is_time' => $is_time,
            ];
            $weekdayInfo->update($data);
            return response()->json($weekdayInfo);
        } else {
            $data = [
                'booking_times' => $request->bookingtimes ? $booking_times : [],
                'is_time' => $is_time,
                'week_days' => $week_day,
                'location_id' => $locationId
            ];

            $response = WeekDay::create($data);

            return response()->json($response);
        }
    }
}
