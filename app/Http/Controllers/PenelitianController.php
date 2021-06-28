<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;
use Auth;
use Storage;
class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penelitian = Penelitian::all();
        return view("dosen.unggahlapakhirpenelitian", compact('penelitian'));
    }

    public function index_lap()
    {
        $penelitian = Penelitian::all();
        return view("lppm.laporanakhirpenelitian", compact('penelitian'));
    }
    public function index_adm()
    {
        $penelitian = Penelitian::all();
        return view("admin.kelolapenelitian", compact('penelitian'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penelitian= new Penelitian;

        $penelitian->judul= $request->judul;
        $penelitian->dipublikasikan_pada=$request->dipublikasikan_pada;
        $penelitian->tahun_publikasi=$request->tahun_publikasi;

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/penelitian',
                $filename
            );

            $penelitian->file = $filename;
        }

        $penelitian->user_id = Auth::User()->id;

        $penelitian->save();

        return redirect('dosen/penelitian')->with(['success' => 'Data Berhasil ditambahkan']);

    }
    public function getFile($filename){
        $file=Storage::disk('public/penelitian')->get($filename);
  
        return (new Response($file, 200));

              return redirect('lppm/laporanakhirpenelitian')->with(['success' => 'Data Berhasil ditambahkan']);

    }

  

}
