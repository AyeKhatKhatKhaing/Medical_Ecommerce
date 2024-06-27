<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\RecipientRepo;
use App\Http\Controllers\Controller;

class RecipientController extends Controller
{
    public $page  = 'recipient';

    protected $recipientRepo;

    public function __construct(RecipientRepo $recipientRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->recipientRepo = $recipientRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;
        // $data = Recipient::leftJoin('products', function ($join) {
        //     return $join->on('products.id', '=', 'recipients.product_id');
        // })->leftJoin('customers', function ($join) {
        //     return $join->on('customers.id', '=', 'recipients.customer_id');
        // })->select('products.name_en', 'customers.first_name', 'customers.phone', 'customers.id', DB::raw('count(recipients.id) as total_recipient'), DB::raw('sum(recipients.each_recipient_amount)+ sum(recipients.add_on_prices) as total_price'))->groupBy('recipients.customer_id')->get();

        $data = Recipient::leftJoin('products', function ($join) {
            return $join->on('products.id', '=', 'recipients.product_id');
        })->leftJoin('customers', function ($join) {
            return $join->on('customers.id', '=', 'recipients.customer_id');
        })->select('products.name_en', 'recipients.*')->get();

        // dd($data);
        return view('admin.recipient.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->recipientRepo->getRecipient($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.recipient.create');
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

        $requestData = $request->all();

        Recipient::create($requestData);

        return redirect('admin/recipient')->with('flash_message', 'Recipient added!');
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
        $recipient = Recipient::where('id', $id)->get();

        return view('admin.recipient.show', compact('recipient'));
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
        $recipient = Recipient::findOrFail($id);

        return view('admin.recipient.edit', compact('recipient'));
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

        $requestData = $request->all();

        $recipient = Recipient::findOrFail($id);
        $recipient->update($requestData);

        return redirect('admin/recipient')->with('flash_message', 'Recipient updated!');
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
        Recipient::destroy($id);

        return redirect('admin/recipient')->with('flash_message', 'Recipient deleted!');
    }
}
