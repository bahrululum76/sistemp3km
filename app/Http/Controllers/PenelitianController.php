<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Proposal;
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
        $proposal = Proposal::where('user_id', '=', Auth::User()->id)
        ->where('category_id', '=', 1)
        ->where('periode',date("Y"))
        ->where('status_id','=',1)
        ->orWhere('status_id','=',2)
        ->orWhere('status_id','=',3)
        ->orWhere('status_id','=',4)
        ->get();
        $penelitian = Penelitian::all();
        $value = Periode::where('tahun',date('Y'))->where('status',1)->exists();
        return view("dosen.unggahlapakhirpenelitian", compact('penelitian','value','proposal'));
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

        $penelitian->pendanaan =$request->pendanaan;
        $penelitian->judul= $request->judul;
        $penelitian->publikasi=$request->publikasi;
        $penelitian->tahun=$request->tahun;
        $penelitian->url=$request->url;

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
    
    public function edit(Request $request, $id)
    {
        // update data dosen

        $penelitian = Penelitian::find($id);
        
        
        $penelitian->pendanaan =$request->pendanaan;
        $penelitian->judul= $request->judul;
        $penelitian->publikasi=$request->publikasi;
        $penelitian->tahun=$request->tahun;
        $penelitian->url=$request->url;

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/penelitian',$filename
            );
          
            $penelitian->file=$filename;
        }
        $penelitian->save();
       
        return redirect('admin/kelolapenelitian')->with(['success' => 'Data Berhasil diubah']);
    }
        public function delete($id)
        {
            $penelitian = Penelitian::find($id);
            $penelitian->delete();
    
            Storage::delete('public/penelitian'.$penelitian->file);
            return redirect('admin/kelolapenelitian');
        }

}
