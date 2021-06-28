<?php

namespace App\Http\Controllers;

use App\Models\Pengabdian;
use Illuminate\Http\Request;
use Auth;
class PengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengabdian = Pengabdian::all();
        return view("dosen.unggahlapakhirpengabdian", compact('pengabdian'));
    }

    public function index_lap()
    {
        $pengabdian = Pengabdian::all();
        return view("lppm.laporanakhirpengabdian", compact('pengabdian'));
    }

    public function index_adm()
    {
        $pengabdian = Pengabdian::all();
        return view("admin.kelolapengabdian", compact('pengabdian'));
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
        $pengabdian= new Pengabdian;

        $pengabdian->judul= $request->judul;
        $pengabdian->dipublikasikan_pada=$request->dipublikasikan_pada;
        $pengabdian->tahun_publikasi=$request->tahun_publikasi;

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/pengabdian',
                $filename
            );

            $pengabdian->file = $filename;
        }

        $pengabdian->user_id = Auth::User()->id;

        $pengabdian->save();

        return redirect('dosen/pengabdian')->with(['success' => 'Data Berhasil ditambahkan']);

    }
}
