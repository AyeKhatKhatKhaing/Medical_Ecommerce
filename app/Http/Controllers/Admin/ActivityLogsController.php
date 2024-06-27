<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ActivityLogRepo;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogsController extends Controller
{
    public $page  = 'activitylog';

    protected $activityLogRepo;

    public function __construct(ActivityLogRepo $activityLogRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        
        $this->activityLogRepo = $activityLogRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.activitylogs.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->activityLogRepo->getActivityLogs($request);
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
        $page        = $this->page;
        $activitylog = Activity::findOrFail($id);

        return view('admin.activitylogs.show', compact('activitylog', 'page'));
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
        Activity::destroy($id);

        return redirect('admin/activitylogs')->with('flash_message', 'Activity deleted!');
    }
}
