<?php

namespace App\Http\Controllers;
use App\Models\Dana;
use App\Models\Proposal;
use Illuminate\Http\Request;

class DanaController extends Controller
{
    public function index1(){
        $dana= Dana::where('category_id','=',1)->get();

        return view("lppm.dana",compact('dana'));
    }
    public function index2(){
        $dana= Dana::where('category_id','=',2)->get();

        return view("lppm.dana_",compact('dana'));
    }
}
