<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

        public function search(){
        
        $search =request()->input('search');
        // echo"<pre>";print_r($search);exit;
        $data= User::with(['departments','designations'])->
        where('name','LIKE',"%{$search}%")->
        orWhereHas('departments', function($q) use ($search){
            $q->where('name','LIKE',"%{$search}%");
        })
        ->orWhereHas('designations', function($q) use ($search){
            $q->where('name','LIKE',"%{$search}%");
        })
        ->get();
         // return $data;
         return response()->json(['data'=>$data]);
    }
       
    
    
}
