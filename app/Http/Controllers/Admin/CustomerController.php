<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Customer;
use App\Models\District;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\Admin\UserRequestForm;
use App\Rules\CheckPhoneNumber;
class CustomerController extends Controller
{
    public $page = 'customer';

    protected $customerRepo;

    public function __construct(CustomerRepo $customerRepo)
    {
        $this->middleware('role:admin,manager,marketing,customer-support,accounting');
        $this->customerRepo = $customerRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page  = $this->page;
        return view('admin.customer.index', compact('page'));
    }

    public function subscribe()
    {
        $page  = 'subscriber';
        return view('admin.subscriber.index', compact('page'));
    }

    public function Blogsubscribe()
    {
        $page  = 'blog_subscriber';
        return view('admin.blog-subscriber.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->customerRepo->getCustomer($request);
    }

    public function getSubscriberList(Request $request)
    {
        return $this->customerRepo->getSubscriberList($request);
    }

    public function getBlogSubscriberList(Request $request)
    {
        return $this->customerRepo->getBlogSubscriberList($request);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page      = $this->page;
        $customer  = $this->customerRepo->getCustomersData($id);
        $familyMemeber = $this->customerRepo->getFamilyMemberData($id);
        $pending_booking = $this->customerRepo->pendingBookingList($id);
        $completed_booking = $this->customerRepo->completeBookingList($id);
        $cancelled_booking = $this->customerRepo->cancelledBookingList($id);
        $wishlist = $this->customerRepo->wishlist($id);
        $health_record = $this->customerRepo->healthRecord($id);
        $vaccination_record = $this->customerRepo->vaccinationRecord($id);
        $bodyCheck_record = $this->customerRepo->bodyCheckReord($id);
        $medicalCheck_record = $this->customerRepo->medicalCheckReord($id);
        $available = $this->customerRepo->availableCoupon($id);
        $used = $this->customerRepo->usedCoupon($id);
        $districtList = District::whereIsPublished(true)->get();
        $areaList = Area::whereIsPublished(true)->get();
        $subscriber = $this->customerRepo->subscriber($id);
        // dd($available);
        // dd($pending_booking);
        return view('admin.customer.show', compact('customer','subscriber','districtList','areaList','available','used','health_record','medicalCheck_record','bodyCheck_record','familyMemeber','vaccination_record','wishlist', 'pending_booking','completed_booking','cancelled_booking','page'));
    }

    public function updateCustomer(Request $request){
        $request->validate([
            'email' => ["required","email","unique:customers,email,".$request->id],
            'phone' => ["nullable","regex:/^(\+?\d{2,3})(\d{8})$/i","unique:customers,phone,".$request->id,new CheckPhoneNumber]
        ]);
        $this->customerRepo->changeCustomerInfo($request);
        return response()->json(["success" => true]);
        // return redirect()->back();
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customerRepo->deleteCustomer($id);

        return redirect('admin/customer')->with('flash_message', 'Customer deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->customerRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
}
