<?php


namespace App\Repositories;


use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\CouponProduct;
use App\Models\CouponAttribute;
use App\Models\ProductLocation;
use App\Models\ProductPriceTag;
use App\Models\ProductAddOnItem;
use App\Models\ProductVariation;
use App\Models\ProductFeatureTag;
use App\Models\ProductSubCategory;
use App\Models\ProductTimeSlotTag;
use Illuminate\Support\Facades\DB;
use App\Models\ProductHighlightTag;
use App\Models\ProductKeyItemTag;
use App\Models\ProductRecommendTag;
use App\Models\ProductSupplementary;
use App\Models\ProductVaccineStockTag;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVaccineFactoryTag;
use Yajra\DataTables\Facades\DataTables;

class ProductRepo
{
    public function getData($request)
    {
        $product = new Product();
        $search   = $request->search;
        $merchant   = $request->merchant;
        $category   = $request->category;
        $sub_category   = $request->sub_category;
        $sub_category_id   = $request->sub_category_id;
        $isFeaturedHome = $request->get('home_featured');
        $isRecommend = $request->get('recommend');
        $product = Product::leftJoin('users', function ($join) {
            return $join->on('users.id', '=', 'products.merchant_id');
        })->select('products.*', 'users.name_en as merchant_name');
        if(!empty($search)) {
            $product = $product->where(function ($query) use($search){
            return $query->where('products.name_en', 'LIKE', "%$search%")
                ->orWhere('products.name_tc', 'LIKE', "%$search%")
                ->orWhere('products.name_sc', 'LIKE', "%$search%")
                ->orWhere('products.product_code', 'LIKE', "%$search%");
            });
        }
        if (isset($merchant) && $merchant != 'all') {
            $product = $product->where('products.merchant_id', $merchant);
        }
        if (isset($category) && $category != 'all') {
            $product = $product->where('products.category_id', $category);
        }
        if(isset($sub_category_id)  && $sub_category_id != 'all'){
            $product = $product->where('products.sub_category_id', $sub_category_id);
        }
        if(isset($category)  && $category != 'all' && isset($sub_category_id)  && $sub_category_id != 'all'){
            $product = $product->where('products.category_id', $category)->where('products.sub_category_id', $sub_category_id);
        }

        if($isFeaturedHome != null){
            if($sub_category != 'all' && $sub_category != null){
                $product = $product->where('sub_category_id',$sub_category)->where('is_show_home',1)->orderBy('sort_by_for_home','asc')->get();
            }else{
                $product = $product->where('is_show_home',1)->orderBy('sort_by_for_home','asc')->get();
            }
        }elseif($isRecommend != null){
            $product = $product->where('is_recommend',1)->orderBy('sort_by_for_recommend','asc')->get();
        }else{
            $product = $product->get();
        }
        $datatables = DataTables::of($product)
            ->addIndexColumn()
            ->addColumn('no', function ($product) {
                return '';
            })->editColumn('image', function ($product) {
                $img = isset($product->featured_img) ? $product->featured_img : asset('/backend/media/blank-image.svg');
                return "<img src='" . $img . "'style='width: 95px;height: 50px !important;'/>";
            })->editColumn('product_code', function ($product) {
                $product_code  = $product->product_code;

                return $product_code;
            })->editColumn('name', function ($product) {
                $name  = $product->name_en;
                return $name;
            })->editColumn('category_name', function ($product) {
                $category_name  = $product->category->name_en;
                return $category_name;
            })->editColumn('sub_category_name', function ($product) {
                $category_name  = $product->subCategory->name_en;
                return $category_name;
            })->editColumn('recommend', function ($product) {
                $btn = "";
                $btn     .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route    = "'" . route('productRecommend') . "'";
                if ($product->is_recommend) {
                    $btn .= '<input data-id="' . $product->id . '" onclick="statusChange(' . $product->id . ',' . $route . ')"
                            class="categories-toggle-class form-check-input" type="checkbox"
                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                            data-on="1" data-off="0" checked >';
                    $btn .= '</div>';
                } else {
                    $btn .= '<input data-id="' . $product->id . '" onclick="statusChange(' . $product->id . ',' . $route . ')"
                            class="categories-toggle-class form-check-input" type="checkbox"
                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                            data-on="1" data-off="0"  >';
                    $btn .= '</div>';
                }

                return $btn;
            })->editColumn('is_book_count', function ($product) {
                $btn = "";
                $btn     .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route    = "'" . route('product.changeBookCount') . "'";
                if ($product->is_book_count) {
                    $btn .= '<input data-id="' . $product->id . '" onclick="statusChange(' . $product->id . ',' . $route . ')"
                            class="categories-toggle-class form-check-input" type="checkbox"
                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                            data-on="1" data-off="0" checked >';
                    $btn .= '</div>';
                } else {
                    $btn .= '<input data-id="' . $product->id . '" onclick="statusChange(' . $product->id . ',' . $route . ')"
                            class="categories-toggle-class form-check-input" type="checkbox"
                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                            data-on="1" data-off="0"  >';
                    $btn .= '</div>';
                }

                return $btn;
            })
            ->editColumn('is_show_home', function ($product) {
                if($product->sub_category_id == 1  || $product->sub_category_id == 2 || $product->sub_category_id == 3){
                    $isDisabled = '';
                }   else{
                    $isDisabled = 'disabled';
                }
                $btn = "";
                $btn     .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route    = "'" . route('product.showHome') . "'";
                if ($product->is_show_home) {
                    $btn .= '<input data-id="' . $product->id . '" onclick="statusChange(' . $product->id . ',' . $route . ')"
                            class="categories-toggle-class form-check-input" type="checkbox"
                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                            data-on="1" data-off="0" checked >';
                    $btn .= '</div>';
                } else {
                    $btn .= '<input data-id="' . $product->id . '" onclick="statusChange(' . $product->id . ',' . $route . ')"
                            class="categories-toggle-class form-check-input" type="checkbox"
                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                            data-on="1" data-off="0"  '.$isDisabled.'>';
                    $btn .= '</div>';
                }

                return $btn;
            })
            ->editColumn('sort_by', function ($product) {
                $input = "";
                $input     .= '<div class="">';
                $route    = "'" . route('product.updateSortValue') . "'";
                $input .= '<input data-id="' . $product->id . '" value="' . $product->sort_by_for_home . '"  onkeyup="sortByKeyUp(' . $product->id . ',' . $route . ')"
                            class="form-control" type="number" id="proudctIds'. $product->id .'">';
                    $input .= '</div>';

                return $input;
            })
            ->editColumn('sort_for_recommend', function ($product) {
                $input = "";
                $input     .= '<div class="">';
                $route    = "'" . route('product.updateRecommendSortValue') . "'";
                $input .= '<input data-id="' . $product->id . '" value="' . $product->sort_by_for_recommend . '"  onkeyup="sortByKeyUp(' . $product->id . ',' . $route . ')"
                            class="form-control" type="number" id="proudctIds'. $product->id .'">';
                    $input .= '</div>';

                return $input;
            })
            ->editColumn('is_published', function ($product) {
                $btn = "";
                $btn     .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route    = "'" . route('product.isPublishStatus') . "'";
                if ($product->is_published) {
                    $btn .= '<input data-id="' . $product->id . '" onclick="statusChange(' . $product->id . ',' . $route . ')"
                            class="categories-toggle-class form-check-input" type="checkbox"
                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                            data-on="1" data-off="0" checked >';
                    $btn .= '</div>';
                } else {
                    $btn .= '<input data-id="' . $product->id . '" onclick="statusChange(' . $product->id . ',' . $route . ')"
                            class="categories-toggle-class form-check-input" type="checkbox"
                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                            data-on="1" data-off="0"  >';
                    $btn .= '</div>';
                }

                return $btn;
            })

            ->editColumn('updated_by', function ($product) {
                $latest_update   =  '';
                $latest_update  .= $product->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-bold'>";
                $latest_update  .= $product->updated_by ? $product->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })->addColumn('action', function ($area) {
                $btn  = '';

                $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                            <a href="' . route('products.edit', $area->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>

                        </div>';

                return "<div class='action-column'>" . $btn . "</div>";
            })

            ->rawColumns(['image', 'product_code', 'name', 'category_name', 'sub_category_name','recommend','is_book_count', 'is_published','is_show_home','sort_by','sort_for_recommend','updated_by', 'action']);

        return $datatables->make(true);
    }

