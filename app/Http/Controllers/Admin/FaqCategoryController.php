<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\FaqCategoryFormRequest;
use App\Models\FaqCategory;
use App\Repositories\FaqCategoryRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    use CheckPermission;

    public $page  = 'faq_category';

    protected $faqCategoryRepo;

    public function __construct(FaqCategoryRepo $faqCategoryRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->faqCategoryRepo = $faqCategoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page  = $this->page;

        return view('admin.faq-category.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->faqCategoryRepo->getFaqCategory($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;

        return view('admin.faq-category.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(FaqCategoryFormRequest $request)
    {
        $this->faqCategoryRepo->saveFaqCategory($request);

        return redirect('admin/faq-category')->with('flash_message', 'FaqCategory added!');
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
        $faqcategory = FaqCategory::findOrFail($id);

        return view('admin.faq-category.show', compact('faqcategory'));
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
        $page         = $this->page;
        $faqcategory  = $this->faqCategoryRepo->getfaqCategoryData($id);

        return view('admin.faq-category.edit', compact('faqcategory', 'page'));
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

        $faq_category = $this->faqCategoryRepo->saveFaqCategory($request,$id);

        if($faq_category) {
            return redirect()->route("faq-category.index")->with('flash_message', 'Faq Update!');
        }
        else {
            return redirect()->route("faq-category.edit",$id)->with('flash_message', 'Faq update!');
        }

        return redirect('admin/faq-category')->with('flash_message', 'FaqCategory updated!');
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
        $this->faqCategoryRepo->deleteFaqCategory($id);

        return redirect('admin/faq-category')->with('flash_message', 'FaqCategory deleted!');
    }


    public function statusChange(Request $request)
    {
        $status = $this->faqCategoryRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function faq_category_translate()
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
