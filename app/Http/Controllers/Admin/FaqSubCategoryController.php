<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\CheckPermission;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\FaqSubCategory;
use App\Repositories\FaqCategoryRepo;
use App\Repositories\FaqSubCategoryRepo;

class FaqSubCategoryController extends Controller
{
    public $page = 'faq_sub_category';

    protected $subCategoryRepo;
    protected $categoryRepo;

    public function __construct(FaqSubCategoryRepo $subCategoryRepo, FaqCategoryRepo $categoryRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->subCategoryRepo = $subCategoryRepo;
        $this->categoryRepo    = $categoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page   = $this->page;

        return view('admin.faq-sub-category.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->subCategoryRepo->getSubCategory($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page     = $this->page;
        $category = FaqCategory::where('is_published', true)->pluck('name_en', 'id');

        return view('admin.faq-sub-category.create', compact('page', 'category'));
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

        $this->subCategoryRepo->saveSubCategory($request);

        return redirect('admin/faq-sub-category')->with('flash_message', 'SubCategory added!');
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
        $subcategory = FaqSubCategory::findOrFail($id);

        return view('admin.faq-sub-category.show', compact('subcategory'));
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
        $page        = $this->page;
        $subcategory = $this->subCategoryRepo->getSubCategoryData($id);
        $category    = FaqCategory::where('is_published', true)->pluck('name_en', 'id');

        return view('admin.faq-sub-category.edit', compact('subcategory', 'category'));
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

        $sub_category = $this->subCategoryRepo->saveSubCategory($request, $id);

        if($sub_category) {
            return redirect()->route("faq-sub-category.index")->with('flash_message', 'Sub Category Update!');
        }
        else {
            return redirect()->route("faq-sub-category.edit",$id)->with('flash_message', 'Sub Category update!');

        }

        return redirect('admin/faq-sub-category')->with('flash_message', 'SubCategory updated!');
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
        $this->subCategoryRepo->deleteSubCategory($id);

        return redirect('admin/faq-sub-category')->with('flash_message', 'Category deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->subCategoryRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
    public function faq_sub_category_translate(Request $request)
    {

        $data = $this->subCategoryRepo->translateContent($request);

        return $data;

    }

    public function subCate(Request $request)
    {
        $subCategories = FaqSubCategory::where('category_id',$request->id)->get();
        return response()->json([
            'subCategories' => $subCategories,
        ]);
    }

}
