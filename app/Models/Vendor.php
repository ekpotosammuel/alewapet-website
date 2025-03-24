<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        
        "company_name",
        "address",
        "phone_no",
        "registration_no",
        "amount_paid",
        "outstanding",
        "total",
        "date_of_payment",
        "comment"
    ];
}
