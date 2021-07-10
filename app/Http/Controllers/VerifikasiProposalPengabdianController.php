<?php

namespace App\Http\Controllers;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use Mail;
use App\Mail\RevMail;

class VerifikasiProposalPengabdianController extends Controller
{
    public function index()
    {
        // $proposal= DB::table('proposals')->where('user_id', '=',Auth::User()->id)->get();
        $user=User::all();
        $proposal= DB::table('proposals')
        ->select('user_id','reviewer_id','category_id')
        ->where('reviewer_id','=',Auth::user()->id)
        ->where('category_id','=',2)
        ->where('status_id','=',3)
        ->distinct()->get();
        


        return view("reviewer.verifikasi_proposal_pengabdian", compact('proposal','user'));
    }

    public function terima(Request $request, $id){
        $proposal=Proposal::Find($id);
        
        if ($proposal->id= $id){

            $proposal1= Proposal::where('user_id','=',$proposal->user_id)
            ->update(['status_id' => 1]);

        }
        
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

        return redirect('reviewer/verifikasi_proposal_pengabdian');
    }
    public function revisi(Request $request, $id){
        $proposal = Proposal::find($id);
        $user1 =DB::table('users')->where('id','=',$proposal->user_id)->pluck('name');
        $user =DB::table('users')->where('id','=',$proposal->user_id)->pluck('email');   
        // ->where('id','=',$proposal->user_id);
        $detail =[
            'title'=>'Revisi Proposal',
            'body'=>  $user1.' Proposal Pengabdian anda mendapat beberapa koreksi , silahkan cek website'
        ];
        
        Mail::to($user)->send(new RevMail($detail));
        
        $proposal->detail_revisi=$request->detail_revisi;
        $proposal->status_id=3;
        $proposal->save();


        // $proposal->update([
        //     'status_id' => 3
            
        // ]);
        return redirect('reviewer/verifikasi_proposal_pengabdian')->with(['success' => 'Proposal Direvisi']);
    }

    public function detail(Request $request, $id){
        $proposal = Proposal::where('user_id','=',$id)
        ->where('category_id','=',2)
        ->where('status_id','=',3)
        ->get();
        return view("reviewer.reviewproposalpengabdian", compact('proposal'));
    
    }
}
