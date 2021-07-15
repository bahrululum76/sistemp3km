<?php

namespace App\Http\Controllers;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\RevMail;
use App\Models\User;
use Mail;
use Auth;
use Validator;
class VerifikasiController extends Controller
{
    public function index()
    {
    
        
        $user=User::all();
        $proposal= DB::table('proposals')
        ->select('user_id','reviewer_id','category_id')
        ->where('reviewer_id','=',Auth::user()->id)
        ->where('category_id','=',1)
        ->where('status_id','=',3)
        ->distinct()->get();
        
        // dd($proposal);
        return view("reviewer.verifikasi_proposal", compact('proposal','user'));
    }
    public function detail(Request $request, $id){
        $proposal= Proposal::find($id);

        $proposal = Proposal::where('user_id','=',$id)
        ->where('status_id','=',3)
        ->where('category_id','=',1)
        ->get();
        
        return view("reviewer.reviewproposal", compact('proposal'));
    
    }

    public function terima(Request $request, $id){
        $proposal= Proposal::find($id);
        if ($proposal->id= $id){

            $proposal1= Proposal::where('user_id','=',$proposal->user_id)
            ->update(['status_id' => 1]);

        }
        
        


        $prop =DB::table('proposals')->where('id','=',$proposal->id)->pluck('judul');
        $user2 =DB::table('users')->where('id','=',$proposal->user_id)->pluck('name');
        $user1 =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('name');
        $user =DB::table('users')->where('id','=',$proposal->reviewer_id)->pluck('email');   
        
        $detail =[
            'title'=>'Review Proposal',
            'body'=>  ' Proposal Pengabdian, atas nama'.$user2.' dengan judul'.$prop.'sudaah tersedia untuk di koreksi oleh anda , silahkan cek website'
        ];
        
        Mail::to($user)->send(new RevMail($detail));

        return redirect('reviewer/verifikasi_proposal');
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
