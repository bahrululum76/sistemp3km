<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\InfoMail;
use Storage;
use Validator;

class KelolaInformasiController extends Controller
{   
    public function index(){
        // $informasi = DB::table('informasies')->get();
        $informasi = Informasi::all();

        return view("admin.kelola_informasi", compact('informasi'));
    }
    public function store(Request $request)
    {
        $rules = [
            'file'          => 'required|mimes:docx,pdf|max:2040'
        ];
 
        $messages = [
            'file.mimes'             => 'Extensi yang di perbolehkan hanya Docx dan Pdf',
            'file.max'              => 'maximum size file 2mb',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // insert data ke table user
        $informasi = new Informasi;
        $informasi->judul = $request->judul;
        $informasi-> keterangan =$request->keterangan;

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
            'body'=>'Informasi Penelitian dan pengabdian telah dibuka , silahkan cek website'
        ];
        
        Mail::to($user)->send(new InfoMail($detail));
       


        return redirect('admin/kelolainformasi')->with(['success' => 'Data Berhasil ditambahkan']);
    }

    public function edit(Request $request, $id)
    {
        // update data dosen
        $rules = [
            'file'          => 'required|mimes:docx,pdf,xls|max:2048'
        ];
 
        $messages = [
            'file.mimes'             => 'Extensi yang di perbolehkan hanya Docx, Pdf dan Xls',
        ];
        $informasi = Informasi::find($id);
        
        
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