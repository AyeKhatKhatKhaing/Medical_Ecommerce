<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getProductPrice($product)
    {
        $price = isset($product->promotion_price) ? $product->promotion_price : (isset($product->discount_price) ? $product->discount_price : $product->original_price);
        return $price;
    }

    public function saveImage($image,$path)
    {
            $name=$image->getClientOriginalName();

            $ext_arr = ['jpeg','jpg','png','svg','PNG','JPG','JPEG','SVG'];
            $extension = $image->getClientOriginalExtension();
            if(in_array($extension, $ext_arr)) {
                if(!file_exists(storage_path().'/app/public/files/shares/'.$path)){
                    mkdir(storage_path().'/app/public/files/shares/'.$path, 0777, true);
                }
                $image->move(storage_path().'/app/public/files/shares/'.$path, $name);  
                $url = '/storage/files/shares/'.$path.'/'.$name; 
            }
            
        
        return $url;
    }
}
