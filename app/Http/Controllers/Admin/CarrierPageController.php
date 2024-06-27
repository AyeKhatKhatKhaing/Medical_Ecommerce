<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CarrierPageRepo;
use App\Http\Requests\Admin\CarrierPageRequest;

class CarrierPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $page  = 'carrier-page';

    protected $carrier_page_repo;

    public function __construct(CarrierPageRepo $carrier_page_repo)
    {
        $this->middleware('role:admin');
        $this->carrier_page_repo = $carrier_page_repo;
    }
    public function index()
    {
        //
        $page  = $this->page;
        $carrier       = $this->carrier_page_repo->getCarrierPageData();

        return view('admin.carrier-page.edit', compact('carrier', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarrierPageRequest $request)
    {
        //
        $this->carrier_page_repo->saveCarrierPageInfo($request);

        return redirect('admin/carrier-page')->with('flash_message', 'Carrier page information added!');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarrierPageRequest $request, $id)
    {
        //
        $this->carrier_page_repo->saveCarrierPageInfo($request, $id);
        return redirect('admin/carrier-page')->with('flash_message', 'Carrier page information updated!');
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
