<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan=Kegiatan::all();

        return view("admin.kegiatan",compact('kegiatan'));
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
        $rules = [
            'foto'          => 'required|mimes:jpg,png,jpeg,gif,svg'
        ];
 
        $messages = [
            'file.mimes'             => 'Format Foto tidak mendukung',
        ];

        $kegiatan = new Kegiatan;
        $kegiatan->nama = $request->nama;
        $kegiatan-> detail =$request->detail;

        if ($request->hasFile('foto')) {

            $filename = $request->file('foto')->getClientOriginalName();


            $request->file('foto')->storeAs(
                'public/kegiatan',$filename
            );
          
            $kegiatan->foto=$filename;
        }
        
        $kegiatan->save();
        return redirect('admin/kegiatan')->with(['success' => 'Data Berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
   
    public function edit(Request $request, $id)
    {
        

        $kegiatan = Kegiatan::find($id);
        
        
        $kegiatan->nama =$request->nama;
        $kegiatan->detail= $request->detail;
        if ($request->hasFile('foto')) {

            $filename = $request->file('foto')->getClientOriginalName();


            $request->file('foto')->storeAs(
                'public/kegiatan',$filename
            );
          
            $kegiatan->foto=$filename;
        }
        $kegiatan->save();
       
        return redirect('admin/kegiatan')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();

        Storage::delete('public/kegiatan'.$kegiatan->foto);
        return redirect('admin/kegiatan');
    }
}
