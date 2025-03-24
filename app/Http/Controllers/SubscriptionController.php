<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Subscription;
use App\Models\Fumigation;
use App\Models\Demand;
use App\Models\Receipt;
use App\Models\User;
use Carbon\Carbon;
use Matrix\Operators\Subtraction;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Constant\Periodic\Payments;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $from = Carbon::now()->format("Y-m-d");
        $to = Carbon::now()->subDays(365)->format("Y-m-d");

         if($request->has('search_keywords')){

            $search_keywords = $request->search_keywords;
            $fumigations = Fumigation::where('cert_no', 'LIKE', "%$search_keywords%")
            ->orWhere('phone_no', 'LIKE',"Demand Notice", "%$search_keywords%")
            ->orWhere('name_of_premises', 'LIKE', "%$search_keywords%")
            ->orderBy('cert_no', 'DESC')
            ->whereBetween('expires_date', [$from, $to])
            ->paginate(10);

        }else{
            $fumigations = Fumigation::whereBetween('expires_date', [$to, $from])->orderBy('cert_no', 'DESC')->paginate(20);
        }

        return view('payment.index',compact('fumigations'));
    }

    public function view(Request $request)
    {

        // $search = Fumigation::where('cert_no','Like',"%$request%")->get();
        // return view('payment.index',compact('search'));
        $sub = Subscription::all();
        return $sub;
        // return view('payment.index', compact('sub'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm(Request $request)
    {
        $fumigation_id = $request->fumigation_id;
        $fumigations = Fumigation::find($fumigation_id);
        
        return view('payment.pay', compact('fumigations'));
    }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionRequest $request)
    {
        $request['user_id'] = auth()->user()->id;
        // dd($request->issue_date);
        $this->validate($request, [
            'fumigation_id'=>'required',
            'user_id'=>'required',
            'date_of_fumigation'=>'required',
            'vendors_use'=>'required',
            'reg_no'=>'required',
            'cert_no'=>'required',
            'reference'=>'required',
            'issue_date'=>'required',
            'expires_date'=>'required',
            'amount'=>'required',

        ]);
        $Subscription                       =   new Subscription();
        $Subscription->fumigation_id        =   $request->input('fumigation_id');
        $Subscription->user_id              =   $request->input('user_id');
        $Subscription->date_of_fumigation   =   $request->input('date_of_fumigation');
        $Subscription->vendors_use          =   $request->input('vendors_use');
        $Subscription->reg_no               =   rand(100,900);
        $Subscription->cert_no              =   rand(10000,99999).Str::random(2);
        $Subscription->reference            =   Str::random(10);
        $Subscription->issue_date           =   Carbon::now()->format("Y-m-d");
        $Subscription->expires_date         =   Carbon::now()->addDays(90)->format("Y-m-d");
        $Subscription->amount               =   $request->input('amount');
        $Subscription->save();



        $fumigation                         = Fumigation::find($request->fumigation_id);
        $fumigation->issue_date             = $Subscription->issue_date;
        $fumigation->expires_date           = $Subscription->expires_date;
        $fumigation->cert_no                = $Subscription->cert_no;
        $fumigation->date_of_fumigation     = $Subscription->date_of_fumigation;
        $fumigation->update();


        $reciept                            = new Receipt();
        $reciept->fumigation_id             = $fumigation->id;
        $reciept->user_id                   = $request['user_id'];
        $reciept->amount                    = $Subscription->amount;
        $reciept->cert_no                   = $Subscription->cert_no;
        $reciept->issue_date                = $Subscription->issue_date;
        $reciept->expires_date                = $Subscription->expires_date;
        // dd($reciept->expires_date );

        $reciept->save();

        return redirect()->route('successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        return response()->json([
            "status"=>"success",
            "data"=>$subscription
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriptionRequest  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }

    public function fetchSearchByName($cert_no)
    {
        return Fumigation::where('cert_no','Like',"%$cert_no%")->get();
        // return Products::findorFail($name);
        return $cert_no ;
        
    }
    public function successful(){
        return view('payment.successful');
    }

    public function receipt(Receipt $receipt, Request $request){
        $user = auth()->user()->id;
        $receipt = Receipt::where('user_id', $user)->orderBy('id','DESC')->get();
        return view('receipt.index', compact('receipt'));
    }
}
