<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kemajuan;
use Auth;
class UnggahKemajuanPenelitianController extends Controller
{
    public function index(){
        $kemajuan= Kemajuan:: where('category_id','=',1)->get();

        return view("dosen.unggahkemajuanpenelitian", compact('kemajuan'));
        
    }

    public function store(Request $request)
    {   


        $kemajuan = new Kemajuan;

        
        $kemajuan->judul = $request->get('judul');

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/progrespenelitian',$filename
            );
          
            $kemajuan->file=$filename;
        }
        $kemajuan->progres=$request->progres;

        $kemajuan->category_id='1';
        $kemajuan->user_id= Auth::user()->id;

        $kemajuan->save();

        
        return redirect('dosen/unggahkemajuanpenelitian')->with(['success' => 'Data Berhasil ditambahkan']);
    
    }
}
