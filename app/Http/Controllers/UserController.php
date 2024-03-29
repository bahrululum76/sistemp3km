<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Validator;

class UserController extends Controller
{


    public function index()
    {
        
        $user = User::where('roles_id','=',2)
        ->orwhere('roles_id','=',3)
        ->orwhere('roles_id','=',4)
        ->orderBy('id','ASC')->get();
        //return view('admin.users', ['user' => $user]);
        return view("admin.users", compact('user'));
    }
    public function index_adm()
    {
      
        $user = User::where('roles_id','=',1)->get();
       
        return view("lppm.kelolaadmin", compact('user'));
    }

    public function index_rev(){
        $user = User::where('roles_id','=',4)->get();
        $user1 =User::all();
        return view("lppm.kelolareviewer", compact('user','user1'));
    }

    public function store(Request $request)
    {
        // insert data ke table user
        $rules = [
            'nidn'          => 'required|unique:users',
            'name'          => 'required',
            'email'         => 'required|email|unique:users',
            'prodi'         => 'required',
            'jabatan'         => 'required',
            'roles_id'         => 'required'
        ];
        $messages = [
            'nidn.unique'            => 'Nidn sudah terdaftar.',
            'name.required'          => 'Nama wajib diisi.',
            'password.min'           => 'Password minimal diisi dengan 5 karakter.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Email tidak valid.',
            'email.unique'           => 'Email sudah terdaftar.',
            'prodi.required'        =>  'prodi tidak boleh kosong',
            'jabatan.required'       => 'jabatan tidak boleh kosong',
            'roles_id.required'     =>  'hak akses tidak boleh kosong',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user = new User;
        $user->nidn = $request->nidn;
        $user->name = $request->name;
        $user->prodi = $request->prodi;
        $user->jabatan = $request->jabatan;
        $user->email = $request->email;
        $user->password = bcrypt(12345);
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
    public function store2(Request $request){

        $rules = [
            'nidn'          => 'required|unique:users',
            'name'          => 'required',
            'email'         => 'required|email|unique:users'
        ];
 
        $messages = [
            'nidn.unique'           => 'Nik sudah terdaftar.',
            'name.required'          => 'Nama wajib diisi.',
            'password.min'           => 'Password minimal diisi dengan 5 karakter.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Email tidak valid.',
            'email.unique'           => 'Email sudah terdaftar.',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user = new User;
        $user->nidn = $request->nidn;
        $user->name = $request->name;
        $user->prodi = $request->prodi;
        $user->jabatan = 'admin';
        $user->email = $request->email;
        $user->password = bcrypt('12345');
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->roles_id = 1;
        $user->save();

        return redirect('lppm/kelolaadmin')->with(['success' => 'Data Berhasil ditambahkan']);
    }

    public function edit2(Request $request, $id)
    {
        // update data dosen
        $rules = [
            'nidn'          => 'required|unique:users',
            'name'          => 'required',
            'email'         => 'required|email|unique:users'
        ];
 
        $messages = [
            'nidn.unique'           => 'Nidn sudah terdaftar.',
            'name.required'          => 'Nama wajib diisi.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Email tidak valid.',
            'email.unique'           => 'Email sudah terdaftar.',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user1 = User::find($id);
        
       
        $user1->name = $request->name;
        $user1->prodi = $request->prodi;
        $user1->email = $request->email;
        $user1->password = bcrypt($request->password);
        $user1->alamat = $request->alamat;
        $user1->no_hp = $request->no_hp;
        $user1->save();

        return redirect('lppm/kelolaadmin')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function edit3(Request $request, $id)
    {
        // update data dosen
        $rules = [
            'nidn'          => 'required|unique:users',
            'name'          => 'required',
            'email'         => 'required|email|unique:users'
        ];
 
        $messages = [
            'nidn.unique'           => 'Nidn sudah terdaftar.',
            'name.required'          => 'Nama wajib diisi.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Email tidak valid.',
            'email.unique'           => 'Email sudah terdaftar.',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user1 = User::find($id);
        
       
        $user1->name = $request->name;
        $user1->prodi = $request->prodi;
        $user1->email = $request->email;
        $user1->password = bcrypt($request->password);
        $user1->alamat = $request->alamat;
        $user1->no_hp = $request->no_hp;
        $user1->roles_id = $request->roles_id;
        $user1->save();

        return redirect('lppm/kelolareviewer')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function edit(Request $request, $id)
    {
        // update data dosen

        $user1 = User::find($id);
        //$user1 = new User;
        $user1->nidn = $request->nidn;
        $user1->name = $request->name;
        $user1->prodi = $request->prodi;
        $user1->jabatan = $request->jabatan;
        $user1->email = $request->email;
        $user1->password = bcrypt($request->password);
        $user1->alamat = $request->alamat;
        $user1->no_hp = $request->no_hp;
        $user1->roles_id = $request->roles_id;
        $user1->save();

        return redirect('admin/users')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function rev(Request $request){
        $user=User::where('id','=',$request->id)->update(['roles_id' => 4]);
        
    
        return redirect('lppm/kelolareviewer')->with(['success' => 'Data Berhasil ditambah']);
    }

    public function delete2($id)
    {

        $user1 = User::find($id);
        $user1->delete();
        return redirect('lppm/kelolaadmin');
    }


    public function delete($id)
    {

        $user1 = User::find($id);
        $user1->delete();
        return redirect('admin/users');
    }
}
