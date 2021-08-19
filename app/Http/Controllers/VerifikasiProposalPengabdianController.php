<?php

namespace App\Http\Controllers;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use Mail;
use PDF;
use App\Mail\RevMail;
use Validator;
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
        
        $prop =DB::table('proposals')->where('id','=',$proposal->id)->Value('judul');
        $user2 =DB::table('users')->where('id','=',$proposal->user_id)->Value('name');
        $prop1 =Proposal::where('id','=',$proposal->id)->get();
        $user1 =DB::table('users')->where('id','=',$proposal->reviewer_id)->Value('name');
        $user =DB::table('users')->where('id','=',$proposal->user_id)->value('email');   
        // ->where('id','=',$proposal->user_id);
       


        $data["email"] = $user;
        $data["title"] = "Proposal Diterima";
        $data["body"] = ' Proposal Penelitian , atas nama '. $user2 . ' dengan judul ' .$prop. ' sudah diterima untuk direview oleh saudara , silahkan cek website';
        $pdf = PDF::loadView('admin.surattugas',['prop1'=>$prop1]);
  
        Mail::send('admin.pil', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "SuratTugas.pdf");
        });
        
        
    
        return redirect('reviewer/verifikasi_proposal_pengabdian')->with(['success' => 'Proposal Diterima']);
    }
    public function revisi(Request $request, $id){

        $rules = [
            'detail_revisi'          => 'required',

        ];
 
        $messages = [
            
            'detail_revisi.required'          => 'Detail revisi wajib diisi.',
            
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

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
