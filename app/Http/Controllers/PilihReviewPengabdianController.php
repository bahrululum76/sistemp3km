<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;
use App\Models\Revisi;

class PilihReviewPengabdianController extends Controller
{
    public function index()
    {

        $user = User::where('roles_id', '=', 4)->get();
        $proposal = Proposal::where( 'category_id','=',2 )
        ->where('status_id','=',2)
        ->get();
        return view("lppm.pilih_review_pengabdian", compact('proposal', 'user'));
    }

    public function tolak(Request $request, $id)
    {
        $proposal = Proposal::find($id);
        
        $revisi = new Revisi;
        $revisi->revisi=$request->revisi;
        $revisi->detail=$request->detail;
        $revisi->status_id= 4;
        $revisi->proposal_id= $proposal->id;
        $revisi->save();

        $proposal->update([
            'status_id' => 4
            
        ]);
      



        return redirect('lppm/pilih_review_pengabdian')->with(['success' => 'Proposal Ditolak']);
    }

    public function pilih1(Request $request, $id)
    {
        $proposal = Proposal::find($id);
        $proposal->reviewer_id=$request->reviewer_id;
        $proposal->status_id=3;
        $proposal->save();

        return redirect('lppm/pilih_review_pengabdian')->with(['success' => 'Reviewer Telah Dipilih']);
    }
}
