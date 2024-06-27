<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Http\Requests;
use App\Models\Carrier;
use Illuminate\Http\Request;
use App\Models\CarrierDepartment;
use App\Repositories\CarrierRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareerFormRequest;

class CarrierController extends Controller
{
    public $page = 'carrier';

    protected $carrierRepo;

    public function __construct(CarrierRepo $carrierRepo)
    {
        $this->middleware('role:admin');
        $this->carrierRepo = $carrierRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page = $this->page;
        // $carrier = Carrier::first();
        // dd($carrier->area);
        return view('admin.carrier.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->carrierRepo->getCarrier($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page                = $this->page;
        $carrierdepartments  = CarrierDepartment::pluck('name_en', 'id');
        $employment_types    = config('mediq.employment_types_en');
        $minimum_experience  = config('mediq.exp_level_en');
        $area = Area::get();

        return view('admin.carrier.create', compact('carrierdepartments', 'employment_types', 'minimum_experience','area', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CareerFormRequest $request)
    {
        $this->carrierRepo->saveCarrier($request);

        return redirect('admin/carrier')->with('flash_message', 'Carrier added!');
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
        $carrier = Carrier::findOrFail($id);

        return view('admin.carrier.show', compact('carrier'));
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
        $page                = $this->page;
        $carrierdepartments  = CarrierDepartment::pluck('name_en', 'id');
        $employment_types    = config('mediq.employment_types_en');
        $minimum_experience  = config('mediq.exp_level_en');
        $area = Area::get();
        $carrier             = Carrier::findOrFail($id);

        return view('admin.carrier.edit', compact('carrier', 'carrierdepartments', 'employment_types', 'minimum_experience','area', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CareerFormRequest $request, $id)
    {   
        $carrier = $this->carrierRepo->saveCarrier($request, $id);

        if($carrier) {
            return redirect()->route("carrier.index")->with('flash_message', 'Carrier Update!');
        }
        else {
            return redirect()->route("carrier.edit",$id)->with('flash_message', 'Carrier update!');

        }

        return redirect('admin/carrier')->with('flash_message', 'Carrier updated!');
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
        $this->carrierRepo->deleteCarrier($id);

        return redirect('admin/carrier')->with('flash_message', 'Carrier deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->carrierRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }


}
