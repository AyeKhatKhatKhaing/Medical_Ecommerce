<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleCategoryFormRequest;
use App\Models\SaleCategory;
use App\Repositories\SaleCategoryRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class SaleCategoryController extends Controller
{

    use CheckPermission;

    public $page  = 'sale_category';
    protected $saleCategoryRepo;

    public function __construct(SaleCategoryRepo $saleCategoryRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->saleCategoryRepo = $saleCategoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.sale-category.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->saleCategoryRepo->getSaleCategory($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page = $this->page;

        return view('admin.sale-category.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SaleCategoryFormRequest $request)
    {

        $this->saleCategoryRepo->saveSaleCategory($request);

        return redirect('admin/sale-category')->with('flash_message', 'SaleCategory added!');
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
        $salecategory = SaleCategory::findOrFail($id);

        return view('admin.sale-category.show', compact('salecategory'));
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
        $page          = $this->page;
        $salecategory  = $this->saleCategoryRepo->getSaleCategoryData($id);

        return view('admin.sale-category.edit', compact('salecategory', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SaleCategoryFormRequest $request, $id)
    {

        $sale_category = $this->saleCategoryRepo->saveSaleCategory($request,$id);

        if($sale_category) {
            return redirect()->route("sale-category.index")->with('flash_message', 'Sale Update!');
        }
        else {
            return redirect()->route("sale-category.edit",$id)->with('flash_message', 'Sale update!');

        }

        return redirect('admin/sale-category')->with('flash_message', 'SaleCategory updated!');
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
        $this->saleCategoryRepo->deleteSaleCategory($id);

        return redirect('admin/sale-category')->with('flash_message', 'SaleCategory deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->saleCategoryRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function sale_category_translate()
    {
        $val=\request()->val;
        $name=\request()->name;
        $fields=[
            "name"=>$name,
        ];
        $data = autoTranslate($val,$fields);
        return $data;

    }


}
