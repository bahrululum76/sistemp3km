<?php

namespace App\Http\Controllers;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use Mail;

class VerifikasiProposalPengabdianController extends Controller
{
    public function index()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
        $user = User::where('status_id','=',2)->get();
        $proposal = Proposal::where('status_id','=',3)
        ->where('category_id','=',2)
        ->where('reviewer_id','=',Auth::User()->id)
        ->get(); 


        return view("reviewer.verifikasi_proposal_pengabdian", compact('proposal','user'));
    }

    public function terima(Request $request, $id){
        $proposal= Proposal::find($id);

        $proposal->status_id= 1;

        $proposal->save();

        
        $prop =DB::table('proposals')->where('id','=',$proposal->id)->pluck('judul');
        $user2 =DB::table('users')->where('id','=',$proposal->user_id)->pluck('name');
        $user1 =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('name');
        $user =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('email');   
        // ->where('id','=',$proposal->user_id);
        $detail =[
            'title'=>'Review Proposal',
            'body'=>  ' Proposal Pengabdian, atas nama'.$user2.' dengan judul'.$prop.'sudaah tersedia untuk di koreksi oleh anda , silahkan cek website'
        ];
        
        Mail::to($user)->send(new RevMail($detail));

        return redirect('reviewer/verifikasi_proposal_pengabdian')->with(['success' => 'Proposal Diterima']);
    }
    public function revisi(Request $request, $id){
        $proposal = Proposal::find($id);
        
        
        $proposal->detail_revisi=$request->detail_revisi;
        $proposal->status_id=3;
        $proposal->save();

        $user1 =DB::table('users')->where('id','=',$proposal->user_id)->pluck('name');
        $user =DB::table('users')->where('id','=',$proposal->user_id)->pluck('email');   
        // ->where('id','=',$proposal->user_id);
        $detail =[
            'title'=>'Revisi Proposal',
            'body'=>  $user1.' Proposal Pengabdian anda mendapat beberapa koreksi , silahkan cek website'
        ];
        
        Mail::to($user)->send(new RevMail($detail));
        // $proposal->update([
        //     'status_id' => 3
            
        // ]);
        return redirect('reviewer/verifikasi_proposal_pengabdian')->with(['success' => 'Proposal Direvisi']);
    }

    public function detail(Request $request, $id){
        $proposal = Proposal::where('id','=',$id)
        ->where('category_id','=',2)->get();
        return view("reviewer.reviewproposalpengabdian", compact('proposal'));
    
    }
}
