<?php

namespace App\Http\Controllers;
use App\Models\FumigationCertificate;

use Illuminate\Http\Request;

class FumigationCertificateController extends Controller
{
    public function index(Request $request)
    {
        

         if($request->has('search_keywords')){

            $search_keywords = $request->search_keywords;
            $fumigationcertificates = FumigationCertificate::where('cert_no', 'LIKE', "%$search_keywords%")
            ->orWhere('reg_no', 'LIKE', "%$search_keywords%")
            ->paginate(10);

        }else{
            $fumigationcertificates = FumigationCertificate::orderBy('cert_no', 'DESC')->paginate(20);
        }
    
        return view('fumigationcertificates.index',compact('fumigationcertificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fumigationcertificates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name_of_premises' => 'required',
            'address_of_premises' => 'required',
            'reg_no' => 'required',
            'date_of_fumigation' => 'required',
            'vendors_use' => 'required',
            'pro_lic_no' => 'required',
            'cert_no' => 'required',
            'issue_date' => 'required',
            'expires_date' => 'required',
            

        ]);
    
        FumigationCertificate::create($request->all());
     
        return redirect()->route('fumigationcertificates')->with('success','fumigation List has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fumigation  $fumigation
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        $fumigationcertificates = FumigationCertificate::where('id', $request->id)->first();
        return view('fumigationcertificates.show', compact('fumigationcertificates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fumigation  $fumigation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fumigationcertificates = FumigationCertificate::findOrFail($id);
        return view('fumigationcertificates.edit', compact('fumigationcertificates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fumigation  $fumigation
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
         $fumigationcertificates = FumigationCertificate::find($id);
                    $fumigationcertificates->name_of_premises      = $request->name_of_premises;
                    $fumigationcertificates->address_of_premises   = $request->address_of_premises;
                    $fumigationcertificates->reg_no                = $request->reg_no;
                    $fumigationcertificates->date_of_fumigation    = $request->date_of_fumigation;
                    $fumigationcertificates->vendors_use           = $request->vendors_use;
                    $fumigationcertificates->pro_lic_no            = $request->pro_lic_no;
                    $fumigationcertificates->cert_no               = $request->cert_no;
                    $fumigationcertificates->issue_date            = $request->issue_date;
                    $fumigationcertificates->expires_date          = $request->expires_date;

                    $fumigationcertificates->update();

                    return redirect()->route('fumigationcertificates')->with('success', 'fumigationcertificates information has been updated');

    }

    
    
}
