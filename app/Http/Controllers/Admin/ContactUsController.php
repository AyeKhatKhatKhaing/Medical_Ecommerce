<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Repositories\ContactUsRepo;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $page  =  'contact_us';

    protected $contactUsRepo; 

    public function __construct(ContactUsRepo $contactUsRepo)
    {
        $this->middleware('role:admin,manager,marketing,customer-support');
        $this->contactUsRepo         = $contactUsRepo;
    }
    
    public function index()
    {
        $page         = $this->page;
        $contact        = ContactUs::first();
        return view('admin.contact-us.edit', compact('page', 'contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contact        = ContactUs::first();
        return view('admin.contact-customer.index', compact('contact'));
    }

    public function getCustomerList(){
        $page = 'contact-us-customer';
        return view('admin.contact-customer.index',compact('page'));
    }

    public function getCustomerData(Request $request) {
        return $this->contactUsRepo->getContactCustomer($request); 
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
        $contacts = $this->contactUsRepo->saveContact($request);
        return redirect('admin/contact-us')->with('flash_message', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     $customer = $this->contactUsRepo->getContactCustomerData($id);

    //     return view('admin.contact-customer.detail','customer');

    // }
    public function show($id)
    {
       
        $page = 'contact-us-customer';
        $customer  = $this->contactUsRepo->getContactCustomerData($id);

        return view('admin.contact-customer.detail', compact('customer','page'));
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
    public function update(Request $request, $id)
    {
        //
        $contacts = $this->contactUsRepo->saveContact($request);

        return redirect('admin/contact-us')->with('flash_message', 'Contact updated!');
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
