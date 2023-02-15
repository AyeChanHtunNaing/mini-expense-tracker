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
        
        $data=Money::orderBy('id','desc')->get();
        return view('welcome',compact('data'));
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
