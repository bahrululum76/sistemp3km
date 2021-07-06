<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\InfoMail;
use Storage;

class KelolaInformasiController extends Controller
{   
    public function index(){
        // $informasi = DB::table('informasies')->get();
        $informasi = Informasi::all();

        return view("admin.kelola_informasi", compact('informasi'));
    }
    public function store(Request $request)
    {
        // insert data ke table user
        $informasi = new Informasi;
        $informasi->judul = $request->judul;
        $informasi->keterangan = $request->keterangan;

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/informasi',$filename
            );
          
            $informasi->file=$filename;
        }
        
        $informasi->save();

        $user = DB::table('users')->pluck('email')->all();
        $detail =[
            'title'=>'Informasi Baru',
            'body'=>'Informasi Penelitian dan pengabdian telah ada , silahkan cek website'
        ];
        
        Mail::to($user)->send(new InfoMail($detail));
       


        return redirect('admin/kelolainformasi')->with(['success' => 'Data Berhasil ditambahkan']);
    }

    public function edit(Request $request, $id)
    {
        // update data dosen

        $informasi = Informasi::find($id);
        
        $user1->nidn = $request->nidn;
        $informasi->judul = $request->judul;
        $informasi->keterangan = $request->keterangan;

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/informasi',$filename
            );
          
            $informasi->file=$filename;
        }
        $informasi->save();
       
        return redirect('admin/kelolainformasi')->with(['success' => 'Data Berhasil diubah']);

        // return redirect('admin/users')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function delete($id)
    {
        $informasi = Informasi::find($id);
        $informasi->delete();

        Storage::delete('public/informasi'.$informasi->file);
        return redirect('admin/kelolainformasi');
    }
    
}