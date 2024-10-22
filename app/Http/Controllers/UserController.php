<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas; 
use App\Models\UserModel;
use App\Http\Requests\UserRequest;



class UserController extends Controller
{
        public $userModel;
        public $kelasModel;
        public function __construct()
    {
    $this->userModel = new UserModel();
    $this->kelasModel = new Kelas();
    }

    public function index() 
        { 
            $data = [ 
                'title' => 'Create User', 
                'kelas' => $this->userModel->getUser(), 
            ]; 
        
            return view('list_user', $data); 
        }

    public function profile($nama = "", $kelas = "", $npm = "") {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view ('profile', $data);
    }

    // public function create() {
    //     return view ('create_user', [
    //         'kelas' => Kelas::all(),
    //     ]);
    // }

    public function create() {
        $this->kelasModel = new Kelas();

        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'kelas_id' => 'required',
            'foto' => 'image|file|max:2048', // Validasi foto
        ]);

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename, 'public');
            $file->move('img', $filename);

            $this->userModel->create([
                'nama' => $request->input('nama'),
                'npm' => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id'),
                'foto' => $filename,
            ]);

        return redirect()->to('/user')->with('seccess', 'User berhasil ditambahkan');
    }
}

    public function show($id) {
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('profile', $data);
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);

        $kelasModel = new Kelas();
        $kelas = $kelasModel -> getKelas();
        $title = 'Edit.user';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);

        $user->nama=$request ->nama;
        $user->npm=$request ->npm;
        $user->kelas_id=$request ->kelas_id;

        if($request->hasFile('foto')){
            $filename=time() . '_' . $request ->foto->extension();
            $request ->foto->move(public_path('upload/img'), $filename);
            $user->foto = $filename;
        }

        $user->save();

        return redirect()->to('/user')->with('success', 'User Update Successfully');
    }

    public function destroy($id){
        $user=UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('user/')->with('success', 'User has been delete successfully');

    }

}