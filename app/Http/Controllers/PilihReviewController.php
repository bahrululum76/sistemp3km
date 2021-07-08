<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Proposal;
use Mail;
use App\Mail\RevMail;

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
        // dd($proposal);
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
        $proposal->reviewer_id=$request->reviewer_id;
        
        $proposal->status_id=3;
        $proposal->save();

        $prop =DB::table('proposals')->where('id','=',$proposal->id)->pluck('judul');
        $user2 =DB::table('users')->where('id','=',$proposal->user_id)->pluck('name');
        $user1 =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('name');
        $user =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('email');   
        // ->where('id','=',$proposal->user_id);
        $detail =[
            'title'=>'Review Proposal',
            'body'=>  $user1.' Proposal Penelitian , atas nama'.$user2.' dengan judul'.$prop.'sudah diterima untuk direview oleh saudara , silahkan cek website'
        ];
        
        Mail::to($user)->send(new RevMail($detail));

        return redirect('lppm/pilih_review')->with(['success' => 'Reviewer Telah Dipilih']);
        // dd($user2);
    }

    // public function detail(Request $request, $id){
    //     $proposal= Proposal::find($id);

    //     $proposal = Proposal::where('id','=',$id)
    //     ->where('status_id','=',2)
    //     ->where('category_id','=',1)
    //     ->get();

    public function detailpilihreview (Request $request, $id){
        $proposal = Proposal::find($id);
        
        $user= User::
        where('roles_id','=',4)->get();
        $proposal = Proposal::where('id','=',$id)
        ->where('category_id','=',1)
        ->where('status_id','=',2)
        
        ->get();

        return view("lppm.detailpilihreviewproposal", compact('proposal', 'user'));

    }
}