    public function saveProduct(Request $request, $id = null)
    {
        // dd($request->merchant_locations);
        $input = $request->all();
        // if(!existImagePath($input['featured_img'])){
        //     $input['featured_img'] = null ;
        // }else{
        //     $input['featured_img'] = getImage($request->featured_img) ;

        // }
        if(!existImagePath($input['meta_image'])){
        $input['meta_img'] = null ;
        }else{
        $input['meta_img'] = getImage($request->meta_image) ;
        }
        // dd($input['meta_img'],$input['featured_img']);

        if ($id === NULL) {
            $product = new Product();
        } else {
            $product = Product::findOrFail($id);
        }
        foreach (['en', 'tc', 'sc'] as $lng) {
            $input['slug_' . $lng] = Str::slug($request['slug_' . $lng] != null ? $request['slug_' . $lng] : $request['name_' . $lng]);
        }
        $input['is_two_recipient'] = $request->is_two_recipient == 'on' ? 1 : 0;
        $saved  = $product->fill($input)->save();

        $product_id = $product->id;

        // coupon create/update
        // $merchantNull = Coupon::whereNull('merchant_id')->get();
        // $coupons = Coupon::where('merchant_id', $request->merchant_id)->get();
        // if (count($coupons) > 0) {
        //     if ($id != null) {
        //         CouponProduct::where('product_id', $id)->where('merchant_id', $product->merchant_id)->delete();
        //     }
        //     foreach ($coupons as $coupon) {
        //         CouponProduct::create([
        //             'coupon_id' => $coupon->id,
        //             'merchant_id' => $request->merchant_id,
        //             'product_id' => $product_id,
        //         ]);
        //     }
        // }
        // if (count($merchantNull) > 0) {
        //     foreach ($merchantNull as $coupon) {
        //         $c_sub_cate_id = $coupon->couponAttributes->where('sub_category_id', $request->sub_category_id);
        //         $c_cate_id = $coupon->couponAttributes->where('category_id', $request->category_id);

        //         if (count($c_cate_id) > 0 || count($c_sub_cate_id) > 0) {
        //             if ($id != null) {
        //                 CouponProduct::where('product_id', $id)->whereNull('merchant_id')->delete();
        //             }
        //             CouponProduct::create([
        //                 'coupon_id' => $coupon->id,
        //                 'product_id' => $product_id,
        //             ]);
        //         }
        //     }
        // }
        // $product->productsVariations()->createMany([$request->variables]);
        if (isset($request->gallery_img) && $request->gallery_img[0] != null && isset($request->image_order) && count($request->image_order) > 0) {
            $image1 = $request->image_order;
            $image2 = explode(",", $request->gallery_img[0]);
            $gallery = array_merge($image1, $image2);
        } elseif (isset($request->gallery_img) && $request->gallery_img[0] != null) {
            $gallery = explode(",", $request->gallery_img[0]);
        } elseif (isset($request->image_order) && count($request->image_order) > 0) {
            $gallery = $request->image_order;
        } else {
            $gallery = [];
        }

        // if(isset($request->sub_category_id) && count($request->sub_category_id) > 0 ){
        //     if($id != null){
        //         $this->removeProductsCategoryBy($id);
        //     }
        //     foreach ($request->sub_category_id as $item) {
        //         $this->addProductSubCategory($product_id,$product->category_id, $item);
        //     }
        // }
        if (isset($request->variables) && count($request->variables) > 0) {
            if ($id != null) {
                // $this->removeProdutsVariableBy($id);
                $v_ids = collect($input['variables'])->pluck('id')->toArray();
                ProductVariation::where('product_id', $product_id)->whereNotIn('id',$v_ids)->delete();
                foreach ($request->variables as $item) {
                    $p_vs = ProductVariation::where('product_id', $product_id)->where('id',$item['id'])->first();
                    if($p_vs != null){
                        $p_vs->update([
                            'product_id' => $product_id,
                            'name_en' => $item['name_en'],
                            'name_tc' => $item['name_tc'],
                            'name_sc' => $item['name_sc'],
                            'sku' => $item['sku'],
                            'original_price' => $item['original_price'],
                            'discount_price' => $item['discount_price'],
                            'promotion_price' => $item['promotion_price'],
                            'stock' => $item['stock'],
                            'number_of_dose' => $item['number_of_dose'],
                        ]);
                    }else{
                        $this->addProdutsVariables($product_id, $item);
                    }
                }
            }else{
                foreach ($request->variables as $item) {
                    $this->addProdutsVariables($product_id, $item);
                }
            }
        }

        if (isset($request->price_tag_id) && count($request->price_tag_id) > 0) {
            if ($id != null) {
                $this->removeProductsPriceTagBy($id);
            }
            foreach ($request->price_tag_id as $item) {
                $this->addProdutsPriceTags($product_id, $item);
            }
        }
        else{
            $this->removeProductsPriceTagBy($id);
        }

        if (isset($request->time_slot_tag_id) && count($request->time_slot_tag_id) > 0) {
            if ($id != null) {
                $this->removeProductsTimeSlotTagBy($id);
            }
            foreach ($request->time_slot_tag_id as $item) {
                $this->addProdutsTimeSlotTags($product_id, $item);
            }
        }
        else{
            $this->removeProductsTimeSlotTagBy($id);
        }

        if (isset($request->vaccine_factory_tag_id) && count($request->vaccine_factory_tag_id) > 0) {
            if ($id != null) {
                $this->removeProductsVaccineFactoryTagBy($id);
            }
            foreach ($request->vaccine_factory_tag_id as $item) {
                $this->addProdutsVaccineFactoryTags($product_id, $item);
            }
        }
        else{
            $this->removeProductsVaccineFactoryTagBy($id);
        }

        if (isset($request->vaccine_stock_tag_id) && count($request->vaccine_stock_tag_id) > 0) {
            if ($id != null) {
                $this->removeProductsVaccineStockTagBy($id);
            }
            foreach ($request->vaccine_stock_tag_id as $item) {
                $this->addProdutsVaccineStockTags($product_id, $item);
            }
        }
        else{
            $this->removeProductsVaccineStockTagBy($id);
        }

        if (isset($request->feature_tag_id) && count($request->feature_tag_id) > 0) {
            if ($id != null) {
                $this->removeProductsFeatureTagBy($id);
            }
            foreach ($request->feature_tag_id as $item) {
                $this->addProdutsFeatureTags($product_id, $item);
            }
        }
        else{
            $this->removeProductsFeatureTagBy($id); 
        }

        if (isset($request->recommend_tag_id) && count($request->recommend_tag_id) > 0) {
            if ($id != null) {
                $this->removeProductRecommendBy($id);
            }
            foreach ($request->recommend_tag_id as $item) {
                $this->addProdutsRecommendTags($product_id, $item);
            }
        }else{
            $this->removeProductRecommendBy($id);
        }

        if (isset($request->highlight_tag_id) && count($request->highlight_tag_id) > 0) {
            if ($id != null) {
                $this->removeProductHighLightBy($id);
            }
            foreach ($request->highlight_tag_id as $item) {
                $this->addProdutsHighLightTags($product_id, $item);
            }
        }else{
            $this->removeProductHighLightBy($id);
        }

        if (isset($request->supplementary_id) && count($request->supplementary_id) > 0) {
            if ($id != null) {
                $this->removeProductSupplementaryBy($id);
            }
            foreach ($request->supplementary_id as $item) {
                $this->addProdutsSupplementaries($product_id, $item);
            }
        }else{
            $this->removeProductSupplementaryBy($id);
        }

        if (isset($request->add_on_item_id) && count($request->add_on_item_id) > 0) {
            if ($id != null) {
                $this->removeProductsAddOnItemsBy($id);
            }
            foreach ($request->add_on_item_id as $item) {
                $this->addProdutsAddOnItems($product_id, $item);
            }
        }
        else{
            $this->removeProductsAddOnItemsBy($id);
        }

        if (isset($request->merchant_locations) && count($request->merchant_locations) > 0) {
            $merchant_id = $request->merchant_id;
            if ($id != null) {
                // dd($id);
                $this->removeProductsLocationsBy($id);
            }
            foreach ($request->merchant_locations as $item) {
                $this->addProdutsLocations($product_id, $merchant_id, $item);
            }
        }
        else{
            $this->removeProductsLocationsBy($id);
        }

       
        if (isset($request->key_products) && count($request->key_products) > 0) {
            if ($id != null) {
                // dd($id);
                $this->removeProductsKeyItemsBy($id);
            }
            foreach ($request->key_products as $item) {
                $this->addProdutsKeyTags($product_id, $item);
            }
        }
        else{
                 $this->removeProductsKeyItemsBy($id);
        }

        if (count($gallery) > 0) {
            $this->removeProdutsImagesBy($id);
            foreach ($gallery as $item) {
                $this->addProdutsImages($product_id, $item);
            }
        }
        return ($saved) ? $product : FALSE;
    }


