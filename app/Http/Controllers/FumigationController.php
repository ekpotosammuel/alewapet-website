<?php

namespace App\Http\Controllers;

use App\Models\Fumigation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class FumigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Auth::user()->role;
        $from = Carbon::now()->format("Y-m-d");
        $to = Carbon::now()->addDays(365)->format("Y-m-d");

         if($request->has('search_keywords')){

            $search_keywords = $request->search_keywords;
            $fumigations = Fumigation::where('cert_no', 'LIKE', "%$search_keywords%")
            ->orWhere('phone_no', 'LIKE',"Demand Notice", "%$search_keywords%")
            ->orWhere('name_of_premises', 'LIKE', "%$search_keywords%")
            ->orderBy('cert_no', 'DESC')
            ->whereBetween('expires_date', [$from, $to])
            ->paginate(10);

        }else{

            $fumigations = Fumigation::orderBy('cert_no', 'DESC')
            ->whereBetween('expires_date', [$from, $to])
            ->paginate(20);
        }

        return view('fumigations.index',compact('fumigations'));
    }
 // Generate PDF
    public function createPDF() 
    {
      // retreive all records from db
      $fumigation = Fumigation::all();

      // share data to view
      view()->share('fumigation',$fumigation);
      $pdf = PDF::loadView('pdf_view', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fumigations.create');
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
            'vendors_use' => 'required',
            'cert_no' => 'required',
            'issue_date' => 'required',
            'expires_date' => 'required',
            

        ]);
    
        Fumigation::create($request->all());
     
        return redirect()->route('fumigations')->with('success','fumigation List has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fumigation  $fumigation
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        $fumigations = Fumigation::where('id', $request->id)->first();
        return view('fumigations.show', compact('fumigations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fumigation  $fumigation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fumigations = Fumigation::findOrFail($id);
        return view('fumigations.edit', compact('fumigations'));
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
         $fumigation = Fumigation::find($id);
                    $fumigation->name_of_premises      = $request->name_of_premises;
                    $fumigation->address_of_premises   = $request->address_of_premises;
                    $fumigation->phone_no              = $request->phone_no;
                    $fumigation->date_of_fumigation    = $request->date_of_fumigation;
                    $fumigation->vendors_use           = $request->vendors_use;
                    $fumigation->cert_no               = $request->cert_no;
                    $fumigation->issue_date            = $request->issue_date;
                    $fumigation->expires_date          = $request->expires_date;

                    $fumigation->update();

                    return redirect()->route('fumigations')->with('success', 'fumigation information has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fumigation  $fumigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fumigation $fumigation)
    {
        //
    }
}
