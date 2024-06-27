<?php

namespace App\Models;

use App\Models\ProductEnquiryForm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'enquiry_invoice_no',
    ];

    function productEnquiryForm(){
        
        return $this->hasMany(ProductEnquiryForm::class, 'product_enquiry_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
