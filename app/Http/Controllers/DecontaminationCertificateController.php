<?php

namespace App\Http\Controllers;

use App\Models\DecontaminationCertificate;

use Illuminate\Http\Request;

class DecontaminationCertificateController extends Controller
{
    
    public function index(Request $request)
    {
        // $decontaminations = Decontamination::all();

         if($request->has('search_keywords')){

            $search_keywords = $request->search_keywords;
            $decontaminationcertificates = DecontaminationCertificate::where('name_of_premises', 'LIKE', "%$search_keywords%")
            ->orWhere('phone_no', 'LIKE', "%$search_keywords%")
            ->orWhere('cert_no', 'LIKE', "%$search_keywords%")
            ->paginate(10);

        }else{
            $decontaminationcertificates = DecontaminationCertificate::orderBy('name_of_premises', 'DESC')->paginate(10);
        }
    
        return view('decontaminationcertificates.index',compact('decontaminationcertificates'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('decontaminationcertificates.create');
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
            'date_of_decontamination' => 'required',
            'reg_no' => 'required',
            'pro_lic_no' => 'required',
            'cert_no' => 'required',
            'issue_date' => 'required',

        ]);
    
        DecontaminationCertificate::create($request->all());
     
        return redirect()->route('decontaminationcertificates')->with('success','decontamination List has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Decontamination  $decontamination
     * @return \Illuminate\Http\Response
     */
    public function show(Decontamination $decontamination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Decontamination  $decontamination
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $decontaminationcertificates = Decontamination::findOrFail($id);
        return view('decontaminationcertificates.edit',compact('decontaminationcertificates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Decontamination  $decontamination
     * @return \Illuminate\Http\Response
     */
    public function update($id, Decontamination $decontamination)
    {
        $decontaminationcertificates = DecontaminationCertificate::find($id);
                    $decontaminationcertificates->name_of_premises         =$request->name_of_premises;
                    $decontaminationcertificates->address_of_premises      =$request->address_of_premises;
                    $decontaminationcertificates->phone_no                 =$request->phone_no;
                    $decontaminationcertificates->date_of_decontamination  =$request->date_of_decontamination;
                    $decontaminationcertificates->cert_no                  =$request->cert_no;
                    $decontaminationcertificates->issue_date               =$request->issue_date;
                    $decontaminationcertificates->expires_date             =$request->expires_date;
                    $decontaminationcertificates->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Decontamination  $decontamination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Decontamination $decontamination)
    {
        //
    }
}
