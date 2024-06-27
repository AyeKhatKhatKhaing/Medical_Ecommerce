<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Http\Requests;
use App\Models\FaqPage;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use App\Repositories\FaqRepo;
use App\Models\FaqSubCategory;
use App\Traits\CheckPermission;
use App\Http\Controllers\Controller;
use App\Repositories\FaqCategoryRepo;
use App\Http\Requests\Admin\FaqFormRequest;

class FaqController extends Controller
{
    use CheckPermission;

    public $page  = 'faq';
    protected $faqRepo;
    protected $faqCategoryRepo;

    public function __construct(FaqRepo $faqRepo, FaqCategoryRepo $faqCategoryRepo)
    {
        $this->checkPermission();
        $this->middleware('role:admin,marketing');
        $this->faqRepo         = $faqRepo;
        $this->faqCategoryRepo = $faqCategoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page         = $this->page;
        $faqcategory  = $this->faqCategoryRepo->getCategoryList();
        return view('admin.faq.index', compact('page', 'faqcategory'));
    }

    public function faq_page(Request $request)
    {
        $page         = "faq_page";
        $faqpage  = FaqPage::first();
        return view('admin.faq-page.index', compact('page', 'faqpage'));
    }

    public function getData(Request $request)
    {
        return $this->faqRepo->getData($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page         = $this->page;
        $categories  = $this->faqCategoryRepo->getCategoryList();
        $subCategories = FaqSubCategory::whereIsPublished(true)->whereNull('deleted_at')->get();

        return view('admin.faq.create', compact('categories', 'page','subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(FaqFormRequest $request)
    {
        // sdd($request);
        $this->faqRepo->saveFaq($request);

        return redirect('admin/faq')->with('flash_message', 'Faq added!');
    }

    public function faq_save(Request $request)
    {
        // dd($request);
        $this->faqRepo->saveFaqPage($request);

        return redirect('admin/faq-page')->with('flash_message', 'Faq added!');
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
        $page  = $this->page;
        $faq   = Faq::findOrFail($id);

        return view('admin.faq.show', compact('faq', 'page'));
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
        $categories  = $this->faqCategoryRepo->getCategoryList();
        $subCategories = FaqSubCategory::whereIsPublished(true)->whereNull('deleted_at')->get();
        $faq          = $this->faqRepo->getFaqData($id);

        return view('admin.faq.edit', compact('faq', 'categories','subCategories', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(FaqFormRequest $request, $id)
    {

        $faq = $this->faqRepo->saveFaq($request,$id);

        if($faq) {
            return redirect()->route("faq.index")->with('flash_message', 'faq Update!');
        }
        else {
            return redirect()->route("faq.edit",$id)->with('flash_message', 'faq update!');

        }

        return redirect('admin/faq')->with('flash_message', 'Faq updated!');
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
        $this->faqRepo->deleteFaq($id);

        return redirect('admin/faq')->with('flash_message', 'Faq deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->faqRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function faq_translate()
    {
        $val=\request()->val;
        $name=\request()->name;
        $content=\request()->cont;
        $fields=[
            "name"=>$name,
            "content"=>$content,
        ];
        $data = autoTranslate($val,$fields);
        return $data;
    }


}
