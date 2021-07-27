<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Dana;
use Validator;
use Auth;
use Mail;
use App\Mail\RevMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProposalPengabdianController extends Controller
{
    public function index()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
        $proposal = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 2)
            ->where('status_id',1)
            ->orWhere('status_id','=',2)
            ->orWhere('status_id','=',3)
            ->orWhere('status_id','=',4)
            ->get();

            $proposal_kosong = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 2)
            ->limit(1)
            ->get();
            $proposal_kosong_1 = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 2)->get()->count();

            $proposalnonaktif= Proposal::where('status_id',8)
            ->where('category_id',2)->value('status_id');

        return view("dosen.proposal_pengabdian", compact('proposal','proposalnonaktif','proposal_kosong', 'proposal_kosong_1'));
    }

    public function index_adm()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
        

        $proposal = Proposal::where('category_id', '=', 2)->get();
        return view("admin.proposalpengabdian", compact('proposal'));
    }



    public function store(Request $request)
    {
        $rules = [
            'judul'          => 'unique:proposals',
            'file'          => 'required|mimes:docx,pdf'
        ];
 
        $messages = [
            'judul.unique'           => 'judul ini sudah ada sebelumnya.',
            'file.mimes'             => 'Extensi yang di perbolehkan hanya Docx dan Pdf',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $proposal = new Proposal;

        $prop1 =DB::table('proposals')->where('id','=',$proposal->id)->pluck('judul')->first();
        $user2 =DB::table('users')->where('roles_id','=',2)->pluck('name');
        $user1 =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('name');
        $user =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('email');   
        // ->where('id','=',$proposal->user_id);
        $detail =[
            'title'=>'Pilih Reviewer',
            'body'=>  $user.' Proposal Penelitian , atas nama'.$user2.' dengan judul'.$prop1.'sudah tersedia untuk di ditentukan reviewer oleh anda , silahkan cek website'
        ];
        
        Mail::to($user)->send(new RevMail($detail));

        
        $proposal->judul = $request->get('judul');
        $proposal->abstrak = $request->abstrak;

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/proposal',
                $filename
            );

            $proposal->file = $filename;
        }
        $proposal->periode=$request->periode;
        $proposal->category_id = '2';
        $proposal->status_id = '2';
        $proposal->user_id = Auth::User()->id;
        $proposal->pengaju_id = Auth::User()->id;
        $proposal->save();



        return redirect('dosen/formdanapengabdian');
    }

    public function store2(Request $request)
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

        $prop=Proposal::Where('user_id','=',Auth::User()->id)->pluck('reviewer_id')->first();
        $proposal = new Proposal;

        $proposal->id;
        $proposal->judul = $request->get('judul');
        $proposal->abstrak=$request->abstrak;

        if ($request->hasFile('file')) {

            $filename = $request->file('file')->getClientOriginalName();


            $request->file('file')->storeAs(
                'public/proposal',
                $filename
            );

            $proposal->file = $filename;
        }
        $proposal->periode=$request->periode;
        $proposal->category_id = '2';
        $proposal->status_id = '3';
        $proposal->user_id = Auth::User()->id;
        $proposal->pengaju_id = Auth::User()->id;
        $proposal->reviewer_id= $prop;
        $proposal->save();

        $prop1 =DB::table('proposals')->where('id','=',$proposal->id)->pluck('judul');
        $user2 =DB::table('users')->where('id','=',$proposal->user_id)->pluck('name');
        $user1 =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('name');
        $user =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('email');   
        // ->where('id','=',$proposal->user_id);
        $detail =[
            'title'=>'Review Proposal',
            'body'=>  $user1.' Proposal Penelitian , atas nama'.$user2.' dengan judul'.$prop1.'sudah tersedia untuk di koreksi oleh anda , silahkan cek website'
        ];
        
        Mail::to($user)->send(new RevMail($detail));
        // $proposal_user = new Proposal_user;

        // $proposal_user->user_id= Auth::User()->id;
        // $proposal_user->proposal_id = $proposal->id;
        // $proposal_user->save();

        return redirect('dosen/proposal_pengabdian')->with(['success' => 'Data Berhasil ditambahkan']);
    }

    public function dana_index(){
        $proposal = Proposal::where('user_id','=',Auth::User()->id)
        ->where('status_id','=',2)
        ->where('category_id','=',2)
        ->limit(1)
        ->get();
        
        return view('dosen.formdana2', compact('proposal'));
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
        $dana->user_id = Auth::User()->id;
        $dana->proposal_id= $request->id;
        $dana->category_id=2;
        $dana->save();
    
        return redirect('dosen/proposal_pengabdian')->with(['success' => 'Data Berhasil ditambahkan']);
    
    }
}
