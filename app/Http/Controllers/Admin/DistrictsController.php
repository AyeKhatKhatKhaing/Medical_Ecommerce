<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\DistrictFormRequest;
use App\Models\District;
use App\Models\Territory;
use App\Repositories\DistrictRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class DistrictsController extends Controller
{

    use CheckPermission;

    public $page  =  'district';

    protected $districtRepo;

    public function __construct(DistrictRepo $districtRepo)
    {
        $this->middleware('role:admin,manager,marketing');
        $this->checkPermission();
        $this->districtRepo = $districtRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page        = $this->page;
        $territories = Territory::get(['id', 'name_en']);

        return view('admin.districts.index',compact('page', 'territories'));
    }

    public function getData(Request $request)
    {
        return $this->districtRepo->getDistricts($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page        = $this->page;
        $territories = Territory::pluck('name_en', 'id');

        return view('admin.districts.create',compact('page','territories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(DistrictFormRequest $request)
    {
        $this->districtRepo->saveDistrict($request);

        return redirect('admin/districts')->with('flash_message', 'District added!');
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
        $district = District::findOrFail($id);

        return view('admin.districts.show', compact('district'));
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
        $page        = $this->page;
        $district    = $this->districtRepo->getDistrict($id);
        $territories = Territory::pluck('name_en', 'id');

        return view('admin.districts.edit', compact('district', 'page','territories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(DistrictFormRequest $request, $id)
    {
        $districts = $this->districtRepo->saveDistrict($request,$id);

        if($districts) {
            return redirect()->route("districts.index")->with('flash_message', 'District Update!');
        }
        else {
            return redirect()->route("districts.edit",$id)->with('flash_message', 'District update!');
        }

        return redirect('admin/districts')->with('flash_message', 'District updated!');
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
        $this->districtRepo->deleteDistrict($id);

        return redirect('admin/districts')->with('flash_message', 'District deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->districtRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function district_translate(Request $request)
    {
        $data=$this->districtRepo->translateContent($request);
        return $data;

    }

}

