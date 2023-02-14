<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;

class PageController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function store(Request $request){
        Money::create([
            'desc'=>$request->desc,
            'date'=>$request->date,
            'type'=>$request->type,
        ]);
        return redirect()->back()->with('success','Data Stored!!');
    }
}
