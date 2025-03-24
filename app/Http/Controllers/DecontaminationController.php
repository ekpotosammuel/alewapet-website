<?php

namespace App\Http\Controllers;

use App\Models\Decontamination;
use Illuminate\Http\Request;

class DecontaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $decontaminations = Decontamination::all();

         if($request->has('search_keywords')){

            $search_keywords = $request->search_keywords;
            $decontaminations = Decontamination::where('name_of_premises', 'LIKE', "%$search_keywords%")
            ->orWhere('phone_no', 'LIKE', "%$search_keywords%")
            ->orWhere('cert_no', 'LIKE', "%$search_keywords%")
            ->paginate(10);

        }else{
            $decontaminations = Decontamination::orderBy('name_of_premises', 'DESC')->paginate(10);
        }
    
        return view('decontaminations.index',compact('decontaminations'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('decontaminations.create');
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
            'phone_no' => 'required',
            'date_of_fumigation' => 'required',
            'cert_no' => 'required',
            'issue_date' => 'required',
            'expires_date' => 'required',

        ]);
    
        Decontamination::create($request->all());
     
        return redirect()->route('decontaminations')->with('success','decontamination List has been created successfully.');
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
        $decontamination = Decontamination::findOrFail($id);
        return view('decontaminations.edit',compact('decontamination'));
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
        $decontamination = Decontamination::find($id);
                    $decontamination->name_of_premises         =$request->name_of_premises;
                    $decontamination->address_of_premises      =$request->address_of_premises;
                    $decontamination->phone_no                 =$request->phone_no;
                    $decontamination->date_of_fumigation       =$request->date_of_fumigation;
                    $decontamination->cert_no                  =$request->cert_no;
                    $decontamination->issue_date               =$request->issue_date;
                    $decontamination->expires_date             =$request->expires_date;
                    $decontamination->update();
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
