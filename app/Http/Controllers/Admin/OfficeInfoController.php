<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfficeInfoRequest;
use App\Repositories\OfficeInfoRepo;

class OfficeInfoController extends Controller
{
    public $page  = 'office_information';

    protected $officeInfoRepo;

    public function __construct(OfficeInfoRepo $officeInfoRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->officeInfoRepo = $officeInfoRepo;
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
        return view('admin.office_info.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->officeInfoRepo->getOfficeInfo($request);
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
        return view('admin.office_info.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeInfoRequest $request)
    {
        //
        $this->officeInfoRepo->saveOfficeinfo($request);
        return redirect('admin/office-info')->with('flash_message', 'Office information added!');
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
        $page          = $this->page;
        $office_info   = $this->officeInfoRepo->getofficeInfoData($id);
        return view('admin.office_info.edit', compact('office_info', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeInfoRequest $request, $id)
    {
        //
        $this->officeInfoRepo->saveOfficeInfo($request, $id);
        return redirect('admin/office-info')->with('flash_message', 'Office Information updated!');
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
    }
}
