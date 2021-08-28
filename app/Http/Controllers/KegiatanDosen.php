<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Kemajuan;
use Auth;
use Validator;
class KegiatanDosen extends Controller
{
    public function index()
    {
        $kemajuan=Kemajuan::where('user_id',Auth::User()->id)
        ->where('periode',date("Y"))
        ->first();
        $kegiatan=Kegiatan::where('id_kemajuan',$kemajuan->id)->get();
        // dd($kemajuan);
        return view("dosen.kegiatan",compact('kegiatan','kemajuan'));
    }

    public function store(Request $request)
    {
        $rules = [
            'bukti_kegiatan'          => 'required|mimes:jpg,png,jpeg,docx,pdf,xlsx'
        ];
 
        $messages = [
            'bukti_kegiatan.mimes'             => 'Format tidak mendukung',
            'bukti_kegiatan.required'             => 'Data tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $kegiatan = new Kegiatan;
        $kegiatan->id_kemajuan = $request->id_kemajuan;
        
        $kegiatan->nama = $request->nama;
        $kegiatan->tanggal_kegiatan =$request->tanggal_kegiatan;
        $kegiatan->progres=$request->progres;

        if ($request->hasFile('bukti_kegiatan')) {

            $filename = $request->file('bukti_kegiatan')->getClientOriginalName();


            $request->file('bukti_kegiatan')->storeAs(
                'public/kegiatan',$filename
            );
          
            $kegiatan->bukti_kegiatan=$filename;
        }
        
        $kegiatan->save();
        return redirect('dosen/kegiatandosen')->with(['success' => 'Data Berhasil ditambahkan']);
    }

}
