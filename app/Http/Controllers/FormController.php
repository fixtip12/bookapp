<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
       
        return view('form.index');
     }
    

    public function confirm(Request $request){
        $request->session()->put('name', $request->input('name'));
        $request->session()->put('address', $request->input('address'));
        return view('form.confirm');
    }
}
