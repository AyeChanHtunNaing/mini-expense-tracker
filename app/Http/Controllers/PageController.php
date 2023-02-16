<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;

class PageController extends Controller
{
    public function index(){
        $total_income=0;
        $total_expense=0;
        $today_date=date("Y-m-d");
        $today_amount=Money::whereDate('date',$today_date)->get();
       foreach($today_amount as $amt){
          if($amt->type=='income'){
            $total_income+=$amt->amount;
          }
          if($amt->type=='expense'){
            $total_expense+=$amt->amount;
          }
       }
        $data=Money::orderBy('id','desc')->get();
        return view('welcome',compact('data','total_income','total_expense'));
    }
    public function store(Request $request){
        Money::create([
            'desc'=>$request->desc,
            'date'=>$request->date,
            'type'=>$request->type,
            'amount'=>$request->amount,
        ]);
        return redirect()->back()->with('success','Data Stored!!');
    }
}
