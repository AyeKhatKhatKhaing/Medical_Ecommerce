<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Models\FaqLike;
use App\Models\FaqPage;
use App\Models\ContactUs;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use App\Repositories\FaqRepo;
use App\Models\FaqSubCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    //
    protected $faqRepo;

    public function __construct(FaqRepo $faqRepo)
    {
        $this->faqRepo         = $faqRepo;
    }
    public function index()
    {
        $categories = FaqCategory::where('is_published', 1)->whereNull('deleted_at')->get();
        $popular_questions = Faq::where('is_published', 1)->whereNull('deleted_at')->where('is_popular',1)->get()->take(5);
        // $popular_questions = Faq::where('is_published', 1)
        // ->whereNull('deleted_at')
        // ->leftJoin('faq_likes', 'faqs.id', '=', 'faq_likes.faq_id')
        // ->where('faq_likes.like_status', 1)
        // ->groupBy('faqs.id')
        // ->select('faqs.*', DB::raw('count(faq_likes.id) as like_count'))
        // ->orderBy('like_count', 'desc')
        // ->get()->take(5);
        $contact = ContactUs::whereNull('deleted_at')->first();
        $faq_page = FaqPage::first();
        // dd($popular_questions);
        return view('frontend.faq.index', compact('categories', 'popular_questions', 'contact','faq_page'));
    }

    public function search(Request $request)
    {
        $query = $request->search;
        $keyword = $request->search;
        $category_id = $request->category_id;
        $catego = FaqCategory::where('id', $category_id)->first();
        $faqs = array();  
        $faqs = $this->faqRepo->faqSearch($request);
        if (sizeof($faqs) > 0) {
            return view('frontend.faq.faq-search', compact('faqs','catego','keyword'));
        }
        // return trans('labels.header.no_result');
        return view('frontend.faq.faq-search', compact('faqs','catego','keyword'));
    }

    public function changeStatus(Request $request)
    {
        $customer = Auth::guard('customer')->user();
        if ($customer) {
            $faq_like_update = $customer->user_liked()->where('faq_id', $request->id)->first();
            $attributes = [
                'customer_id' => $customer->id,
                'faq_id' => $request->id,
                'like_status' => $request->likeStatus,
            ];


            if ($faq_like_update && $faq_like_update->like_status == $request->likeStatus && $customer->id == $faq_like_update->customer_id) {
                $faq_like_update->delete();
            }
            else{
                FaqLike::updateOrCreate(['customer_id' => $customer->id, 'faq_id' => $request->id], $attributes);
            }
            $like = FaqLike::where('faq_id', $request->id)
                ->where('like_status', 1)
                ->count();

            $unlike = FaqLike::where('faq_id', $request->id)
                ->where('like_status', 2)
                ->count();

            $data = [
                'like_count' => $like,
                'unlike_count' => $unlike,
                'id' => $request->id,
            ];
        }

        return response()->json([
            'data' => $data,
        ]);
    }

    public function category(Request $request)
    {
        
        // dd($request->keyword);
        if($request->search){
            $keyword = $request->search;
            $catego = FaqCategory::first();
            $categories = FaqCategory::where('is_published', 1)->whereNull('deleted_at')->get();
            $faqs = $this->faqRepo->faqSearch($request);
            return view('frontend.faq.category', compact('categories','faqs','keyword','catego'));
        }
        if($request->subCategory){
            // dd($request->subCategory);
            $subcategory_id = $request->subCategory;
            $catego = FaqCategory::first();
            $subcategory = FaqSubCategory::where('id', $subcategory_id)->first();
            $categories = FaqCategory::where('is_published', 1)->whereNull('deleted_at')->get();
            $faqs = $this->faqRepo->faqSearch($request);
            return view('frontend.faq.category', compact('categories','faqs','subcategory_id','subcategory','catego'));
        }
        if($request->category){
            $category_id = $request->category;
            $catego = FaqCategory::first();
            $category = FaqCategory::where('id', $category_id)->first();
            $categories = FaqCategory::where('is_published', 1)->whereNull('deleted_at')->get();
            $faqs = $this->faqRepo->faqSearch($request);
            return view('frontend.faq.category', compact('categories','faqs','category_id','category','catego'));
        }
        if(empty($catego)){
            abort(404);
        }
    }

    public function subCategory($id)
    {
        $categories = FaqCategory::where('is_published', 1)->whereNull('deleted_at')->get();
        $subcategory = FaqSubCategory::where('id', $id)->first();
        if(empty($subcategory)){
            abort(404);
        }
        return view('frontend.faq.sub-category', compact('categories', 'subcategory'));
    }

    public function searchKeyword(Request $request)
    {
        $query = $request->search;
        $keyword = $request->search;
        $category_id = $request->category_id;
        $catego = FaqCategory::where('id', $category_id)->first();
        $faqs = array();  
        $faqs = $this->faqRepo->faqSearch($request);
        if (sizeof($faqs) > 0) {
            return view('frontend.faq.faq-search', compact('faqs','catego','keyword'));
        }
        // return trans('labels.header.no_result');
        return view('frontend.faq.faq-search', compact('faqs','catego','keyword'));
    }

    public function detail($id){
        $categories = FaqCategory::where('is_published', 1)->whereNull('deleted_at')->get();
        $faq = Faq::where('id', $id)->first();
        if(empty($faq)){
            abort(404);
        }
        $catego = FaqCategory::where('id', $faq->category_id)->first();
        if(empty($catego)){
            abort(404);
        }
        $related_faq_sub_category = Faq::where('sub_category_id', $faq->sub_category_id)->where('id','!=',$faq->id)->where('is_published', 1)->whereNull('deleted_at')->get()->take(5);
        // dd($related_faq_sub_category);
        $related_faq_category = Faq::where('category_id', $faq->category_id)->where('id','!=',$faq->id)->where('is_published', 1)->whereNull('deleted_at')->get()->take(5);
        return view('frontend.faq.detail', compact('categories', 'faq', 'related_faq_sub_category','catego','related_faq_category'));
    }
}
