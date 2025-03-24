<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $vendors = Vendor::all();
    
        return view('vendors.index',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('vendors.create');
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
            'company_name' => 'required',
            'address' => 'required',
            'phone_no' => 'required',
            'registration_no' => 'required',
            'amount_paid' => 'required',
            'outstanding' => 'required',
            'total' => 'required',
            'date_of_payment' => 'required',
            

        ]);
    
        Vendor::create($request->all());
     
        return redirect()->route('vendors')
                        ->with('success','Vendor List has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        return view('vendors.show',compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        return view('vendors.edit',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'phone_no' => 'required',
            'registration_no' => 'required',
            'amount_paid' => 'required',
            'outstanding' => 'required',
            'total' => 'required',
            'date_of_payment' => 'required',
            'comment' => 'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('vendors.index')
                        ->with('success','Vendor has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendors->delete();
    
        return redirect()->route('vendors.index')
                        ->with('success','Vendor has been deleted successfully');    }
}