    public function removeProductSupplementaryBy($product_id)
    {
        ProductSupplementary::where('product_id', $product_id)->delete();
    }

    public function removeProductRecommendBy($product_id)
    {
        ProductRecommendTag::where('product_id', $product_id)->delete();
    }

    public function removeProductHighLightBy($product_id)
    {
        ProductHighlightTag::where('product_id', $product_id)->delete();
    }

    public function removeProductsVaccineFactoryTagBy($product_id)
    {
        ProductVaccineFactoryTag::where('product_id', $product_id)->delete();
    }

    public function removeProductsVaccineStockTagBy($product_id)
    {
        ProductVaccineStockTag::where('product_id', $product_id)->delete();
        // $delete = ProductVaccineStockTag::where('product_id', $product_id);
        // $delete->delete();
        // dd($product_id);
    }

    public function removeProductsCategoryBy($product_id)
    {
        ProductSubCategory::where('product_id', $product_id)->delete();
    }

    public function removeProdutsVariableBy($product_id)
    {
        ProductVariation::where('product_id', $product_id)->delete();
    }

    public function removeProdutsImagesBy($product_id)
    {
        ProductImage::where('product_id', $product_id)->delete();
    }

    public function removeProductsPriceTagBy($product_id)
    {
        ProductPriceTag::where('product_id', $product_id)->delete();
    }

