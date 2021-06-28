<?php

namespace App\Http\Controllers;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Models\Revisi;
use Auth;

class VerifikasiController extends Controller
{
    public function index()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
        $proposal = Proposal::where('status_id','=',3)
        ->where('category_id','=',1)
        ->where('reviewer_id','=',Auth::User()->id)
        ->get(); 

        return view("reviewer.verifikasi_proposal", compact('proposal'));
    }
    public function detail(Request $request, $id){
        $proposal= Proposal::find($id);

        $proposal = Proposal::where('id','=',$id)
        ->where('status_id','=',3)
        ->where('category_id','=',1)
        ->get();
        
        return view("reviewer.reviewproposal", compact('proposal'));
    
    }

    public function terima(Request $request, $id){
        $proposal= Proposal::find($id);

        $proposal->status_id= 1;

        $proposal->save();

        
    }

    public function revisi(Request $request, $id){
        $proposal = Proposal::find($id);
        
        $revisi = new Revisi;
        $revisi->revisi=$request->revisi;
        $revisi->detail=$request->detail;
        $revisi->status_id= 3;
        $revisi->proposal_id= $proposal->id;
        $revisi->save();

        $proposal->update([
            'status_id' => 3
            
        ]);
        return redirect('reviewer/verifikasi_proposal')->with(['success' => 'Proposal Direvisi']);
    }
}
