<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Fumigation;
use App\Models\FumigationCertificate;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DemandController extends Controller
{

     
    public function index(Request $request)
    {
        $from = Carbon::now()->format("Y-m-d");
        $to = Carbon::now()->subDays(365)->format("Y-m-d");

        if($request->has('search_keywords')){

            $search_keywords = $request->search_keywords;
            $fumigations = Fumigation::where('name_of_premises', 'LIKE', "%$search_keywords%")
            ->orWhere('phone_no', 'LIKE', "%$search_keywords%")
            ->orWhere('cert_no', 'LIKE', "%$search_keywords%")
            ->whereBetween('expires_date', [$from, $to])
            ->paginate(10);

        }else{

            $fumigations = Fumigation::whereBetween('expires_date', [$to, $from])->orderBy('cert_no', 'DESC')->paginate(20);
        }

        // $fumigations = Fumigation::whereBetween('expires_date', [$to, $from])->orderBy('cert_no', 'DESC')->count();
    
        return view('demands.index', compact('fumigations'));
    }

    public function createPDF() 
    {
      // retreive all records from db
      $demand = Demand::all();

      // share data to view
      view()->share('demand',$demand);
      $pdf = PDF::loadView('pdf_view', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }

    public function previewAll(Request $request){
        //body
        $date_now = date("Y-m-d");
        $fumigations_ids = json_decode($request->fumigations_ids);

        $fumigations = Fumigation::whereIn('id', $fumigations_ids)->orderBy('expires_date', 'DESC')->get();
        return view('demands.preview', compact('fumigations'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $demands = new Demand();
                    $demands->dd_no                 = $request->dd_no;
                    $demands->name_of_premises      = $request->name_of_premises;
                    $demands->address_of_premises   = $request->address_of_premises;
                    $demands->offence               = $request->offence;
                    $demands->deliver               = $request->deliver;
                    $demands->amount                = $request->amount;
                    $demands->date                  = $request->date;
                    $demands->Time                  = $request->Time;
                    $demands->final                 = $request->final;
                    $demands->court_sum             = $request->court_sum;
                    $demands->status                = $request->status;
                    $demands->amount_paid           = $request->amount_paid;
                    $demands->remark                = $request->remark;
                    $demands->save();

                    return redirect()->route('demands')->with('success', 'demands information has been updated');
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
        return view('demands.show', compact('fumigations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fumigation  $fumigation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $demands = Demand::findOrFail($id);
        return view('demands.edit', compact('demands'));
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
         $demand = Demand::find($id);

                    $demand->name_of_premises      = $request->name_of_premises;
                    $demand->address_of_premises   = $request->address_of_premises;
                    $demand->offence               = $request->offence;
                    $demand->deliver               = $request->deliver;
                    $demand->amount                = $request->amount;
                    $demand->date                  = $request->date;
                    $demand->final                 = $request->final;
                    $demand->court_sum             = $request->court_sum;
                    $demand->status                = $request->status;
                    $demand->amount_paid           = $request->amount_paid;
                    $demand->remark                = $request->remark;
                    $demand->update();
                    return redirect()->route('demands')->with('success', 'demand information has been updated');

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

    public function fetchSearchByName($search_keywords)
    {
        $demand = Fumigation::where('name_of_premises','Like',"%$search_keywords%")->get();

        return view('search', compact('fumigations'));

        // return FumigationCertificate::where('product_name','Like',"%$name%")->get();
        
    }

    //
}
