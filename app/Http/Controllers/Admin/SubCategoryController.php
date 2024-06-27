<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\CategoryRepo;
use App\Repositories\SubCategoryRepo;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public $page = 'sub_category';

    protected $subCategoryRepo;
    protected $categoryRepo;

    public function __construct(SubCategoryRepo $subCategoryRepo, CategoryRepo $categoryRepo)
    {
        $this->middleware('role:admin,manager,marketing');
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

        return view('admin.sub-category.index', compact('page'));
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
        $category = Category::where('is_published', true)->pluck('name_en', 'id');

        return view('admin.sub-category.create', compact('page', 'category'));
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

        return redirect('admin/sub-category')->with('flash_message', 'SubCategory added!');
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
        $subcategory = SubCategory::findOrFail($id);

        return view('admin.sub-category.show', compact('subcategory'));
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
        $category    = Category::where('is_published', true)->pluck('name_en', 'id');

        return view('admin.sub-category.edit', compact('subcategory', 'category'));
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
            return redirect()->route("sub-category.index")->with('flash_message', 'Sub Category Update!');
        }
        else {
            return redirect()->route("sub-category.edit",$id)->with('flash_message', 'Sub Category update!');

        }

        return redirect('admin/sub-category')->with('flash_message', 'SubCategory updated!');
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

        return redirect('admin/sub-category')->with('flash_message', 'Category deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->subCategoryRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
    public function sub_category_translate(Request $request)
    {

        $data = $this->subCategoryRepo->translateContent($request);

        return $data;

    }

    public function subCate(Request $request)
    {
        $subCategories = SubCategory::where('category_id',$request->id)->get();
        return response()->json([
            'subCategories' => $subCategories,
        ]);
    }

    public function sortBy(Request $request)
    {
        $product   = SubCategory::findOrFail($request->id);
        $product->update([
            'sort_by' => $request->value
        ]);
        return response()->json(["success" => true]);
    }

}