    public function removeProductsFeatureTagBy($product_id)
    {
        ProductFeatureTag::where('product_id', $product_id)->delete();
    }

    public function removeProductsTimeSlotTagBy($product_id)
    {
        ProductTimeSlotTag::where('product_id', $product_id)->delete();
    }

    public function removeProductsAddOnItemsBy($product_id)
    {
        ProductAddOnItem::where('product_id', $product_id)->delete();
    }

    public function removeProductsLocationsBy($product_id)
    {
        // ProductLocation::where('product_id', $product_id)->delete();
        $delete = ProductLocation::where('product_id', $product_id);
        // dd($delete);
        $delete->delete();
    }
    public function removeProductsKeyItemsBy($product_id)
    {
        $delete = ProductKeyItemTag::where('product_id', $product_id);
        $delete->delete();
    }
    public function addProdutsVaccineFactoryTags($product_id, $item)
    {
        $proVaccine = new ProductVaccineFactoryTag();
        $proVaccine->product_id = $product_id;
        $proVaccine->vaccine_factory_tag_id = $item;
        return ($proVaccine->save()) ? $proVaccine : false;
    }
    public function addProdutsVaccineStockTags($product_id, $item)
    {
        $proVaccineStock = new ProductVaccineStockTag();
        $proVaccineStock->product_id = $product_id;
        $proVaccineStock->vaccine_stock_tag_id = $item;
        return ($proVaccineStock->save()) ? $proVaccineStock : false;
    }

