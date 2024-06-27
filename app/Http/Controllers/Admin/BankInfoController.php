<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BankInfoRequest;
use App\Models\BankInfo;
use App\Repositories\BankInfoRepo;
use Illuminate\Http\Request;

class BankInfoController extends Controller
{
    public $page  = 'bank_information';

    protected $bankInfoRepo;

    public function __construct(BankInfoRepo $bankInfoRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin,marketing');
        $this->bankInfoRepo = $bankInfoRepo;
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
        $bank_info       = $this->bankInfoRepo->getbankInfoData();

        return view('admin.bank_info.edit', compact('bank_info', 'page'));
    }

    public function getData(Request $request)
    {
        return $this->bankInfoRepo->getBankInfo($request);
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
        return view('admin.bank_info.create', compact('page'));

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
        $this->bankInfoRepo->saveBankInfo($request);

        return redirect('admin/bank-info')->with('flash_message', 'Bank information added!');
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
        $page       = $this->page;
        $bank_info       = $this->bankInfoRepo->getbankInfoData($id);

        return view('admin.bank_info.edit', compact('bank_info', 'page'));
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
        $this->bankInfoRepo->saveBankInfo($request, $id);
        return redirect('admin/bank-info')->with('flash_message', 'Bank Information updated!');
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
