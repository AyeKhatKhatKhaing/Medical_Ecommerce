<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\OnSale;

use App\Models\Product;
use App\Models\User as Merchant;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SaleCategory;
use Illuminate\Http\Request;
use App\Repositories\OnSaleRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\OnSaleFormRequest;

class OnSaleController extends Controller
{
    public $page  =  'onSale';
    protected $onSale;

    public function __construct(OnSaleRepo $onSale)
    {
        $this->middleware('role:admin,marketing');
        $this->onSale = $onSale;
    }

    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.on-sale.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->onSale->getData($request);
    }

    public function create()
    {
        $page  = $this->page;
        $products = Product::whereNull('deleted_at')->whereIsPublished(true)->get();
        $categories = Category::whereNull('deleted_at')->whereIsPublished(true)->get();
        $subCategories = SubCategory::whereNull('deleted_at')->whereIsPublished(true)->get();
        $saleCategories = SaleCategory::whereNull('deleted_at')->whereIsPublished(true)->get();
        $merchants = Merchant::where('is_merchant', true)->get();
        return view('admin.on-sale.create',compact('page','products','categories','subCategories','saleCategories','merchants'));
    }

    public function store(OnSaleFormRequest $request)
    {
        
        $this->onSale->saveOnSale($request);
        return redirect('admin/on-sale')->with('flash_message', 'onSale added!');
    }

   
    public function edit($id)
    {
        $page = $this->page;
        $onSale = OnSale::findOrFail($id);
        $products = Product::whereNull('deleted_at')->whereIsPublished(true)->get();
        $categories = Category::whereNull('deleted_at')->whereIsPublished(true)->get();
        $subCategories = SubCategory::whereNull('deleted_at')->whereIsPublished(true)->get();
        $saleCategories = SaleCategory::whereNull('deleted_at')->whereIsPublished(true)->get();
        $merchants = Merchant::where('is_merchant', true)->get();
        return view('admin.on-sale.edit', compact('page','onSale','products','categories','subCategories','saleCategories','merchants'));
    }

   
    public function update(OnSaleFormRequest $request, $id)
    {
        $this->onSale->saveOnSale($request, $id);
        return redirect('admin/on-sale')->with('flash_message', 'onSale updated!');
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
        OnSale::destroy($id);

        return redirect('admin/on-sale')->with('flash_message', 'onSale deleted!');
    }


}