    public function addProductSubCategory($product_id, $category_id, $item)
    {
        $proCate = new ProductSubCategory();
        $proCate->product_id = $product_id;
        $proCate->category_id = $category_id;
        $proCate->sub_category_id = $item;
        return ($proCate->save()) ? $proCate : false;
    }

    public function addProdutsVariables($product_id, $item)
    {
        $productVariable = new ProductVariation();
        $productVariable->product_id = $product_id;
        $productVariable->name_en = $item['name_en'];
        $productVariable->name_tc = $item['name_tc'];
        $productVariable->name_sc = $item['name_sc'];
        $productVariable->sku = $item['sku'];
        $productVariable->original_price = $item['original_price'];
        $productVariable->discount_price = $item['discount_price'];
        $productVariable->promotion_price = $item['promotion_price'];
        // $productVariable->avg_price = $item['avg_price'];
        $productVariable->stock = $item['stock'];
        $productVariable->number_of_dose = $item['number_of_dose'];
        return ($productVariable->save()) ? $productVariable : false;
    }

    public function addProdutsImages($product_id, $item)
    {
        $productImg = new ProductImage();
        $productImg->product_id = $product_id;
        $productImg->creator_type = 1;
        // $productImg->img = $item;
        if(!existImagePath($item)){
            $productImg->img= null ;
        }else{
            $productImg->img = getImage($item);
        }
        $productImg->updated_by =  auth()->user()->name;
        return ($productImg->save()) ? $productImg : false;
    }

