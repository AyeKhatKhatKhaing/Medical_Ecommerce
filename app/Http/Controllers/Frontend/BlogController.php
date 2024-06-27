<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Category;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\BlogSubsriber;
use App\Models\BlogDetailsForm;
use App\Models\User as Merchant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BlogCms;
use App\Models\BlogDetailsLikeDislike;
use App\Models\BlogSection;
use App\Models\BlogTag;
use Illuminate\Support\Facades\Validator;
use App\Rules\CheckPhoneNumber;
use App\Models\SeoPage;
class BlogController extends Controller
{
    /**
     * Coupon List
     */
    public function index(Request $request)
    {
        $blogCategory = BlogCategory::whereIsPublished(true)->get();
        $blog = Blog::whereIsHomeFeatured(true)->whereIsPublished(true)->limit(3)->get();
        $seo = SeoPage::where("title","blog_list")->first();
        $cmsdata = BlogCms::first();
        $data =[
            'blogCategory'=> $blogCategory,
            'blog'=>$blog,
            'seo'=>$seo,
            'cmsdata'=>$cmsdata
        ];
        return view('frontend.blog.list',$data);
    }

    public function blogListByCategoryName(Request $request) {
        $category = BlogCategory::where("name_en",$request->category_name)->first();
        if(!$category) {
            return view('errors.404');
        }
        $blog = Blog::where("category_id",$category->id)->whereIsPublished(true)->paginate(7);

        if(isset($request->subcategory))
        {
            $subcategory = BlogTag::where("name_en",$request->subcategory)->first();
            if(!$subcategory) {
                return view('errors.404');
            }
            $blog = Blog::where("category_id",$category->id)->where("tag_id",$subcategory->id)->whereIsPublished(true)->paginate(7);
        }
        $blogCategory = BlogCategory::whereIsPublished(true)->get();
        $seo = SeoPage::where("title","blog_category_list")->first();
        $cmsdata = BlogCms::first();
        $data =[
            'category'=> $category,
            'subcat'=> $request->subcategory,
            'blog'=>$blog,
            'blogCategory'=>$blogCategory,
            'seo'=>$seo,
            'cmsdata'=>$cmsdata
        ];
        return view('frontend.blog.list-by-category',$data);
    }

    public function blogListSearchByFilterKeywords(Request $request) {
        $seo = SeoPage::where("title","blog_filter_keywords_list")->first();
        $blog = Blog::select("blog.*")
                    ->where("related_keywords",$request->filter_keywords)
                    ->orWhere("related_keywords","LIKE","%$request->filter_keywords%,%")
                    ->orWhere("related_keywords","LIKE","%,%$request->filter_keywords%,%")
                    ->orWhere("related_keywords","LIKE","%,%$request->filter_keywords%")
                    ->whereIsPublished(true)
                    ->paginate(7);
        
        // Search Similar Keywords
        $similarKeys = [];
        $blogs = Blog::whereIsPublished(true)->get();
        foreach($blogs as $keyword)
        {
            $words = explode(',',$keyword->related_keywords);
            foreach ($words as $value) {
                if (stripos($value, $request->filter_keywords) !== FALSE) {
                    $similarKeys[] = $value;
                }
            }
        }
        $related_keywords = array_unique($similarKeys);

        $blogCategory = BlogCategory::whereIsPublished(true)->get();
        $cmsdata = BlogCms::first();
        $data =[
            'filterKeywords'=> $request->filter_keywords,
            'related_keywords'=> $related_keywords,
            'blog'=>$blog,
            'blogCategory'=>$blogCategory,
            'seo'=>$seo,
            'cmsdata'=>$cmsdata
        ];
        return view('frontend.blog.list-by-filter-keywords',$data);
    }
   
    // public function blogDetails(Request $request) {
    //     $blogDetails = Blog::where("slug_en",$request->slug)->whereIsPublished(true)->first();
    //     $relatedProducts = Product::whereIsPublished(true)->limit(8)->get();

