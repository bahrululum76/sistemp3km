<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penelitian;
use App\Models\Artikel;
use Auth;
class ArtikelController extends Controller
{
    public function index()
    {
        $penelitian=Penelitian::where('user_id',Auth::User()->id)
        ->where('tahun',date("Y"))
        ->first();
        $artikel=Artikel::where('id_penelitian',$penelitian->id)->get();
        // dd($penelitian->judul);

        return view("dosen.artikel",compact('artikel','penelitian'));
    }

    public function store(Request $request)
    {
  


        $artikel = new Artikel;
        $artikel->id_penelitian = $request->id_penelitian;
        $artikel->judul = $request->judul;
        $artikel->tahun =date("Y");

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/kegiatan',$filename
            );
          
            $artikel->file=$filename;
        }
        
        $artikel->save();
        return redirect('dosen/artikel')->with(['success' => 'Data Berhasil ditambahkan']);
    }

}
