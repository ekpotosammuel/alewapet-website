<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DecontaminationImport;
use Excel;

class UploadDecontaminationController extends Controller
{


     public function index(Request $request){
        // body
        return view('uploaddecontamination.index');
    }

    public function upload(Request $request){
        // body
        Excel::import(new DecontaminationImport, $request->file('excel_file'));
        return redirect('/');
    }
    //
}