    //     if(!$blogDetails) {
    //         return view('errors.404');
    //     }
    //     //$seo = SeoPage::where("title","blog_details")->first();
    //     $seo = new \stdClass();
    //     $seo->meta_title_en =  $blogDetails->meta_title_en;
    //     $seo->meta_title_sc =  $blogDetails->meta_title_sc;
    //     $seo->meta_title_tc =  $blogDetails->meta_title_tc;
    //     $seo->meta_description_en =  $blogDetails->meta_description_en;
    //     $seo->meta_description_sc =  $blogDetails->meta_description_sc;
    //     $seo->meta_description_tc =  $blogDetails->meta_description_tc;
    //     $seo->meta_image =  $blogDetails->meta_image;
    //     $data =[
    //         'blogDetails'=> $blogDetails,
    //         'relatedProducts' => $relatedProducts,
    //         'seo'=>$seo
    //     ];
    //     return view('frontend.blog.details_bk',$data);

    // }

    public function blogDetails(Request $request) {
        $blogDetails = Blog::where("slug_en",$request->slug)->whereIsPublished(true)->first();
        $relatedProducts = Product::whereIsPublished(true)->where('sub_category_id', $blogDetails->related_products_sub_category_id)->orderby('is_recommend','desc')->limit(8)->get();
        $sections = BlogSection::where('blog_id', $blogDetails->id)->orderBy('sort_no')->get();
        $popularArticles = Blog::where('category_id', $blogDetails->category_id)
                            ->whereIsPublished(true)
                            ->whereIsPopular(true)
                            ->where('id', '<>', $blogDetails->id)
                            ->limit(5)
                            ->get();

        if(!$blogDetails) {
            return view('errors.404');
        }
        
        $seo = new \stdClass();
        $seo->meta_title_en =  $blogDetails->meta_title_en;
        $seo->meta_title_sc =  $blogDetails->meta_title_sc;
        $seo->meta_title_tc =  $blogDetails->meta_title_tc;
        $seo->meta_description_en =  $blogDetails->meta_description_en;
        $seo->meta_description_sc =  $blogDetails->meta_description_sc;
        $seo->meta_description_tc =  $blogDetails->meta_description_tc;
        $seo->meta_image =  $blogDetails->meta_image;
        $data =[
            'blogDetails'=> $blogDetails,
            'sections'=> $sections,
            'popularArticles'=> $popularArticles,
            'relatedProducts' => $relatedProducts,
            'seo'=>$seo
        ];
        return view('frontend.blog.details',$data);

    }

    public function blogDetailsFormSubmissions(Request $request) {
        $request->validate([
            'first_name' => ["required"],
            'last_name' => ["required"],
            'email' => ["required","email"],
            'phone' => ["nullable","regex:/^(\+?\d{2,3})(\d{8})$/i",new CheckPhoneNumber],
            'g-recaptcha-response' => ["required"],
        ]);
        $blog = new BlogDetailsForm();
        $input    = $request->all();
        $input['phone_no1'] = $request->phone;
        $input['to_learn_more_options'] = implode(", ",$request->to_learn_more_options);
        $blog->fill($input)->save();
        return response()->json(['status'=>'success']);
    }

    public function blogDetailsLikeDislike(Request $request) {
        $blogLikeDisLike = BlogDetailsLikeDislike::where("blog_id",$request->blog_id)->where("customer_id",auth()->guard('customer')->user()->id)->first();
        if(!$blogLikeDisLike) {
            $blogLikeDisLike = new BlogDetailsLikeDislike();
            $blogLikeDisLike->blog_id = $request->blog_id;
            $blogLikeDisLike->customer_id = auth()->guard('customer')->user()->id;
            $blogLikeDisLike->like = $request->btn_type=='like'?1:0;
            $blogLikeDisLike->dislike = $request->btn_type=='like'?0:1;
        }else{
            if($blogLikeDisLike->like==1 && $request->btn_type=='like') {
                $blogLikeDisLike->like = 0;
            }else{
                $blogLikeDisLike->like = $request->btn_type=='like'?1:0;
            }
            if($blogLikeDisLike->dislike==1 && $request->btn_type=='dislike') {
                $blogLikeDisLike->dislike = 0;
            }else{
                $blogLikeDisLike->dislike = $request->btn_type=='like'?0:1;
            }
        }
       
        $blogLikeDisLike->save();
        return response()->json(['status'=>'success']);
    }
    public function subscribe(Request $request){
        // dd($request);
        $validator = Validator::make(request()->all(), [
            'email' => 'required|string|max:255|email|unique:blog_subsribers',
        ]);
        
        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()], 422); // Return error messages and a 422 status code (Unprocessable Entity).
        }
        
        $subscribe = new BlogSubsriber();
        $subscribe->email = $request->email;
        $subscribe->save();
        return response()->json(["status" => "ok"]);
    }
}
