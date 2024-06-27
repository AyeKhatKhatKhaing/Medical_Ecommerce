<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionCategoryFormRequest;
use App\Models\PromotionCategory;
use App\Repositories\PromotionCategoryRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class PromotionCategoryController extends Controller
{

    use CheckPermission;

    public $page  = 'promotion_category';
    protected $promotionCategoryRepo;

    public function __construct(PromotionCategoryRepo $promotionCategoryRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->promotionCategoryRepo = $promotionCategoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.promotion-category.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->promotionCategoryRepo->getPromotionCategory($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page = $this->page;

        return view('admin.promotion-category.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PromotionCategoryFormRequest $request)
    {

        $this->promotionCategoryRepo->savePromotionCategory($request);

        return redirect('admin/promotion-category')->with('flash_message', 'PromotionCategory added!');
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
        $promotioncategory = PromotionCategory::findOrFail($id);

        return view('admin.promotion-category.show', compact('promotioncategory'));
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
        $promotioncategory  = $this->promotionCategoryRepo->getPromotionCategoryData($id);

        return view('admin.promotion-category.edit', compact('promotioncategory', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PromotionCategoryFormRequest $request, $id)
    {

        $promotion_category = $this->promotionCategoryRepo->savePromotionCategory($request,$id);

        if($promotion_category) {
            return redirect()->route("promotion-category.index")->with('flash_message', 'Promotion Update!');
        }
        else {
            return redirect()->route("promotion-category.edit",$id)->with('flash_message', 'Promotion update!');

        }

        return redirect('admin/promotion-category')->with('flash_message', 'PromotionCategory updated!');
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
        $this->promotionCategoryRepo->deletePromotionCategory($id);

        return redirect('admin/promotion-category')->with('flash_message', 'PromotionCategory deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->promotionCategoryRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function promotion_category_translate()
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
