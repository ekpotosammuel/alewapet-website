<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decontamination extends Model
{
    use HasFactory;

     protected $fillable = [
      
        
        "name_of_premises",
        "address_of_premises",
        "phone_no",
        "date_of_fumigation",
        "cert_no",
        "issue_date",
        "expires_date",
       
    ];
}
