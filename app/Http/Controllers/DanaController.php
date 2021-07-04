<?php

namespace App\Http\Controllers;
use App\Models\Dana;
use Illuminate\Http\Request;

class DanaController extends Controller
{
    public function index(){
        $dana= Dana::all();

        return view("lppm.dana",compact('dana'));
    }
}
