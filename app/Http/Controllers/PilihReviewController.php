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
        $proposal = Proposal::where( 'category_id','=',1 )
        ->where('status_id','=',2)
        ->get();

        return view("lppm.pilih_reviewer", compact('proposal', 'user'));
    }


    public function tolak(Request $request, $id)
    {
        $proposal = Proposal::find($id);
        
        $proposal->detail_revisi=$request->detail_revisi;
        $proposal->status_id=4;
        $proposal->save();
        // $proposal->update([
        //     'status_id' => 4
            
        // ]);
      



        return redirect('lppm/pilih_review')->with(['success' => 'Proposal Ditolak']);
    }


    public function pilih(Request $request, $id)
    {
        $proposal = Proposal::find($id);
        // $proposal->reviewer_id = $request->reviewer_id;
        $proposal->status_id=3;
        $proposal->save();

        return redirect('lppm/pilih_review')->with(['success' => 'Reviewer Telah Dipilih']);
    }
}
