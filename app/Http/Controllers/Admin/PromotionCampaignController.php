<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\Product;
use App\Models\User as Merchant;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\PromotionCampaign;
use App\Models\PromotionCategory;
use App\Http\Controllers\Controller;
use App\Repositories\PromotionCampaignRepo;

class PromotionCampaignController extends Controller
{
    public $page  =  'promotionCampaign';
    protected $promotionCampaign;

    public function __construct(PromotionCampaignRepo $promotionCampaign)
    {
        $this->middleware('role:admin,marketing');
        $this->promotionCampaign = $promotionCampaign;
    }

    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.promotion-campaign.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->promotionCampaign->getData($request);
    }
    
    public function create()
    {
        $page  = $this->page;
        $products = Product::whereNull('deleted_at')->whereIsPublished(true)->get();
        $categories = Category::whereNull('deleted_at')->whereIsPublished(true)->get();
        $subCategories = SubCategory::whereNull('deleted_at')->whereIsPublished(true)->get();
        $promotionCategories = PromotionCategory::whereNull('deleted_at')->whereIsPublished(true)->get();
        $merchants = Merchant::where('is_merchant', true)->get();
        return view('admin.promotion-campaign.create',compact('page','products','categories','subCategories','promotionCategories','merchants'));
    }


    public function store(Request $request)
    {
        
        $this->promotionCampaign->savePromotionCampaign($request);

        return redirect('admin/promotion-campaign')->with('flash_message', 'PromotionCampaign added!');
    }

    
    public function edit($id)
    {
        $page  = $this->page;
        $promotioncampaign = PromotionCampaign::findOrFail($id);
        $products = Product::whereNull('deleted_at')->whereIsPublished(true)->get();
        $categories = Category::whereNull('deleted_at')->whereIsPublished(true)->get();
        $subCategories = SubCategory::whereNull('deleted_at')->whereIsPublished(true)->get();
        $promotionCategories = PromotionCategory::whereNull('deleted_at')->whereIsPublished(true)->get();
        $merchants = Merchant::where('is_merchant', true)->get();
        return view('admin.promotion-campaign.edit', compact('page','promotioncampaign','products','categories','subCategories','promotionCategories','merchants'));
    }


    public function update(Request $request, $id)
    {
        $this->promotionCampaign->savePromotionCampaign($request, $id);
        return redirect('admin/promotion-campaign')->with('flash_message', 'PromotionCampaign updated!');
    }

    public function destroy($id)
    {
        PromotionCampaign::destroy($id);

        return redirect('admin/promotion-campaign')->with('flash_message', 'PromotionCampaign deleted!');
    }


}
