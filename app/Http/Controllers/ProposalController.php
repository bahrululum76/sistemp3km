<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Dana;


use Auth;
use Illuminate\Support\Facades\DB;

class ProposalController extends Controller
{
    public function index()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
        
        $proposal = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 1)
            ->get();
        $proposal_kosong = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 1)
            ->limit(1)
            ->get();
            $proposal_kosong_1 = Proposal::where('user_id', '=', Auth::User()->id)
            ->where('category_id', '=', 1)->get()->count();

           

        return view("dosen.proposal_penelitian", compact('proposal',  'proposal_kosong', 'proposal_kosong_1'));
    }
    public function index_adm()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
        

        $proposal = Proposal::where('category_id','=',1)->get();
        return view("admin.proposalpenelitian", compact('proposal'));
    }



    public function store(Request $request)
    {
        $proposal2 = Proposal::where('user_id','=',Auth::User()->id);

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
        $proposal->status_id = '2';
        $proposal->user_id = Auth::User()->id;
        $proposal->pengaju_id = Auth::User()->id;

        $proposal->save();

        // $proposal_user = new Proposal_user;

        // $proposal_user->user_id= Auth::User()->id;
        // $proposal_user->proposal_id = $proposal->id;
        // $proposal_user->save();

        return redirect('dosen/formdana');
    }

    public function store2(Request $request)
    {


        $proposal = new Proposal;

        $proposal->id ;
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

        $proposal->save();

        // $proposal_user = new Proposal_user;

        // $proposal_user->user_id= Auth::User()->id;
        // $proposal_user->proposal_id = $proposal->id;
        // $proposal_user->save();

        return redirect('dosen/proposal')->with(['success' => 'Data Berhasil ditambahkan']);
    }

    public function dana_index(){
        $proposal = Proposal::where('user_id','=',Auth::User()->id)
        ->where('status_id','=',2)
        ->where('category_id','=',1)
        ->limit(1)
        ->get();
        
        return view('dosen.formdana', compact('proposal'));
    }

    public function dana_store(Request $request){
        
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
