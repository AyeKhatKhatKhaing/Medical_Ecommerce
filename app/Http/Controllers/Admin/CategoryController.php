<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CategoryImage;
use App\Repositories\CategoryRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use CheckPermission;

    public $page = 'category';

    protected $categoryRepo;

    public function __construct(CategoryRepo $categoryRep)
    {
        $this->middleware('role:admin,marketing,manager');
        $this->checkPermission();
        $this->categoryRepo = $categoryRep;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page   = $this->page;

        return view('admin.category.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->categoryRepo->getCategory($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;

        return view('admin.category.create', compact('page'));
    }


    public function categoryImage(Request $request)
    {
        $details = $request->details;
        $imagePath = asset('/backend/media/blank-image.svg');
        $returnHtml = [];

        foreach (config('lng.attr') as $lngcode => $attr) {
            $html    = '
            <div class="card mt-4 border new-details-input' . $details . '">
                <div class="card-body" style="background-color: #f5f8fa;">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button data-attr="' . $attr . '" type="button" class="removeDetails' . $details . ' btn btn-danger"
                                style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                        </div>
                    </div>
                    <div class="form-group mt-4 mb-5">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Title (' . $lngcode . ')</label>
                                    <input type="text" class="form-control" id="title_' . $attr . $details . '"
                                        name="title_' . $attr . '[]">
                                </div>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body pt-0">
                                
                                    <div class="list-title mb-3">
                                        <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                            <span style="color: #B5B5C3">Image for desktop(1200 x
                                                630)px</span>
                                        </label>
                                    </div>
                                    <div class="panel-block">
                                        <div class="form-group">
                                            <div id="holder-image-' . $details . '">
                                                <img src="' . $imagePath . '" class="img-thumbnail">
                                            </div>
                                            <div class="input-group mt-3">
                                                <span class="input-group-btn">
                                                    <a id="lfm-image-' . $details . '" data-input="image-' . $details . '"
                                                        data-preview="holder-image-' . $details . '"
                                                        class="btn btn-primary btn-sm text-white lfm-img">
                                                        <i class="bi bi-image-fill me-2"></i>Select
                                                        File
                                                    </a>
                                                </span>
                                                <input id="image-' . $details . '" class="form-control" type="text"
                                                    name="image[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="card-body pt-0">
                                    
                                    <div class="list-title mb-3">
                                        <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                            <span style="color: #B5B5C3">Image for mobile(138 x 72)px</span>
                                        </label>
                                    </div>
                                    <div class="panel-block">
                                        <div class="form-group">
                                            <div id="holder-image-m-' . $details . '">
                                                <img src="' . $imagePath . '" class="img-thumbnail">
                                            </div>
                                            <div class="input-group mt-3">
                                                <span class="input-group-btn">
                                                    <a id="lfm-image-m-' . $details . '" data-input="image-m-' . $details . '"
                                                        data-preview="holder-image-m-' . $details . '"
                                                        class="btn btn-primary btn-sm text-white lfm-img">
                                                        <i class="bi bi-image-fill me-2"></i>Select
                                                        File
                                                    </a>
                                                </span>
                                                <input id="image-m-' . $details . '" class="form-control" type="text"
                                                    name="imageM[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
            ';
            array_push($returnHtml, $html);
        }

        return $returnHtml;
    }



    public function categoryImageM(Request $request)
    {
        $details = $request->details;
        $imagePath = asset('/backend/media/blank-image.svg');
        $returnHtml = [];

        foreach (config('lng.attr') as $lngcode => $attr) {
            $html    = '
            <div class="card mt-4 border new-details-input-m' . $details . '">
    <div class="card-body" style="background-color: #f5f8fa;">
        <div class="row">
            <div class="col-md-12 text-end">
                <button data-attr="' . $attr . '" type="button" class="removeDetailsM' . $details . ' btn btn-danger"
                    style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
            </div>
        </div>
        <div class="form-group mt-4 mb-5">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Title for mobile (' . $lngcode . ')</label>
                        <input type="text" class="form-control" id="title_m_' . $attr . $details . '"
                            name="title_m_' . $attr . '[]">
                    </div>
                </div>
            </div>

                <div class="col-md-12">
                    <div class="card-body pt-0">
                        <div class="list-title mb-3">
                            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                <span style="color: #B5B5C3">Image
                                    Size(1200 x
                                    630)px</span>
                            </label>
                        </div>
                        <div class="panel-block">
                            <div class="form-group">
                                <div id="holder-image-m">
                                    <img src="' . $imagePath . '" class="img-thumbnail">
                                </div>
                                <div class="input-group mt-3">
                                    <span class="input-group-btn">
                                        <a id="lfm-image-m" data-input="image-m" data-preview="holder-image-m"
                                            class="btn btn-primary btn-sm text-white lfm-img">
                                            <i class="bi bi-image-fill me-2"></i>Select
                                            File
                                        </a>
                                    </span>
                                    <input id="imageM" class="form-control" type="text" name="imageM[]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
            ';
            array_push($returnHtml, $html);
        }

        return $returnHtml;
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
        $this->categoryRepo->saveCategory($request);

        return redirect('admin/category')->with('flash_message', 'Category added!');
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
        $category = Category::findOrFail($id);
        $category_images = CategoryImage::get();
        // dd($category_images);
        // $category_images_m = CategoryImage::where('type',1)->get();

        return view('admin.category.show', compact('category','category_images'));
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
        $page     = $this->page;
        $category = $this->categoryRepo->getCategoryData($id);
        $category_images = CategoryImage::where('category_id',$id)->get();
        // dd($category_images);
        $category_images_m = CategoryImage::where('type',1)->where('category_id',$id)->get();

        return view('admin.category.edit', compact('category','category_images','category_images_m', 'page'));
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

        $category = $this->categoryRepo->saveCategory($request,$id);

        if($category) {
            return redirect()->route("category.index")->with('flash_message', 'Category Update!');
        }
        else {
            return redirect()->route("category.edit",$id)->with('flash_message', 'Category update!');

        }

        return redirect('admin/category')->with('flash_message', 'Category updated!');
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
        $this->categoryRepo->deleteCategory($id);

        return redirect('admin/category')->with('flash_message', 'Category deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->categoryRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function category_translate(Request $request)
    {

        $data = $this->categoryRepo->translateContent($request);

        return $data;

    }
}
