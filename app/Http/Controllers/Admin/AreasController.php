<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\AreaFormRequest;
use App\Models\Area;
use App\Models\District;
use App\Repositories\AreaRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class AreasController extends Controller
{

    use CheckPermission;

    public $page  =  'area';

    protected $areaRepo;

    public function __construct(AreaRepo $areaRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin,manager,marketing');
        $this->checkPermission();
        $this->areaRepo = $areaRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page      =  $this->page;
        $districts = District::get(['id', 'name_en']);

        return view('admin.areas.index', compact('page', 'districts'));
    }

    public function getData(Request $request)
    {
        return $this->areaRepo->getAreas($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page      = $this->page;
        $districts = District::pluck('name_en', 'id');

        return view('admin.areas.create', compact('page', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AreaFormRequest $request)
    {
        $this->areaRepo->saveArea($request);

        return redirect('admin/areas')->with('flash_message', 'Area added!');
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
        $area = Area::findOrFail($id);

        return view('admin.areas.show', compact('area'));
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
        $page      = $this->page;
        $area      = $this->areaRepo->getArea($id);
        $districts = District::pluck('name_en', 'id');

        return view('admin.areas.edit', compact('area', 'page', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AreaFormRequest $request, $id)
    {
        $areas = $this->areaRepo->saveArea($request, $id);

        if ($areas) {
            return redirect()->route("areas.index")->with('flash_message', 'Area Update!');
        } else {
            return redirect()->route("areas.edit", $id)->with('flash_message', 'Area update!');
        }

        return redirect('admin/areas')->with('flash_message', 'Area updated!');
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
        $this->areaRepo->deleteArea($id);

        return redirect('admin/areas')->with('flash_message', 'Area deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->areaRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
    public function area_translate(Request $request)
    {
        $data = $this->areaRepo->translateArea($request);
        return $data;
    }
}
