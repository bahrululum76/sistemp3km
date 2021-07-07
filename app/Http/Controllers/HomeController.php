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
        $user =User::all();
        $pengabdian=Pengabdian::all();
        $penelitian=Penelitian::all();
        return view('admin.home', compact('informasi','user','penelitian','pengabdian'));
    }
    public function HomeDosen()
    {
        return view('dosen.home');
    }
    public function HomeLppm()
    {   
        $kemajuan=Kemajuan::all();
        $kemajuan2=Kemajuan::where('category_id','=',2)->get();
        $pengabdian=Pengabdian::all();
        $penelitian=Penelitian::all();
        $proposal1=Proposal::all();
        // $proposal2=Proposal::where('category_id','=',2)->get();
        return view('lppm.home',compact('proposal1','penelitian','kemajuan','pengabdian'));
    }
    public function HomeReviewer()
    {
        return view('reviewer.home');
    }
}
