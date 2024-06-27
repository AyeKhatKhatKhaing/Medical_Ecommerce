<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Traits\CheckPermission;
use App\Http\Controllers\Controller;
use App\Repositories\DashboardSliderRepo;

class DashboardSliderController extends Controller
{
    use CheckPermission;

    public $page  =  'dashboard-slider';

    protected $sliderRepo;

    public function __construct(DashboardSliderRepo $sliderRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->sliderRepo = $sliderRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page  = $this->page;
        return view('admin.dashboard-slider.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->sliderRepo->getSliders($request);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page  = $this->page;
        return view('admin.dashboard-slider.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->sliderRepo->saveSlider($request);

        return redirect('admin/dashboard-sliders')->with('flash_message', 'Slider added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $page  = $this->page;
        $slider  = $this->sliderRepo->getSlider($id);
        return view('admin.dashboard-slider.edit', compact('slider', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $sliders = $this->sliderRepo->saveSlider($request,$id);
        return redirect('admin/dashboard-sliders')->with('flash_message', 'Slider updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->sliderRepo->deleteSlider($id);

        return redirect('admin/dashboard-sliders')->with('flash_message', 'Slider deleted!');
    }
    public function statusChange(Request $request)
    {
        $status = $this->sliderRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function dashboard_translate(Request $request)
    {

        $data = $this->sliderRepo->translateContent($request);

        return $data;

    }
}
