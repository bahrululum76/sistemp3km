<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Proposal;

use App\Models\Revisi;

class PilihReviewController extends Controller
{
    // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
    // $proposal = Proposal::all();

    public function index()
    {

        $user = User::where('roles_id', '=', 4)->get();
        $proposal = Proposal::where( 'category_id','=',1 )->get();

        return view("lppm.pilih_reviewer", compact('proposal', 'user'));
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
      



        return redirect('lppm/pilih_review')->with(['success' => 'Proposal Ditolak']);
    }


    public function pilih(Request $request, $id)
    {
        $proposal = Proposal::find($id);
        $proposal->reviewer_id = $request->reviewer_id;

        $proposal->save();

        return redirect('lppm/pilih_review')->with(['success' => 'Reviewer Telah Dipilih']);
    }
}
