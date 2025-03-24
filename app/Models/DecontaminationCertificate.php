<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecontaminationCertificate extends Model
{
    use HasFactory;

     protected $fillable = [       
        "name_of_premises",
        "address_of_premises",
        "date_of_decontamination",
        "reg_no",
        "pro_lic_no",
        "cert_no",
        "issue_date",
    ];
}
