<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\OnSale;

use App\Models\Package;
use App\Models\Product;
use App\Models\Category;
use App\Models\FreeGift;
use App\Models\PriceTag;
use App\Models\AddOnItem;
use App\Models\FeatureTag;
use App\Models\KeyItemTag;
use App\Models\PlanProcess;
use App\Models\SubCategory;
use App\Models\TimeSlotTag;
use App\Models\HighlightTag;
use App\Models\ProductImage;
use App\Models\RecommendTag;
use Illuminate\Http\Request;
use App\Models\QDollorRebate;
use App\Models\SubKeyItemTag;
use App\Models\Supplementary;
use App\Models\MerchantCoupon;
use App\Models\PlanDescription;
use App\Models\VaccineStockTag;
use App\Traits\CheckPermission;
use App\Models\MerchantLocation;
use App\Models\User as Merchant;
use App\Models\PromotionCampaign;
use App\Models\VaccineFactoryTag;
use App\Repositories\ProductRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductFormRequest;

class ProductsController extends Controller
{
    use CheckPermission;

    public $page  =  'product';

    protected $product;

    public function __construct(ProductRepo $product)
    {
        $this->middleware('role:admin,marketing,manager,accounting');
        $this->checkPermission();
        $this->product = $product;  
    }
    public function index(Request $request)
    {
        $page = $this->page;
        $merchants = Merchant::where('is_merchant', true)->get();
        $categories = Category::where('is_published', true)->get();
        $sub_categories = SubCategory::where('is_published', true)->whereIn('id',[1,2,3])->get();
        $sub_cates = SubCategory::where('is_published', true)->get();
        return view('admin.products.index', compact('page', 'merchants', 'sub_categories','sub_cates','categories'));
    }

    public function getData(Request $request)
    {
        return $this->product->getData($request);
    }

    public function create()
    {
        $page = $this->page;
        $freeGifts = FreeGift::whereIsPublished(true)->whereNull('deleted_at')->get();
        $merchantCoupons = MerchantCoupon::whereIsPublished(true)->whereNull('deleted_at')->get();
        $promotionCampaigns = PromotionCampaign::whereIsPublished(true)->whereNull('deleted_at')->get();
        $onSales = OnSale::whereIsPublished(true)->whereNull('deleted_at')->get();
        $qDollars = QDollorRebate::whereIsPublished(true)->whereNull('deleted_at')->get();
        $priceTags = PriceTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $timeSlotTags = TimeSlotTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $vaccineFactoryTags = VaccineFactoryTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $vaccineStockTags = VaccineStockTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $highlightTags = HighlightTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $featureTags = FeatureTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $keyItemTags = KeyItemTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $subKeyItemTags = SubKeyItemTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $categories = Category::whereIsPublished(true)->whereNull('deleted_at')->get();
        $subCategories = SubCategory::whereIsPublished(true)->whereNull('deleted_at')->get();
        $merchants = Merchant::where('is_merchant', true)->get();
        $packages = Package::whereIsPublished(true)->whereNull('deleted_at')->get();
        $addOnItems = AddOnItem::whereIsPublished(true)->where('merchant','!=',null)->whereNull('deleted_at')->get();
        $supplymentaries = Supplementary::whereIsPublished(true)->whereNull('deleted_at')->get();
        $recommendTags = RecommendTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $planProcess = PlanProcess::get();
        $planDescription = PlanDescription::get();
        $merchantLocations = MerchantLocation::get();
        return view('admin.products.create', compact(
            'freeGifts',
            'merchantCoupons',
            'promotionCampaigns',
            'onSales',
            'qDollars',
            'merchants',
            'packages',
            'addOnItems',
            'planProcess',
            'planDescription',
            'priceTags',
            'timeSlotTags',
            'vaccineFactoryTags',
            'highlightTags',
            'featureTags',
            'keyItemTags',
            'subKeyItemTags',
            'categories',
            'subCategories',
            'supplymentaries',
            'recommendTags',
            'vaccineStockTags',
            'page',
            "merchantLocations"
        ));
    }

