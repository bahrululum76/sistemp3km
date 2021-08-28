<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;
use App\Models\Dana;
use Mail;
use App\Mail\RevMail;

class PilihReviewPengabdianController extends Controller
{
    public function proposalperprodi(Request $request){
        $user = User::where('roles_id', '=', 4)->get();
        $keyword = $request->data;
        $proposal=Proposal::where('category_id',2)->where('status_id',2)->whereHas('user', function ($q) use ($keyword){
            $q->where('prodi',$keyword);
        })->get();
        return view("lppm.pilih_review_pengabdian", compact('proposal','user'));
    }
    public function index()
    {

        $user = User::where('roles_id', '=', 4)->get();
        
        $proposal = Proposal::where( 'category_id','=',2 )
        ->where('reviewer_id','=', null )
        ->where('status_id','=',2)
        ->get();

        
        return view("lppm.pilih_review_pengabdian", compact('proposal', 'user'));
    }

    public function tolak(Request $request, $id)
    {
        $proposal = Proposal::find($id);
        
        

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

        // $prop =DB::table('proposals')->where('id','=',$proposal->id)->pluck('judul');
        // $user2 =DB::table('users')->where('id','=',$proposal->user_id)->pluck('name');
        // $user1 =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('name');
        // $user =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('email');   
        // ->where('id','=',$proposal->user_id);
        $detail =[
            'title'=>'Review Proposal',
            'body'=>  $user1.' Proposal Pengabdian, atas nama'.$user2.' dengan judul'.$prop.'sudaah tersedia untuk di koreksi oleh anda , silahkan cek website'
        ];
        
        $prop =DB::table('proposals')->where('id','=',$proposal->id)->Value('judul');
        $user2 =DB::table('users')->where('id','=',$proposal->user_id)->Value('name');
        $prop1 =PROPOSAL::where('id','=',$proposal->id)->get();
        $user1 =DB::table('users')->where('id','=',$proposal->reviewer_id)->Value('name');
        $user3 =User::where('id','=',$proposal->reviewer_id)->get();
        
        $user =DB::table('users')->where('id','=',$proposal->reviewer_id)->value('email');   
        // ->where('id','=',$proposal->user_id);
       


        $data["email"] = $user;
        $data["title"] = "Review Proposal";
        $data["body"] = ' Proposal Pengabdian , atas nama '. $user2 . ' dengan judul ' .$prop. ' sudah diterima untuk direview oleh saudara , silahkan cek website';
        $pdf = PDF::loadView('admin.surattugas1',['prop1'=>$prop1,'user3'=>$user3]);
  
        Mail::send('admin.pil', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "SuratTugas.pdf");
        });


        return redirect('lppm/pilih_review_pengabdian')->with(['success' => 'Reviewer Telah Dipilih']);
    }

    public function detailpilihreview_ (Request $request, $id){
        $proposal = Proposal::find($id);
        
        $user= User::
        where('roles_id','=',4)->get();

        $dana=Dana::where('proposal_id','=',$proposal->id)->get();
        $proposal = Proposal::where('id','=',$id)
        ->where('category_id','=',2)
        ->where('status_id','=',2)
        
        ->get();

        return view("lppm.detailpilihreviewproposal_", compact('proposal', 'user','dana'));

    }
}

