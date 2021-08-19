<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Dana;
use App\Models\Periode;
use App\Models\Revisi;
use Mail;
use App\Mail\RevMail;

use Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use Storage;
class ProposalController extends Controller
{
    public function index()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();

        
        $proposal = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 1)
            ->where('periode',date("Y"))
            ->where('status_id','=',1)
            ->orWhere('status_id','=',2)
            ->orWhere('status_id','=',3)
            ->orWhere('status_id','=',4)
            ->get();
        $prop= Proposal::where('user_id', '=', Auth::User()->id)
        ->where('category_id', '=', 1)
        ->where('status_id','=',2)
        ->orWhere('status_id','=',3)
        ->orWhere('status_id','=',4)
        ->value('id');
        $revisi= Revisi::where('proposal_id',$prop)->get();
        $proposal_kosong = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 1)
            ->limit(1)
            ->get();
            $proposal_kosong_1 = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 1)->get()->count();
        $proposalnonaktif= Proposal::where('status_id',8)
        ->where('category_id',1)->value('status_id');
           
        $value = Periode::where('tahun',date('Y'))->where('status',1)->exists();
        // dd($prop);
        return view("dosen.proposal_penelitian", compact('proposal','proposalnonaktif',  'proposal_kosong', 'proposal_kosong_1','revisi','value'));
    }
    public function index_adm()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
        
        
        $proposal = Proposal::where('category_id','=',1)
        ->where('status_id','=',1)
        ->where('periode',now())
        ->get();
        
        return view("admin.proposalpenelitian", compact('proposal'));
    }



    public function store(Request $request)
    {
        $rules = [
            'judul'          => 'unique:proposals',
            'file'          => 'required|mimes:docx,pdf|max:3000',
            
        ];
 
        $messages = [
            'judul.unique'           => 'judul ini sudah ada sebelumnya.',
            'file.mimes'             => 'Extensi yang di perbolehkan hanya Docx',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $proposal = new Proposal;
        $proposal2 = Proposal::where('user_id','=',Auth::User()->id);

        $proposal->id;
        $proposal->judul = $request->get('judul');
        $proposal->anggota1=$request->anggota1;
        $proposal->anggota2=$request->anggota2;
        $proposal->abstrak=$request->abstrak;

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/proposal',
                $filename
            );

            $proposal->file = $filename;
        }
        $proposal->periode=date("Y");
        $proposal->category_id = '1';
        $proposal->status_id = '1';
        $proposal->user_id = Auth::User()->id;
        $proposal->pengaju_id = Auth::User()->id;
        $proposal->save();
        $user3=User::where('id',Auth::User()->id)
        ->update(
            [
                'status'=> 1,
            ]
            );

        $prop1 =DB::table('proposals')->where('user_id','=',$proposal->user_id)->pluck('judul')->first();
        $user2 =DB::table('users')->where('roles_id','=',2)->pluck('email');
        $user1 =DB::table('users')->where('id','=',$proposal->user_id)->pluck('name');
        $user =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('email');   
        // ->where('id','=',$proposal->user_id);
        $detail =[
            'title'=>'Pilih Reviewer',
            'body'=>  ' Proposal Penelitian , atas nama'.$user1.' dengan judul ' .$prop1. ' sudah tersedia untuk di ditentukan reviewer oleh anda , silahkan cek website'
        ];
        // dd($user1);
        Mail::to($user2)->send(new RevMail($detail));
        
        

        // $proposal_user = new Proposal_user;

        // $proposal_user->user_id= Auth::User()->id;
        // $proposal_user->proposal_id = $proposal->id;
        // $proposal_user->save();


        return redirect('dosen/formdana');
    }

    public function revisi(Request $request, $id)
    {
        $rules = [
            
            'file'          => 'required|mimes:docx,pdf'
        ];
 
        $messages = [
            'file.mimes'             => 'Extensi yang di perbolehkan hanya Docx dan Pdf',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // $prop=Proposal::Where('user_id','=',Auth::User()->id)->pluck('reviewer_id')->first();
        $proposal = Proposal::find($id);

        Storage::delete('public/proposal'.$proposal->file);

        $proposal->id ;
        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/proposal',
                $filename
            );

            $proposal->file = $filename;
        }
        $proposal->save();
        

        $prop1 =DB::table('proposals')->where('id','=',$proposal->id)->value('judul');
        $user2 =DB::table('users')->where('id','=',$proposal->user_id)->value('name');
        $user1 =DB::table('users')->where('id','=',$proposal->reviewer_id)->value('name');
        $user =DB::table('users')->where('id','=',$proposal->reviewer_id)->value('email');   
        // ->where('id','=',$proposal->user_id);
        $detail =[
            'title'=>'Review Proposal',
            'body'=>  ' Proposal Penelitian , atas nama'.$user2.' dengan judul'.$prop1.'sudah tersedia untuk di koreksi oleh anda , silahkan cek website'
        ];    
        Mail::to($user)->send(new RevMail($detail));
        // dd($prop1);
        return redirect('dosen/proposal')->with(['success' => 'Data Berhasil ditambahkan']);
    }
    public function ajukan(Request $request, $id){
        $proposal=Proposal::find($id);

        $proposal=Proposal::where('id',$id)
        ->update(
            [
                'status_id'=> 2,
            ]
            );
            $user=User::where('id',Auth::User()->id)
            ->update(
                [
                    'status'=> 2,
                ]
                );
        
        return redirect('dosen/proposal')->with(['success' => 'Proposal Berhasil ditajukan']);
    }

    public function dana_index(){
        $proposal = Proposal::where('user_id','=',Auth::User()->id)
        ->where('status_id','=',2)
        ->where('category_id','=',1)
        ->limit(1)
        ->get();
        $value = Periode::where('tahun',date('Y'))->where('status',1)->exists();
        $dana= Dana::where('category_id','=',1)->get();
        
        return view('dosen.formdana', compact('proposal','value'));
    }

    public function dana_store(Request $request){
        $rules = [
            'pelaksanaan'          => 'max:10',
            'bahan'                => 'max:10',
            'Transport'                => 'max:10',
            'sewa'                => 'max:10'
        ];
 
        $messages = [
            'pelaksanaan.max'           => 'Input angka dibatasi 10 digit',
            'bahan.max'             => 'Input angka dibatasi 10 digit',
            'Transfort.max'             => 'Input angka dibatasi 10 digit',
            'sewa.max'             => 'Input angka dibatasi 10 digit',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $proposal = new Proposal;

        

        $dana= new Dana;

        $dana->pelaksanaan = $request->pelaksanaan;
        $dana->bahan = $request->bahan;
        $dana->Transport = $request->Transport;
        $dana->sewa = $request->sewa;
        $dana->category_id= 1;
        $dana->user_id = Auth::User()->id;
        $dana->proposal_id =  $request->id;
        
        $dana->save();
    
        return redirect('dosen/proposal')->with(['success' => 'Data Berhasil ditambahkan']);
    
    }
}
