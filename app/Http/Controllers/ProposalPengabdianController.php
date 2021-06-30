<?php

namespace App\Http\Controllers;

use App\Models\Proposal;

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

        return view("dosen.proposal_pengabdian", compact('proposal'));
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



        return redirect('dosen/proposal_pengabdian')->with(['success' => 'Data Berhasil ditambahkan']);
    }
}
