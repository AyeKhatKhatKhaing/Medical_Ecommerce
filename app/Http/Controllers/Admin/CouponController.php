<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\User as Merchant;
use App\Traits\CheckPermission;
use App\Repositories\CouponRepo;
use App\Http\Controllers\Controller;
use App\Repositories\CouponCategoryRepo;
use App\Http\Requests\Admin\CouponFormRequest;

class CouponController extends Controller
{
    use CheckPermission;

    public $page  =  'coupon';

    protected $couponRepo;

    public function __construct(CouponRepo $couponRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->couponRepo         = $couponRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        $merchants = Merchant::select('id', 'name_en as name')->where('is_merchant', 1)->get();

        return view('admin.coupon.index', compact('page', 'merchants'));
    }

    public function getData(Request $request)
    {   
        return $this->couponRepo->getCoupons($request);
    }

    public function create()
    {
        $page  = $this->page;
        $merchants = Merchant::where('is_merchant', true)->get();
        $products = Product::whereNull('deleted_at')->whereIsPublished(true)->get();
        $categories = Category::whereNull('deleted_at')->whereIsPublished(true)->get();
        $subCategories = SubCategory::whereNull('deleted_at')->whereIsPublished(true)->get();
        return view('admin.coupon.create', compact('page', 'products', 'categories', 'subCategories', 'merchants'));
    }

    public function store(CouponFormRequest $request)
    {
        $type = null;
        if($request->coupon_type != null){
            if($request->coupon_type == 0){
                $type = 'birthday';
            }else{
                $type = 'welcome';
            }
        }
        $this->couponRepo->saveCoupon($request);
        return redirect('admin/coupon?coupon_type='.$type)->with('flash_message', 'Coupon added!');
    }

    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('admin.coupon.show', compact('coupon'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $coupon = $this->couponRepo->getCoupon($id);
        $merchants = Merchant::where('is_merchant', true)->get();
        $products = Product::whereNull('deleted_at')->whereIsPublished(true)->get();
        $categories = Category::whereNull('deleted_at')->whereIsPublished(true)->get();
        $subCategories = SubCategory::whereNull('deleted_at')->whereIsPublished(true)->get();
        return view('admin.coupon.edit', compact('coupon', 'page', 'products', 'categories', 'subCategories', 'merchants'));
    }

    public function update(CouponFormRequest $request, $id)
    {
        $type = null;
        if($request->coupon_type != null){
            if($request->coupon_type == 0){
                $type = 'birthday';
            }else{
                $type = 'welcome';
            }
        }
        $coupons = $this->couponRepo->saveCoupon($request, $id);
        return redirect('admin/coupon?coupon_type='.$type)->with('flash_message', 'Coupon updated!');
    }

    public function destroy($id) 
    {
        $this->couponRepo->deleteCoupon($id);

        return redirect('admin/coupon')->with('flash_message', 'Coupon deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->couponRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function coupon_translate()
    {
        $val = \request()->val;
        $name = \request()->name;
        $slug = \request()->slug;
        $content = \request()->cont;
        $meta_title = \request()->meta_title;
        $meta_des = \request()->meta_des;
        $fields = [
            "name" => $name,
            "slug" => $slug,
            "content" => $content,
            "meta_title" => $meta_title,
            "meta_des" => $meta_des,
        ];
        $data = autoTranslate($val, $fields);
        return $data;
    }
}
