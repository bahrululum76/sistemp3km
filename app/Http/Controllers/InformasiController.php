<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;

class InformasiController extends Controller
{
    public function index(){
        // $informasi = DB::table('informasies')->get();
        $informasi = Informasi::all();

        return view("dosen.unduhinformasi", compact('informasi'));
    }
}