    public function store(ProductFormRequest $request)
    {
        $product = $this->product->saveProduct($request);
        // dd($product);
        if ($product->id) {
            // $this->product->saveGalleryImages($request, $product);
            $this->product->saveProductImages($request, $product);
        }

        return redirect('admin/products')->with('flash_message', 'Product added!');
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
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
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
        $page = $this->page;
        $product = Product::findOrFail($id);
        $freeGifts = FreeGift::whereIsPublished(true)->whereNull('deleted_at')->get();
        $merchantCoupons = MerchantCoupon::whereIsPublished(true)->whereNull('deleted_at')->get();
        $promotionCampaigns = PromotionCampaign::whereIsPublished(true)->whereNull('deleted_at')->get();
        $onSales = OnSale::whereIsPublished(true)->whereNull('deleted_at')->get();
        $qDollars = QDollorRebate::whereIsPublished(true)->whereNull('deleted_at')->get();
        $priceTags = PriceTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $timeSlotTags = TimeSlotTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $vaccineFactoryTags = VaccineFactoryTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $vaccineStockTags = VaccineStockTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $highlightTags = HighlightTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $featureTags = FeatureTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $keyItemTags = KeyItemTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $subKeyItemTags = SubKeyItemTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $categories = Category::whereIsPublished(true)->whereNull('deleted_at')->get();
        $subCategories = SubCategory::whereIsPublished(true)->whereNull('deleted_at')->get();
        $merchants = Merchant::where('is_merchant', true)->get();
        $packages = Package::whereIsPublished(true)->whereNull('deleted_at')->get();
        $addOnItems = AddOnItem::whereIsPublished(true)->where('merchant','!=',null)->whereNull('deleted_at')->get();
        $supplymentaries = Supplementary::whereIsPublished(true)->whereNull('deleted_at')->get();
        $recommendTags = RecommendTag::whereIsPublished(true)->whereNull('deleted_at')->get();
        $planProcess = PlanProcess::get();
        $planDescription = PlanDescription::get();
        $productsImages = ProductImage::where('image_type', 'product')->where('type_id', $id)->whereNull('deleted_at')->first();
        $merchantLocations = MerchantLocation::get();
        return view('admin.products.edit', compact(
            'product',
            'freeGifts',
            'merchantCoupons',
            'promotionCampaigns',
            'onSales',
            'qDollars',
            'merchants',
            'packages',
            'addOnItems',
            'planProcess',
            'planDescription',
            'priceTags',
            'timeSlotTags',
            'vaccineFactoryTags',
            'highlightTags',
            'featureTags',
            'keyItemTags',
            'subKeyItemTags',
            'categories',
            'subCategories',
            'supplymentaries',
            'recommendTags',
            'vaccineStockTags',
            'productsImages',
            'page',
            'merchantLocations'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProductFormRequest $request, $id)
    {
        $this->product->saveProduct($request, $id);
        $this->product->updateProductImages($request, $id);

        return redirect('admin/products')->with('flash_message', 'Product updated!');
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
        Product::destroy($id);

        return redirect('admin/products')->with('flash_message', 'Product deleted!');
    }

    public function removeImg(Request $request)
    {
        ProductImage::where('product_id', $request['product_id'])->where('id', $request['image_id'])->delete();
        return redirect('admin/products')->with('flash_message', 'Successfully deleted image!');
    }

    public function recommendChange(Request $request)
    {
        $status = $this->product->changeRecommend($request);

        return response()->json(["success" => true]);
    }

    public function changeBookCount(Request $request)
    {
        $status = $this->product->changeBookCount($request);

        return response()->json(["success" => true]);
    }
    public function changeIsPublish(Request $request)
    {
        $status = $this->product->changeIspublish($request);

        return response()->json(["success" => true]);
    }
    public function showHome(Request $request)
    {
        $status = $this->product->showHome($request);

        return response()->json(["success" => true]);
    }
    public function updateSortValue(Request $request)
    {
        $status = $this->product->updateSortValue($request);

        return response()->json(["success" => true]);
    }

    public function updateRecommendSortValue(Request $request)
    {
        $status = $this->product->updateRecommendSortValue($request);

        return response()->json(["success" => true]);
    }
}
