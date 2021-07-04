<?php

namespace App\Http\Controllers;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\RevMail;
use App\Models\User;
use Mail;
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

        return redirect('reviewer/verifikasi_proposal')->with(['success' => 'Proposal Direvisi']);
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
            'body'=>  $user1.' Proposal Penelitian  anda mendapat beberapa koreksi , silahkan cek website'
        ];
        
        Mail::to($user)->send(new RevMail($detail));
        // $proposal->update([
        //     'status_id' => 3
            
        // ]);
        return redirect('reviewer/verifikasi_proposal')->with(['success' => 'Proposal Direvisi']);
        // dd($user);
    }
}
