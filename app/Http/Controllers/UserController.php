<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class UserController extends Controller
{


    public function index()
    {
        // mengambil data dari table users
        //$user = DB::table('users')->get();
        $user = User::all();
        // mengirim data user ke view index
        //return view('admin.users', ['user' => $user]);
        return view("admin.users", compact('user'));
    }

    public function store(Request $request)
    {
        // insert data ke table user
        $user = new User;
        $user->nidn = $request->nidn;
        $user->name = $request->name;

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->roles_id = $request->roles_id;
        $user->save();
        // 'name' => $request->nama,
        // 'email' => $request->email,
        // 'password' => $pass,
        // 'role' => $request->role,
        // ]);
        return redirect('admin/users')->with(['success' => 'Data Berhasil ditambahkan']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, $id)
    {
        // update data dosen

        $user1 = User::find($id);
        //$user1 = new User;
        $user1->nidn = $request->nidn;
        $user1->name = $request->name;
        $user1->email = $request->email;
        $user1->password = bcrypt($request->password);
        $user1->alamat = $request->alamat;
        $user1->no_hp = $request->no_hp;
        $user1->roles_id = $request->roles_id;
        $user1->save();

        return redirect('admin/users')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function delete($id)
    {

        $user1 = User::find($id);
        $user1->delete();
        return redirect('admin/users');
    }
}
