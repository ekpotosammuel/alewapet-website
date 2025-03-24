<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\VendorImport;
use Excel;

class UploadVendorController extends Controller
{


     public function index(Request $request){
        // body
        return view('uploadvendor.index');
    }

    public function upload(Request $request){
        // body
        Excel::import(new VendorImport, $request->file('excel_file'));
        return redirect('/');
    }
    //
}
