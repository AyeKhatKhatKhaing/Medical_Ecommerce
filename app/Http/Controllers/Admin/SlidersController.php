<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderFormRequest;
use App\Models\Page;
use App\Models\Slider;
use App\Repositories\SliderRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    use CheckPermission;

    public $page  =  'slider';

    protected $sliderRepo;

    public function __construct(SliderRepo $sliderRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->sliderRepo = $sliderRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.sliders.index', compact('page'));
    }


    public function getData(Request $request)
    {
        return $this->sliderRepo->getSliders($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;
        $pages = Page::all();

        return view('admin.sliders.create', compact('page','pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SliderFormRequest $request)
    {
        if($request->slider_type=='0')
        {
            $this->validate($request, [
                'img' => 'required',
            ]);
        }
        else
        {
            $this->validate($request, [
                'video' => 'required',
            ]);
        }
        $this->sliderRepo->saveSlider($request);

        return redirect('admin/sliders')->with('flash_message', 'Slider added!');
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
        $slider = Slider::findOrFail($id);

        return view('admin.sliders.show', compact('slider'));
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
        $page  = $this->page;
        $slider  = $this->sliderRepo->getSlider($id);
        $pages = Page::all();

        return view('admin.sliders.edit', compact('slider', 'page','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SliderFormRequest $request, $id)
    {

        $sliders = $this->sliderRepo->saveSlider($request,$id);

        if($sliders) {
            return redirect()->route("sliders.index")->with('flash_message', 'Slider Update!');
        }
        else {
            return redirect()->route("sliders.edit",$id)->with('flash_message', 'Slider update!');

        }

        return redirect('admin/sliders')->with('flash_message', 'Slider updated!');
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
        $this->sliderRepo->deleteSlider($id);

        return redirect('admin/sliders')->with('flash_message', 'Slider deleted!');
    }
    public function statusChange(Request $request)
    {
        $status = $this->sliderRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
    public function duration(Request $request)
    {
        $this->sliderRepo->duration($request);
        return redirect('admin/sliders')->with('flash_message', 'Success!');
    }
}

