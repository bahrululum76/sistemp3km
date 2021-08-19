<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kemajuan;

class LapKemajuanController extends Controller
{
    public function index_penelitian(){
        $kemajuan= Kemajuan:: where('category_id','=',1)->get();
        
        return view("lppm.kemajuanpenelitian", compact('kemajuan'));
        
    }
    public function index_pengabdian(){
        $kemajuan= Kemajuan:: where('category_id','=',2)->get();

        return view("lppm.kemajuanpengabdian", compact('kemajuan'));
        
    }
    public function index_adm()
    {
        $penelitian = Pengabdian::all();
        return view("admin.kelolapengabdian", compact('pengabdian'));
    }
}
