<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentTypeFormRequest;
use App\Repositories\PaymentTypeRepo;
use Illuminate\Support\Facades\Validator;

class PaymentTypeController extends Controller
{
    public $page = 'payment_type';

    protected $paymentTypeRepo;

    public function __construct(PaymentTypeRepo $paymentTypeRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->paymentTypeRepo = $paymentTypeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page = $this->page;
        // dd($page);
        return view('admin.payment-type.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->paymentTypeRepo->getPaymentType($request);
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
        return view('admin.payment-type.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'publishable_key' => 'required',
            'secret_key' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors);
        }
        $this->paymentTypeRepo->savePaymentType($request);

        return redirect('admin/payment-type')->with('flash_message', 'Payment type added!');
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
        $page      = $this->page;
        $payment_type = $this->paymentTypeRepo->getPaymentTypeData($id);
        return view('admin.payment-type.edit', compact('payment_type', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentTypeFormRequest $request, $id)
    {

        // $validator = Validator::make(request()->all(), [
        //     'name' => 'required',
        //     'publishable_key' => 'required',
        //     'secret_key' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     $errors = $validator->errors();
        //     // return redirect()->back()->withErrors($errors);
        //     return redirect()->route("payment-type.edit", $id)->withErrors($errors);
        // }
        $payment_type = $this->paymentTypeRepo->savePaymentType($request, $id);

        if ($payment_type) {
            return redirect()->route("payment-type.index")->with('flash_message', 'Payment Type Update!');
        } else {
            return redirect()->route("payment-type.edit", $id)->with('flash_message', 'Payment Type update!');
        }

        return redirect('admin/payment-type')->with('flash_message', 'Payment Type updated!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->paymentTypeRepo->changeStatus($request);

        return response()->json(["success" => true]);
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
        $this->paymentTypeRepo->deletePaymentType($id);

        return redirect('admin/payment-type')->with('flash_message', 'Payment type deleted!');
    }
}
