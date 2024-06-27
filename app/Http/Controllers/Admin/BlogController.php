<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Blog;
use App\Http\Requests\Admin\BlogFormRequest;
use App\Http\Requests\Admin\BlogDetailsFormRequest;
use App\Repositories\BlogRepo;
use App\Repositories\BlogCategoryRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\BlogCategory;
use App\Models\Author;
use App\Models\BlogDetails;
use App\Models\BlogDetailsFaq;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\BlogImage;
use App\Models\BlogDetailsForm;
use App\Models\BlogSection;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    use CheckPermission;

    public $page  =  'blog';

    protected $blogRepo;
    protected $blogCategoryRepo;

    public function __construct(BlogRepo $blogRepo, BlogCategoryRepo $blogCategoryRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->blogRepo         = $blogRepo;
        $this->blogCategoryRepo = $blogCategoryRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page         = $this->page;
        $blogcategory = BlogCategory::whereIsPublished(true)->get();
        return view('admin.blog.index', compact('page', 'blogcategory'));
    }

    public function getData(Request $request)
    {
        return $this->blogRepo->getBlogs($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page         = $this->page;
        $blogCategory = BlogCategory::whereIsPublished(true)->get();
        $blogAuthor = Author::whereIsPublished(true)->get();
        $blogTag = BlogTag::whereIsPublished(true)->get();
        $productCategory = Category::whereIsPublished(true)->get();
        $productSubCategory = SubCategory::whereIsPublished(true)->get();
        $recommendedBlog = Blog::whereIsPublished(true)->get();
        return view('admin.blog.create', compact('page', 'blogCategory', 'blogAuthor', 'blogTag', 'productCategory', 'productSubCategory', 'recommendedBlog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BlogFormRequest $request)
    {
        $blog = $this->blogRepo->saveBlog($request);

        if($request->section_count !== 0)
        {
            $this->blogRepo->saveSection($request, $blog->id);
        }

        return redirect('admin/blog')->with('flash_message', 'Blog added!');
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
        $blog = Blog::findOrFail($id);

        return view('admin.blog.show', compact('blog'));
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
        $blogCategory = BlogCategory::whereIsPublished(true)->get();
        $blogAuthor = Author::whereIsPublished(true)->get();
        $productCategory = Category::whereIsPublished(true)->get();
        $productSubCategory = SubCategory::whereIsPublished(true)->get();
        $recommendedBlog = Blog::whereIsPublished(true)->get();
        $blog         = $this->blogRepo->getBlog($id);
        $blogTag = BlogTag::where('blog_category_id', $blog->category_id)->whereIsPublished(true)->get();
        $sections = BlogSection::where('blog_id',$id)->orderBy('sort_no')->get();

        return view('admin.blog.edit', compact('blog', 'page', 'blogCategory', 'blogAuthor', 'blogTag', 'productCategory', 'productSubCategory', 'recommendedBlog','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BlogFormRequest $request, $id)
    {
        $blogs = $this->blogRepo->saveBlog($request, $id);

        if($blogs) {
            if($request->section_count !== 0)
            {
                $this->blogRepo->saveSection($request, $id);
            }
            return redirect()->route("blog.index")->with('flash_message', 'Blog Update!');
        } else {
            return redirect()->route("blog.edit", $id)->with('flash_message', 'Blog update!');

        }

        return redirect('admin/blog')->with('flash_message', 'Blog updated!');
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
        $this->blogRepo->deleteBlog($id);

        return redirect('admin/blog')->with('flash_message', 'Blog deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->blogRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function blog_translate(Request $request)
    {
        $data = $this->blogRepo->translateContent($request);

        return $data;

    }

    public function blog_eng_translate(Request $request)
    {
        $data = $this->blogRepo->translateContentToEng($request);

        return $data;

    }

    public function blogDetails($blog_id, $title_id)
    {
        $page         = $this->page;
        $productList  = Product::whereIsPublished(true)->get();
        $couponList  = Coupon::whereIsPublished(true)->where('coupons.owner_type',1)->get();
        $blogList  = Blog::whereIsPublished(true)->where("id", "!=", $blog_id)->get();
        $blogInfo  = Blog::find($blog_id);
        // $productIds = Product::whereIsPublished(true)->where("sub_category_id",$blogInfo->blogSubCategory->id)->pluck("id")->toArray();
        $subCategoryList  = SubCategory::whereIsPublished(true)->get();
        $key_item_list = \DB::table('key_item_tags')
        ->whereNull('key_item_tags.deleted_at')
        ->where('key_item_tags.is_published', 1)
        ->groupBy('key_item_tags.id', 'key_item_tags.name_en', 'key_item_tags.name_tc', 'key_item_tags.name_sc', 'key_item_tags.img')
        ->select(
            'key_item_tags.id',
            'key_item_tags.name_en',
            'key_item_tags.name_tc',
            'key_item_tags.name_sc'
        )->get();

        $highlight_tag_list = \DB::table('highlight_tags')
        ->whereNull('highlight_tags.deleted_at')
        ->where('highlight_tags.is_published', 1)
        ->groupBy('highlight_tags.id', 'highlight_tags.name_en', 'highlight_tags.name_tc', 'highlight_tags.name_sc', 'highlight_tags.img')
        ->select(
            'highlight_tags.id',
            'highlight_tags.name_en',
            'highlight_tags.name_tc',
            'highlight_tags.name_sc'
        )->get();

        $blogImages = BlogImage::where("blog_details_no", $title_id)->where('blog_id', $blog_id)->whereNull('deleted_at')->get();
        $checkOldBlog = BlogDetails::select("id")
                                    ->where("blog_id", $blog_id)
                                    ->where("title_no_en", $title_id)
                                    // ->whereIsPublished(true)
                                    ->limit(1)
                                    ->get();
        if(count($checkOldBlog) > 0) {
            $blogDetails = BlogDetails::find($checkOldBlog[0]->id);
        } else {
            $blogDetails = null;
        }
        $blogDetailsFaq = [];
        if($blogDetails != null) {
            $blogDetailsFaq = BlogDetailsFaq::where('blog_details_id', $blogDetails->id)->get();
        }

        return view('admin.blog.details', compact('page', 'productList', 'couponList', 'blogImages', 'blogDetails', 'blogList', 'key_item_list', 'highlight_tag_list', 'subCategoryList', 'blogDetailsFaq'));
    }

    public function saveBlogDetails(BlogDetailsFormRequest $request)
    {
        $checkOldBlog = BlogDetails::select("id")
                                    ->where("blog_id", $request->blog_id)
                                    ->where("title_no_en", $request->title_id)
                                    // ->whereIsPublished(true)
                                    ->limit(1)
                                    ->get();
        if(count($checkOldBlog) > 0) {
            $blog = BlogDetails::find($checkOldBlog[0]->id);
        } else {
            $blog = new BlogDetails();
        }
        $input    = $request->all();
        \Log::Debug($input);
        $input['title_no_en']  = $request->title_id;
        if($request->title_id == 6 || $request->title_id == 9) {
            $input['product_ids']  = implode(",", $request->product_ids);
        }
        if($request->title_id == 10) {
            $input['coupon_ids']  = implode(",", $request->coupon_ids);
        }
        if($request->title_id == 12) {
            $input['key_item_ids']  = implode(",", $request->key_item_ids);
            $input['highlight_tag_ids']  = implode(",", $request->highlight_tag_ids);
        }

        $field = 'hidden-image_gallery_alt_text';
        $input['image_gallery_alt_text'] = $request->{$field};
        $saved    = $blog->fill($input)->save();
        if($request->title_id == 2 || $request->title_id == 3) {
            $data = $this->blogRepo->updateBlogImages($request);
        }

        if($request->title_id == 7) {
            if(isset($request->sample_download_file_1)) {
                $fileName = time().'.'.$request->sample_download_file_1->extension();
                $request->sample_download_file_1->move(public_path("storage/blog/$request->blog_id"), $fileName);
                $blog->download1_link = $fileName;
                $blog->save();
            }
            if(isset($request->sample_download_file_2)) {
                $fileName = (time() + 1).'.'.$request->sample_download_file_2->extension();
                $request->sample_download_file_2->move(public_path("storage/blog/$request->blog_id"), $fileName);
                $blog->download2_link = $fileName;
                $blog->save();
            }
        }

        if($request->title_id == 11) {
            if(isset($request->merchant_banner_img)) {
                $fileName = time().'.'.$request->merchant_banner_img->extension();
                $request->merchant_banner_img->move(public_path("storage/blog/$request->blog_id"), $fileName);
                $blog->merchant_banner_img = $fileName;
                $blog->save();
            }
        }

        if($request->title_id == 14) {
            BlogDetailsFaq::where("blog_details_id", $blog->id)->delete();
            for($i = 0; $i < count($input['question_en']); $i++) {
                $blogDetailsFaq   =   new BlogDetailsFaq();
                $blogDetailsFaq->blog_details_id =$blog->id;
                $blogDetailsFaq->question_en = $input['question_en'][$i];
                $blogDetailsFaq->question_tc = $input['question_sc'][$i];
                $blogDetailsFaq->question_sc = $input['question_tc'][$i];
                $blogDetailsFaq->answer_en = $input['answer_en'][$i];
                $blogDetailsFaq->answer_tc = $input['answer_tc'][$i];
                $blogDetailsFaq->answer_sc = $input['answer_sc'][$i];
                $blogDetailsFaq->save();
            }
        }
        Session::flash('flash_message', 'Blog Details Updated!');
        return response()->json(["status" => 'success']);

    }

    public function getBlogDetailsFormSubmissionsList(Request $request)
    {
        $page         = "blog_form";
        // $blogDetailsFormList = BlogDetailsForm::whereIsPublished(true)->get();
        return view('admin.blog.detailsformsubmissionlist', compact('page'));
    }

    public function getDataFormSubmissions(Request $request)
    {
        return $this->blogRepo->getBlogsFormSubmisions($request);
    }

    public function getBlogDetailsFormSubmissions(Request $request)
    {
        $data = $this->blogRepo->getBlogsFormSubmisionsDetails($request->id);
        return view('admin.blog.detailsformsubmission', ['data' => $data]);
    }

    public function blogFaqForm(Request $request)
    {
        $attr       = $request->attr;
        $index       = $request->index;
        $returnHtml = [];

        foreach (config('lng.attr') as $lngcode => $attr) {
            $html = view('admin.blog.blogfaqform')
                ->with(["attr" => $attr,"index" => $index])
                ->render();
            array_push($returnHtml, $html);
        }

        return $returnHtml;
    }

    public function getSubCategory(Request $request)
    {
        $category_id = $request->category_id;
        if($category_id !== NULL)
        {
            $data = BlogTag::where('blog_category_id', $category_id)->select('id','name_en')->get();
        } else {
            $data = [];
        }

        return response()->json([
            'success' => true,
            'lists' => $data,
        ]);
    }

}
