<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Dana;

use Auth;
use Illuminate\Http\Request;

class ProposalPengabdianController extends Controller
{
    public function index()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
        $proposal = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 2)
            ->get();

            $proposal_kosong = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 2)
            ->limit(1)
            ->get();
            $proposal_kosong_1 = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 2)->get()->count();


        return view("dosen.proposal_pengabdian", compact('proposal','proposal_kosong', 'proposal_kosong_1'));
    }

    public function index_adm()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
        

        $proposal = Proposal::where('category_id', '=', 2)->get();
        return view("admin.proposalpengabdian", compact('proposal'));
    }



    public function store(Request $request)
    {


        $proposal = new Proposal;
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
        $proposal->category_id = '2';
        $proposal->status_id = '2';
        $proposal->user_id = Auth::User()->id;
        $proposal->pengaju_id = Auth::User()->id;
        $proposal->save();

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

        return redirect('dosen/formdanapengabdian');
    }

    public function store2(Request $request)
    {

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
        $proposal->category_id = '1';
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
    
        return redirect('dosen/proposal')->with(['success' => 'Data Berhasil ditambahkan']);
    
    }
}
