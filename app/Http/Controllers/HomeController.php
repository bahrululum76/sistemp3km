<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Informasi;
use App\Models\User;
use App\Models\Proposal;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Kemajuan;
use App\Models\Kegiatan;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $informasi = Informasi::all();
        $user =User::where('roles_id','=',2)
        ->where('roles_id','=',3)
        ->where('roles_id','=',4)->get();
        $pengabdian=Pengabdian::all();
        $penelitian=Penelitian::all();
        return view('admin.home', compact('informasi','user','penelitian','pengabdian'));
    }
    public function HomeDosen()
    {
        $informasi = Informasi::all();
        $kegiatan =Kegiatan::all();
        return view('dosen.home', compact('informasi','kegiatan') );
    }

    public function HomeLppm()
    {   
        $kemajuan=Kemajuan::all();
        $kemajuan2=Kemajuan::where('category_id','=',2)->get();
        $pengabdian=Pengabdian::all();
        $penelitian=Penelitian::all();
        $proposal1=Proposal::where('reviewer_id','=',null);
        // $proposal2=Proposal::where('category_id','=',2)->get();
        return view('lppm.home',compact('proposal1','penelitian','kemajuan','pengabdian'));
    }
    public function HomeReviewer()
    {   
        $proposal =Proposal::where('category_id','=',1)
        ->where('reviewer_id','=',Auth::user()->id)
        ->where('status_id','=',3)
        ->get();
        $proposal2 =Proposal::where('category_id','=',2)
        ->where('reviewer_id','=',Auth::user()->id)
        ->where('status_id','=',3)
        ->get();
        return view("reviewer.home", compact('proposal', 'proposal2'));
    }
}