    public function addProdutsPriceTags($product_id, $item)
    {
        $priceTag = new ProductPriceTag();
        $priceTag->product_id = $product_id;
        $priceTag->price_tag_id = $item;
        return ($priceTag->save()) ? $priceTag : false;
    }

    public function addProdutsKeyTags($product_id, $item)
    {
        $key_item_tag = new ProductKeyItemTag();
        $key_item_tag->product_id = $product_id;
        $key_item_tag->key_item_tag_id = $item;
        return ($key_item_tag->save()) ? $key_item_tag : false;
    }

    public function addProdutsRecommendTags($product_id, $item)
    {
        $recommend = new ProductRecommendTag();
        $recommend->product_id = $product_id;
        $recommend->recommend_tag_id = $item;
        return ($recommend->save()) ? $recommend : false;
    }

    public function addProdutsHighLightTags($product_id, $item)
    {
        $recommend = new ProductHighlightTag();
        $recommend->product_id = $product_id;
        $recommend->highlight_tag_id = $item;
        return ($recommend->save()) ? $recommend : false;
    }

    public function addProdutsFeatureTags($product_id, $item)
    {
        $featureTag = new ProductFeatureTag();
        $featureTag->product_id = $product_id;
        $featureTag->feature_tag_id = $item;
        return ($featureTag->save()) ? $featureTag : false;
    }

    public function addProdutsTimeSlotTags($product_id, $item)
    {
        $priceTag = new ProductTimeSlotTag();
        $priceTag->product_id = $product_id;
        $priceTag->time_slot_tag_id = $item;
        return ($priceTag->save()) ? $priceTag : false;
    }

    public function addProdutsSupplementaries($product_id, $item)
    {
        $supplementary = new ProductSupplementary();
        $supplementary->product_id = $product_id;
        $supplementary->supplementary_id = $item;
        return ($supplementary->save()) ? $supplementary : false;
    }

    public function addProdutsAddOnItems($product_id, $item)
    {
        $proAddOn = new ProductAddOnItem();
        $proAddOn->product_id = $product_id;
        $proAddOn->add_on_item_id = $item;
        return ($proAddOn->save()) ? $proAddOn : false;
    }
     public function addProdutsLocations($product_id,$merchant_id ,$item)
    {
        $proLocations = new ProductLocation();
        $proLocations->product_id = $product_id;
        $proLocations->merchant_id = $merchant_id;
        $proLocations->merchant_location_id = $item;
        return ($proLocations->save()) ? $proLocations : false;

    }

    public function translateProduct($request)
    {
        $val = $request()->val;
        $name = $request()->name;
        $fields = [
            'name' => $name
        ];
        $data = autoTranslate($val, $fields);
        return $data;
    }

