<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\TimeSlotTagFormRequest;
use App\Models\TimeSlotTag;
use App\Repositories\TimeSlotTagRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class TimeSlotTagController extends Controller
{

    use CheckPermission;

    public $timeSlotTag  =  'time_slot_tag';

    protected $timeSlotTagRepo;

    public function __construct(TimeSlotTagRepo $timeSlotTagRepo)
    {
        $this->middleware('role:admin,manager,marketing');
        $this->checkPermission();
        $this->timeSlotTagRepo = $timeSlotTagRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page    = $this->timeSlotTag;

        return view('admin.time-slot-tag.index',compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->timeSlotTagRepo->getTimeSlotTags($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page   = $this->timeSlotTag;

        return view('admin.time-slot-tag.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TimeSlotTagFormRequest $request)
    {
        $this->timeSlotTagRepo->saveTimeSlotTag($request);

        return redirect('admin/time-slot-tag')->with('flash_message', 'TimeSlotTag added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $timeSlotTag = TimeSlotTag::findOrFail($id);

        return view('admin.time-slot-tag.show', compact('timeSlotTag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $page     = $this->timeSlotTag;
        $time_slot_tag  = $this->timeSlotTagRepo->getTimeSlotTag($id);

        return view('admin.time-slot-tag.edit', compact('time_slot_tag', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(TimeSlotTagFormRequest $request, $id)
    {
        $timeSlotTags = $this->timeSlotTagRepo->saveTimeSlotTag($request,$id);

        if($timeSlotTags) {
            return redirect()->route("time-slot-tag.index")->with('flash_message', 'TimeSlotTag Update!');
        }
        else {
            return redirect()->route("time-slot-tag.edit",$id)->with('flash_message', 'TimeSlotTag update!');

        }

        return redirect('admin/time-slot-tag')->with('flash_message', 'TimeSlotTag updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->timeSlotTagRepo->deleteTimeSlotTag($id);

        return redirect('admin/time-slot-tag')->with('flash_message', 'TimeSlotTag deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->timeSlotTagRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
    public function time_slot_tag_translate(Request $request)
    {

        $data = $this->timeSlotTagRepo->translateContent($request);

        return $data;

    }

}
