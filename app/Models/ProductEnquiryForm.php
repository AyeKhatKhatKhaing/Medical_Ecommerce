<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductEnquiryForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_enquiry_id',
        'customer_id',
        'product_id',
        'booking_id',
        'age_check',
        'have_referral',
        'id_card',
        'disease_check',
        'blood_test',
        'had_colonoscopy',
        'medical_insurance',
        'ehealth_registered',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
