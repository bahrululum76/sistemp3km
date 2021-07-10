<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;

class InformasiController extends Controller
{
    public function index($id){
        // $informasi = DB::table('informasies')->get();
        $informasi = Informasi::where('id',$id)->get();

        return view("dosen.unduhinformasi", compact('informasi'));
    }
}
