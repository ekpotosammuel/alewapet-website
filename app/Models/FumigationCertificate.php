<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FumigationCertificate extends Model
{
    use HasFactory;

    protected $fillable = [       
        "name_of_premises",
        "address_of_premises",
        "date_of_fumigation",
        "reg_no",
        "vendors_use",
        "pro_lic_no",
        "cert_no",
        "issue_date",
        "expires_date",
    ];
}
