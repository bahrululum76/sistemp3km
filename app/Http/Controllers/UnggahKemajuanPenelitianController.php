<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kemajuan;
use App\Models\Periode;
use App\Models\Proposal;
use Auth;
class UnggahKemajuanPenelitianController extends Controller
{
    public function index(){
        $proposal = Proposal::where('user_id', '=', Auth::User()->id)
        ->where('category_id', '=', 1)
        ->where('periode',date("Y"))
        ->where('status_id','=',1)
        ->orWhere('status_id','=',2)
        ->orWhere('status_id','=',3)
        ->orWhere('status_id','=',4)
        ->get();
        $kemajuan= Kemajuan:: where('category_id','=',1)
        ->where('periode',date("Y"))
        ->get();
        $value = Periode::where('tahun',date('Y'))->where('status',1)->exists();
        return view("dosen.unggahkemajuanpenelitian", compact('kemajuan','value','proposal'));
        
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
        $kemajuan->periode=date("Y");
        $kemajuan->progres=$request->progres;

        $kemajuan->category_id='1';
        $kemajuan->user_id= Auth::user()->id;

        $kemajuan->save();

        
        return redirect('dosen/unggahkemajuanpenelitian')->with(['success' => 'Data Berhasil ditambahkan']);
    
    }
}
