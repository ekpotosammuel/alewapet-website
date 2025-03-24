<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fumigation extends Model
{
    use HasFactory;

    protected $fillable = [       
        "name_of_premises",
        "address_of_premises",
        "phone_no",
        "date_of_fumigation",
        "vendors_use",
        "cert_no",
        "issue_date",
        "expires_date",
    ];
}
