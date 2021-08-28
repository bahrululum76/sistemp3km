<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Dana;
use App\Models\Proposal;
use Mail;
use App\Mail\RevMail;
use PDF;
class PilihReviewController extends Controller
{

    public function proposalperprodi(Request $request){
        $user = User::where('roles_id', 4)->value('id');
        
        $keyword = $request->data;
        $proposal=Proposal::where('category_id',1)->where('status_id',2)->whereHas('user', function ($q) use ($keyword){
            $q->where('prodi',$keyword);
        })->get();
        
        $prop = Proposal:: where('user_id',$user)->get();

        // $prop1 = $prop->user_id = $user;
        // dd($prop);

        return view("lppm.pilih_reviewer", compact('proposal','user'));
    }

    public function index()
    {

        $user = User::where('roles_id', '=', 4)->get();
        $proposal = Proposal::all();
        
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

        $prop =DB::table('proposals')->where('id','=',$proposal->id)->Value('judul');
        $user2 =DB::table('users')->where('id','=',$proposal->user_id)->Value('name');
        $prop1 =PROPOSAL::where('id','=',$proposal->id)->get();
        $user1 =DB::table('users')->where('id','=',$proposal->reviewer_id)->Value('name');
        $user3 =User::where('id','=',$proposal->reviewer_id)->get();
        
        $user =DB::table('users')->where('id','=',$proposal->reviewer_id)->value('email');   
        // ->where('id','=',$proposal->user_id);
       


        $data["email"] = $user;
        $data["title"] = "Review Proposal";
        $data["body"] = ' Proposal Penelitian , atas nama '. $user2 . ' dengan judul ' .$prop. ' sudah diterima untuk direview oleh saudara , silahkan cek website';
        
        $pdf = PDF::loadView('admin.surattugas1',['prop1'=>$prop1,'user3'=>$user3]);
  
        Mail::send('admin.pil', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "SuratTugas.pdf");
        });
        // Mail::to($user)->send(new RevMail($detail));

        return redirect('lppm/pilih_review')->with(['success' => 'Reviewer Telah Dipilih']);
        // dd('seccess');
    }

    // public function detail(Request $request, $id){
    //     $proposal= Proposal::find($id);

    //     $proposal = Proposal::where('id','=',$id)
    //     ->where('status_id','=',2)
    //     ->where('category_id','=',1)
    //     ->get();

    public function detailpilihreview (Request $request, $id){
        $proposal = Proposal::find($id);
        // $user1= User::where('roles_id','=',4)->pluck('id');
        // $prop = Proposal::where('id',$id)
        // ->where('user_id','!=',4)
        // ->get();
        $user= User::where('roles_id','=',4)->get();
        $dana=Dana::where('proposal_id','=',$proposal->id)->get();
        $proposal = Proposal::where('id','=',$id)
        ->where('category_id','=',1)
        ->where('status_id','=',2)
        ->get();
        // dd($prop);
        return view("lppm.detailpilihreviewproposal", compact('proposal', 'user','dana'));

    }
}
