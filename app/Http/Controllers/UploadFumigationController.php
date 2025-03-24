<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\FumigationImport;
use Excel;

class UploadFumigationController extends Controller
{


     public function index(Request $request){
        // body
        return view('uploads.index');
    }

    public function upload(Request $request){
        // body
        Excel::import(new FumigationImport, $request->file('excel_file'));
        return redirect('/');
    }
    //
}