    // Save Gallery Images
    public function saveGalleryImages($request, $product)
    {
        $id = $product->id;
        // common_area
        if (!is_null($request->holder4)) {
            $commom_area_data = [];
            foreach ($request->holder4 as $image) {
                $file_path = existImagePath($image);
                $commom_area_data[]    = $file_path;
            }
            $request->merge([
                'commom_area' => json_encode($commom_area_data)
            ]);

            if ($request['commom_area'] == "[]") {
                $request['commom_area'] = [null];
            }
        } else {
            $request['commom_area'] = json_encode($request['commom_area']);
        }

        // service_facilities
        if (!is_null($request->holder5)) {
            $services_facilities_data = [];
            foreach ($request->holder5 as $image) {
                $file_path = existImagePath($image);
                $services_facilities_data[]    = $file_path;
            }
            $request->merge([
                'services_facilities' => json_encode($services_facilities_data)
            ]);
            if ($request['services_facilities'] == "[]") {
                $request['services_facilities'] = [null];
            }
        } else {
            $request['services_facilities'] = json_encode($request['services_facilities']);
        }

        // Other
        if (!is_null($request->holder6)) {
            $other_data = [];
            foreach ($request->holder6 as $image) {
                $file_path = existImagePath($image);
                $other_data[]    = $file_path;
            }

            $request->merge([
                'other' => json_encode($other_data)
            ]);
            if ($request['other'] == "[]") {
                $request['other'] = [null];
            }
        } else {
            $request['other'] = json_encode($request['other']);
        }

        // Video
        if (!is_null($request->holder7)) {
            $video_data = [];
            foreach ($request->holder7 as $image) {
                $file_path = existImagePath($image);
                $video_data[]    = $file_path;
            }
            $request->merge([
                'video' => json_encode($video_data)
            ]);
            if ($request['video'] == "[]") {
                $request['video'] = [null];
            }
        } else {
            $request['video'] = json_encode($request['video']);
        }

        $project_images  =   new ProductImage();
        // if ($id == null) {

        //     // $request['commom_area'] = json_encode($request['commom_area']);
        // } else {
        //     $project_images   =   ProductImage::where('image_type', 'product')->where('type_id', $id)->where('deleted_at', null)->first();
        // }
        // dd($project_images->toArray());
        $project_images_data    =   [
            "type_id" => $id,
            "image_type" => "product",
            "creator_type" => 1,
            "common_area" => isset($request['commom_area']) ? $request['commom_area'] : NULL,
            "video" => isset($request['video']) ? $request['video'] : NULL,
            "services_facilities" => isset($request['services_facilities']) ? $request['services_facilities'] : NULL,
            "other" => isset($request['other']) ? $request['other'] : NULL,
            "updated_by" => auth()->user()->name

        ];
        // dd($project_images_data);
        $project_images->create($project_images_data);
    }

    // save product images
    public function saveProductImages($request, $product)
    {
    $holder4_arr = [];
    $holder5_arr = [];
    $holder6_arr = [];
    $holder7_arr = [];
    $holder8_arr = [];
    if($request->has('holder4')){
        foreach($request['holder4'] as $key => $horder4){
            if(!existImagePath($horder4)){
                $holder4_arr[$key] = null ;
            }else{
                $holder4_arr[$key] = getImage($horder4) ;

            }
        }
    }else{
        $holder4_arr = NULL;
    }
    if($request->has('holder5')){
        foreach($request['holder5'] as $key => $holder5){
            if(!existImagePath($horder4)){
                $holder5_arr[$key] = null ;
            }else{
                $holder5_arr[$key] = getImage($holder5) ;

            }
        }
    }else{
        $holder5_arr = NULL;
    }
    if($request->has('holder6')){
        foreach($request['holder6'] as $key => $holder6){
            if(!existImagePath($horder4)){
                $holder6_arr[$key] = null ;
            }else{
                $holder6_arr[$key] = getImage($holder6) ;

            }
        }
    }else{
        $holder6_arr = NULL;
    }
    if($request->has('holder7')){
        foreach($request['holder7'] as $key => $holder7){
            if(!existImagePath($horder4)){
                $holder7_arr[$key] = null ;
            }else{
                $holder7_arr[$key] = getImage($holder7) ;

            }
        }
    }else{
        $holder7_arr = NULL;
    }


    if($request->has('holder8')){
        foreach($request['holder8'] as $key => $holder8){
            if(!existImagePath($holder8)){
                $holder8_arr[$key] = null ;
            }else{
                $holder8_arr[$key] = getImage($holder8) ;

            }
        }
    }else{
        $holder8_arr = NULL;
    }
    // dd($holder4_arr ,$holder5_arr,$holder6_arr,$holder7_arr);

        $data = [
            "type_id" => $product->id,
            "image_type" => "product",
            "creator_type" => 1,
            "common_area" => $holder4_arr,
            "feature_images" => $holder8_arr,
            "services_facilities" => $holder5_arr,
            "other" => $holder6_arr,
            "video" => $holder7_arr,
            "updated_by" => auth()->user()->name
        ];
        ProductImage::create($data);
    }

