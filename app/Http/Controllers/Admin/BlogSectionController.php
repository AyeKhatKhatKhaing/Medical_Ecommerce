<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogDetails;
use App\Models\BlogDetailsFaq;
use App\Models\BlogImage;
use App\Models\BlogSection;
use App\Models\BlogSectionFeature;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogSectionController extends Controller
{
    public $page  =  'blog';

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($blog_id, $section_id)
    {
        $page         = $this->page;
        $type = 'section';
        $section = BlogSection::findOrFail($section_id);

        return view('admin.blog-section.details', compact('page', 'type', 'section','blog_id','section_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog_id, $section_id)
    {
        $section = BlogSection::findOrFail($section_id);
        $data = [];
        $data['section_name_en'] = $request->section_name_en;
        $data['section_name_sc'] = $request->section_name_sc;
        $data['section_name_tc'] = $request->section_name_tc;
        if(isset($request->feature_type))
        {
            $data['feature_type'] = json_encode($request->feature_type);
        } else {
            $data['feature_type'] = NULL;
        }
        $data['blog_id'] = $blog_id;
        $data['sort_no'] = $request->sort_no;
        $section->update($data);

        return redirect()->back()->with('flash_message', 'Section Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog_id, $id)
    {
        BlogSection::where('id', $id)->delete();
        return redirect()->back()->with('flash_message', 'Section Deleted!');
    }

    public function feature(Request $request, $blog_id, $section_id, $arr_id)
    {
        $page         = $this->page;
        $section = BlogSection::findOrFail($section_id);
        $type = json_decode($section->feature_type)[$arr_id-1];
        $productList  = Product::whereIsPublished(true)->get();
        $couponList  = Coupon::whereIsPublished(true)->where('coupons.owner_type',1)->get();
        $blogList  = Blog::whereIsPublished(true)->where("id", "!=", $blog_id)->get();
        $blogInfo  = Blog::find($blog_id);
        $subCategoryList  = SubCategory::whereIsPublished(true)->get();
        $key_item_list = DB::table('key_item_tags')
        ->whereNull('key_item_tags.deleted_at')
        ->where('key_item_tags.is_published', 1)
        ->groupBy('key_item_tags.id', 'key_item_tags.name_en', 'key_item_tags.name_tc', 'key_item_tags.name_sc', 'key_item_tags.img')
        ->select(
            'key_item_tags.id',
            'key_item_tags.name_en',
            'key_item_tags.name_tc',
            'key_item_tags.name_sc'
        )->get();

        $highlight_tag_list = DB::table('highlight_tags')
        ->whereNull('highlight_tags.deleted_at')
        ->where('highlight_tags.is_published', 1)
        ->groupBy('highlight_tags.id', 'highlight_tags.name_en', 'highlight_tags.name_tc', 'highlight_tags.name_sc', 'highlight_tags.img')
        ->select(
            'highlight_tags.id',
            'highlight_tags.name_en',
            'highlight_tags.name_tc',
            'highlight_tags.name_sc'
        )->get();

        $array_no = $arr_id - 1;
        $extFeature = BlogSectionFeature::where('blog_id',$blog_id)->where('section_id',$section_id)->where('type', $type)->where('array_no', $array_no)->first();

        return view('admin.blog-section.details', compact('page', 'type', 'blog_id', 'section_id', 'productList', 'couponList', 'blogList', 'key_item_list', 'highlight_tag_list', 'subCategoryList', 'section','blogInfo','arr_id','extFeature'));
    }
    

    public function saveFeature(Request $request, $blog_id, $section_id, $arr_id)
    {
        $type = $request->featuretype;
        $array_no = $arr_id - 1;

        // Manage Data
        $data = [];
        $data['blog_id'] = $blog_id;
        $data['section_id'] = $section_id;
        $data['array_no'] = $array_no;
        $data['type'] = $type;
        $data['sort_no'] = $request->sort_order_no;

        if($type == 'description' || $type == 'table' || $type == 'header-table' || $type == 'memo' || $type == 'form-submission')
        {
            $data['desc_en'] = $request->desc_en;
            $data['desc_sc'] = $request->desc_sc;
            $data['desc_tc'] = $request->desc_tc;
        } 
        else if($type == 'product-comparison' || $type == 'product-listing')
        {
            $data['product_ids'] = json_encode($request->product_ids);
        } 
        else if($type == 'download')
        {
            $data['download_name_en'] = json_encode($request->download_name_en);
            $data['download_name_tc'] = json_encode($request->download_name_tc);
            $data['download_name_sc'] = json_encode($request->download_name_sc);
            if(isset($request->sample_download_file)) 
            {
                foreach($request->sample_download_file as $file)
                {
                    $fileName = time().'.'.$file->extension();
                    $file->move(public_path("storage/blog/$request->blog_id"), $fileName);
                    $files[] = $fileName;
                }
            }
            $data['sample_download_file'] = json_encode($files);
        } 
        else if($type == 'coupon')
        {
            $data['coupon_ids'] = json_encode($request->coupon_ids);
        }
        else if($type == 'banner')
        {
            if(isset($request->merchant_banner_img)) 
            {
                $data['merchant_banner_img'] = $this->getImagePath($request->merchant_banner_img);
            }
        }
        else if($type == 'further')
        {
            $data['further_name_en'] = json_encode($request->further_name_en);
            $data['further_name_tc'] = json_encode($request->further_name_tc);
            $data['further_name_sc'] = json_encode($request->further_name_sc);
            $data['further_url'] = json_encode($request->further_url);
        }
        else if($type == 'product-filter')
        {
            $data['key_item_ids'] = json_encode($request->key_item_ids);
            $data['highlight_tag_ids'] = json_encode($request->highlight_tag_ids);
            $data['sub_category_id'] = $request->sub_category_id;
        }
        else if($type == 'video')
        {
            $data['desc_en'] = $request->desc_en;
            $data['desc_sc'] = $request->desc_sc;
            $data['desc_tc'] = $request->desc_tc;
            $data['video_url'] = $request->video_url;
        } 
        else if($type == 'image')
        {
            $data['desc_en'] = $request->desc_en;
            $data['desc_sc'] = $request->desc_sc;
            $data['desc_tc'] = $request->desc_tc;
            $data['image_url'] = $request->image_url;
            if(isset($request->holder5)) 
            {
                foreach($request->holder5 as $image)
                {
                    $image_path[] = $this->getImagePath($image);
                }
                $data['image_gallery_path'] = json_encode($image_path);
            }
            $altString = 'hidden-image_gallery_alt_text';
            $data['image_gallery_alt_text'] = json_encode(explode(',', $request->$altString));
        }
        else if($type == 'button')
        {
            $data['button_title_en'] = $request->button_title_en;
            $data['button_title_tc'] = $request->button_title_tc;
            $data['button_title_sc'] = $request->button_title_sc;
            $data['button_url_en'] = $request->button_url_en;
            $data['button_url_tc'] = $request->button_url_tc;
            $data['button_url_sc'] = $request->button_url_sc;
        }
        else if($type == 'faq')
        {
            $data['faq_question_en'] = json_encode($request->question_en);
            $data['faq_question_tc'] = json_encode($request->question_tc);
            $data['faq_question_sc'] = json_encode($request->question_sc);
            $data['faq_answer_en'] = json_encode($request->answer_en);
            $data['faq_answer_tc'] = json_encode($request->answer_tc);
            $data['faq_answer_sc'] = json_encode($request->answer_sc);
        }

        $extFeature = BlogSectionFeature::where('blog_id',$blog_id)->where('section_id',$section_id)->where('type', $type)->where('array_no', $array_no)->first();
        
        if($extFeature)
        {
            $feature = BlogSectionFeature::findOrFail($request->feature_id);
            $feature->update($data);
        } else {
            BlogSectionFeature::create($data);
        }

        return redirect()->back()->with('flash_message', 'Feature Updated!');
    }

    public function deleteFeature($blog_id, $section_id, $arr_id, $feature_id)
    {
        $array_no = $arr_id-1;
        $section = BlogSection::findOrFail($section_id);
        $types = json_decode($section->feature_type);
        unset($types[$array_no]);

        BlogSectionFeature::where('id', $feature_id)->delete();

        $features = BlogSectionFeature::where('section_id', $section_id)->where('array_no', '>', $array_no)->get();
        foreach ($features as $feature)
        {
            $feature->update([
                'array_no' => $feature->array_no - 1
            ]);
        }

        $new_types = array_values($types);
        $section->update([
            'feature_type' => json_encode($new_types)
        ]);

        return redirect('/admin/blog/'.$blog_id.'/section/'.$section_id.'/edit')->with('flash_message', 'Feature Deleted!');
    }

    public function getImagePath($requestData)
    {
        $domain = config('app.url');
        $split = explode($domain, $requestData);
        $image_path = end($split);
        $check = str_starts_with($image_path, '/');
        if($check == true)
        {
            $image_path = $image_path;
        } else {
            $image_path = '/'.$image_path;
        }
        
        return $image_path;
    }

    public function blog_translate(Request $request)
    {
        $val         = $request->val;
        $content     = $request->cont;

        $fields      = [
            "content"    => $content
        ];

        $data = autoTranslate($val, $fields);

        return $data;

    }

    public function blog_eng_translate(Request $request)
    {
        $val         = $request->val;
        $content     = $request->cont;

        $fields      = [
            "content"    => $content
        ];

        $data = autoTranslateToEng($val, $fields);

        return $data;
    }
}
