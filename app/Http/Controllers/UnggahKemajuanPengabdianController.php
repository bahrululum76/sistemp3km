<?php

namespace App\Http\Controllers;
use App\Models\Kemajuan;
use Illuminate\Http\Request;
use Auth;
class UnggahKemajuanPengabdianController extends Controller
{
    public function index(){
        $kemajuan= Kemajuan:: where('category_id','=',2)->get();

        return view("dosen.unggahkemajuanpengabdian", compact('kemajuan'));
        
    }

    public function store(Request $request)
    {   


        $kemajuan = new Kemajuan;

        
        $kemajuan->judul = $request->get('judul');

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/progrespengabdian',$filename
            );
          
            $kemajuan->file=$filename;
        }
        $kemajuan->periode=$request->periode;
        $kemajuan->progres=$request->progres;

        $kemajuan->category_id='2';
        $kemajuan->user_id= Auth::user()->id;

        $kemajuan->save();

        
        return redirect('dosen/unggahkemajuanpengabdian')->with(['success' => 'Data Berhasil ditambahkan']);
    
    }
}
