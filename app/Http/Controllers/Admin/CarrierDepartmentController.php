<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CarrierDepartment;
use App\Repositories\CarrierDepartmentRepo;
use Illuminate\Http\Request;

class CarrierDepartmentController extends Controller
{
    public $page = 'carrier_department';

    protected $carrierDepartmentRepo;

    public function __construct(CarrierDepartmentRepo $carrierDepartmentRepo)
    {
        $this->middleware('role:admin');
        $this->carrierDepartmentRepo = $carrierDepartmentRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page    = $this->page;
        
        return view('admin.carrier-department.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->carrierDepartmentRepo->getCarrierDepartment($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page   = $this->page;

        return view('admin.carrier-department.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->carrierDepartmentRepo->saveCarrierDepartment($request);

        return redirect('admin/carrier-department')->with('flash_message', 'CarrierDepartment added!');
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
        $page              = $this->page;
        $carrierdepartment = CarrierDepartment::findOrFail($id);

        return view('admin.carrier-department.show', compact('carrierdepartment', 'page'));
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
        $page              = $this->page;
        $carrierdepartment = $this->carrierDepartmentRepo->getCarrierDepartmentData($id);

        return view('admin.carrier-department.edit', compact('carrierdepartment', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $carrierdepartment = $this->carrierDepartmentRepo->saveCarrierDepartment($request, $id);

        if($carrierdepartment) {
            return redirect()->route("carrier-department.index")->with('flash_message', 'Carrier Department Update!');
        }
        else {
            return redirect()->route("carrier-department.edit",$id)->with('flash_message', 'Carrier Department update!');

        }

        return redirect('admin/carrier-department')->with('flash_message', 'CarrierDepartment updated!');
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
        $this->carrierDepartmentRepo->deleteCarrierDepartment($id);

        return redirect('admin/carrier-department')->with('flash_message', 'CarrierDepartment deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->carrierDepartmentRepo->changeStatus($request);
        return response()->json(["success" => true]);
    }

    public function carrierTranslate(Request $request)
    {
        $data = $this->carrierDepartmentRepo->translateCarrer($request);
        return $data;
    }

}
