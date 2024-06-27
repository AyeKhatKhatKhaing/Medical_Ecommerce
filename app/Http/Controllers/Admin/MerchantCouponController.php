<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\Models\MerchantCoupon;
use App\Http\Controllers\Controller;
use App\Repositories\MerchantCouponRepo;

class MerchantCouponController extends Controller
{
    public $page  =  'merchantCoupon';

    protected $merchantCoupon;

    public function __construct(MerchantCouponRepo $merchantCoupon)
    {
        $this->middleware('role:admin,marketing');
        // $this->checkPermission();   
        $this->merchantCoupon = $merchantCoupon;
    }
    public function index(Request $request)
    {
        $page = $this->page;

        return view('admin.merchant-coupon.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->merchantCoupon->getData($request);
    }

    public function create()
    {
        return view('admin.merchant-coupon.create');
    }

   
    public function store(Request $request)
    {
        
        $this->merchantCoupon->saveMerchantCoupon($request);

        return redirect('admin/merchant-coupon')->with('flash_message', 'MerchantCoupon added!');
    }

    
    public function edit($id)
    {
        $merchantcoupon = MerchantCoupon::findOrFail($id);

        return view('admin.merchant-coupon.edit', compact('merchantcoupon'));
    }

    
    public function update(Request $request, $id)
    {
        
        $this->merchantCoupon->saveMerchantCoupon($request,$id);
        return redirect('admin/merchant-coupon')->with('flash_message', 'MerchantCoupon updated!');
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
        MerchantCoupon::destroy($id);

        return redirect('admin/merchant-coupon')->with('flash_message', 'MerchantCoupon deleted!');
    }


}