    public function updateProductImages($request, $userId)
    {
        // dd($request->all());
        $holder4_arr = [];
        $holder5_arr = [];
        $holder6_arr = [];
        $holder7_arr = [];
        $holder8_arr = [];
        if($request->has('holder4')){
            foreach($request['holder4'] as $key => $horder4){
                if(!existImagePath($horder4)){
                    $holder4_arr[$key] = null ;
                }else{
                    $holder4_arr[$key] = getImage($horder4) ;

                }
            }
        }else{
            $holder4_arr = NULL;
        }
        if($request->has('holder5')){
            foreach($request['holder5'] as $key => $holder5){
                if(!existImagePath($horder4)){
                    $holder5_arr[$key] = null ;
                }else{
                    $holder5_arr[$key] = getImage($holder5) ;

                }
            }
        }else{
            $holder5_arr = NULL;
        }
        if($request->has('holder6')){
            foreach($request['holder6'] as $key => $holder6){
                if(!existImagePath($horder4)){
                    $holder6_arr[$key] = null ;
                }else{
                    $holder6_arr[$key] = getImage($holder6) ;

                }
            }
        }else{
            $holder6_arr = NULL;
        }
        if($request->has('holder7')){
            foreach($request['holder7'] as $key => $holder7){
                if(!existImagePath($horder4)){
                    $holder7_arr[$key] = null ;
                }else{
                    $holder7_arr[$key] = getImage($holder7) ;

                }
            }
        }else{
            $holder7_arr = NULL;
        }

        if($request->has('holder8')){
            foreach($request['holder8'] as $key => $holder8){
                if(!existImagePath($holder8)){
                    $holder8_arr[$key] = null ;
                }else{
                    $holder8_arr[$key] = getImage($holder8) ;

                }
            }
        }else{
            $holder8_arr = NULL;
        }
        //  dd($holder4_arr ,$holder5_arr,$holder6_arr,$holder7_arr);

        $is_record = ProductImage::where('image_type', 'product')->where('type_id', $userId)->first();
        if ($is_record) {
            $product_images = ProductImage::where('image_type', 'product')->where('type_id', $userId)->first();
            $data = [
                "common_area" => $holder4_arr,
                "services_facilities" => $holder5_arr,
                "other" => $holder6_arr,
                "video" => $holder7_arr,
                "feature_images" => $holder8_arr,
            ];
            $product_images->update($data);
        } else {
            $data = [
                "type_id" => $userId,
                "image_type" => "product",
                "creator_type" => 1,
                "common_area" => $holder4_arr,
                "services_facilities" => $holder5_arr,
                "other" => $holder6_arr,
                "video" => $holder7_arr,
                "feature_images" => $holder8_arr,
                "updated_by" => auth()->user()->name
            ];
            ProductImage::create($data);
        }
    }

    // Recommend
    public function changeRecommend(Request $request)
    {
        $product   = Product::findOrFail($request->id);
        $product->update(['is_recommend' => !$product->is_recommend]);

        return $product;
    }

    public function changeBookCount(Request $request)
    {
        $product   = Product::findOrFail($request->id);
        $product->update(['is_book_count' => !$product->is_book_count]);

        return $product;
    }

    public function changeIspublish(Request $request)
    {
        $product   = Product::findOrFail($request->id);
        $product->update(['is_published' => !$product->is_published]);

        return $product;
    }

    public function showHome(Request $request)
    {
        $product   = Product::findOrFail($request->id);
        $product->update(['is_show_home' => !$product->is_show_home]);

        return $product;
    }

    public function updateSortValue(Request $request)
    {
        $product   = Product::findOrFail($request->id);
        $product->update([
            'sort_by_for_home' => $request->value
        ]);

        return $product;
    }

    public function updateRecommendSortValue(Request $request)
    {
        $product   = Product::findOrFail($request->id);
        $product->update([
            'sort_by_for_recommend' => $request->value
        ]);

        return $product;
    }
}
