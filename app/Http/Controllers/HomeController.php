<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Informasi;
use App\Models\User;
use App\Models\Proposal;

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
        return view('admin.home', compact('informasi','user'));
    }
    public function HomeDosen()
    {
        return view('dosen.home');
    }
    public function HomeLppm()
    {
        return view('lppm.home');
    }
    public function HomeReviewer()
    {
        return view('reviewer.home');
    }
}
