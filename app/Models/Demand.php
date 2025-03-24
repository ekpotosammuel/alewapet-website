<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;

    protected $fillable = [  

        "dd_no",     
        "name_of_premises",
        "address_of_premises",
        "offence",
        "deliver",
        "amount",
        "date",
        "Time",
        "final",
        "court_sum",
        "status",
        "amount_paid",
        "remark",
        
    ];
}
