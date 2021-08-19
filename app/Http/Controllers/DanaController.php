<?php

namespace App\Http\Controllers;
use App\Models\Dana;
use App\Models\Proposal;
use Illuminate\Http\Request;

class DanaController extends Controller
{
    public function index1(){
        $proposal = Proposal::where('user_id', '=', Auth::User()->id)
        ->where('category_id', '=', 1)
        ->where('periode',date("Y"))
        ->where('status_id','=',1)
        ->orWhere('status_id','=',2)
        ->orWhere('status_id','=',3)
        ->orWhere('status_id','=',4)
        ->get();
        $value = Periode::where('tahun',date('Y'))->where('status',1)->exists();
        $dana= Dana::where('category_id','=',1)->get();

        return view("lppm.dana",compact('dana','proposal','value'));
    }
    public function index2(){
        $dana= Dana::where('category_id','=',2)->get();

        return view("lppm.dana_",compact('dana'));
    }
}
