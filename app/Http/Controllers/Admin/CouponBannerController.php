<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CouponBanner;
use App\Models\User as Merchant;
use App\Repositories\CouponBannerRepo;
use Illuminate\Http\Request;

class CouponBannerController extends Controller
{
    public $page = 'coupon-banner';

    protected $couponBannerRepo;

    public function __construct(CouponBannerRepo $couponBannerRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->couponBannerRepo = $couponBannerRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page = $this->page;

        // return view('admin.coupon-banner.index', compact('page'));
        $couponBanner = CouponBanner::first();
        if($couponBanner) {
            return view('admin.coupon-banner.edit', compact('couponBanner', 'page'));
        }
        return view('admin.coupon-banner.create', compact('page'));
        //return view('admin.coupon-banner.show', compact('couponBanner'));
    }

    public function getData(Request $request)
    {
        return $this->couponBannerRepo->getCouponBanner($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;
        return view('admin.coupon-banner.create', compact('page'));
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
        $this->couponBannerRepo->saveCouponBanner($request);
        return redirect('admin/coupon-banner')->with('flash_message', 'Coupon Banner added!');
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
        $couponBanner = CouponBanner::findOrFail($id);
        return view('admin.coupon-banner.show', compact('couponBanner'));
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
        $page      = $this->page;
        $couponBanner = $this->couponBannerRepo->getCouponBannerData($id);
        return view('admin.coupon-banner.edit', compact('couponBanner', 'page'));
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
        $couponBanner = $this->couponBannerRepo->saveCouponBanner($request, $id);
        if($couponBanner) {
            return redirect()->route("coupon-banner.index")->with('flash_message', 'Coupon Banner Update!');
        }
        else {
            return redirect()->route("coupon-banner.edit",$id)->with('flash_message', 'Coupon Banner Update!');
        }
        return redirect('admin/coupon-banner')->with('flash_message', 'Coupon Banner updated!');
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
        $this->couponBannerRepo->deleteCouponBanner($id);

        return redirect('admin/coupon-banner')->with('flash_message', 'Coupon Banner deleted!');
    }

    public function couponBannerChangeStatus(Request $request)
    {
        $status = $this->couponBannerRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function couponBannerTranslate(Request $request)
    {

        $data = $this->couponBannerRepo->translateContent($request);

        return $data;

    }

    public function couponImage(Request $request)
    {
        $page  = 'coupon-image';
        $couponBanner = CouponBanner::first();
        return view('admin.coupon-image.update', compact('couponBanner','page'));
    }

    public function couponImageUpdate(Request $request)
    {
        $page  = $this->page;
        $couponBanner = CouponBanner::first();
        $input = $request->all();
        if(isset($input['birthday_img'])){
            if (!existImagePath($input['birthday_img'])) {
                $input['birthday_img'] = null;
            } else {
                $input['birthday_img'] = getImage($request->birthday_img);
            }
        }
        if(isset($input['welcome_img'])){
            if (!existImagePath($input['welcome_img'])) {
                $input['welcome_img'] = null;
            } else {
                $input['welcome_img'] = getImage($request->welcome_img);
            }
        }
        $couponBanner->update([
            'birthday_img' => $input['birthday_img'],
            'welcome_img' => $input['welcome_img'],
        ]);
        return redirect('admin/coupon-image')->with('flash_message', 'Coupon Image updated!');
    }


}
