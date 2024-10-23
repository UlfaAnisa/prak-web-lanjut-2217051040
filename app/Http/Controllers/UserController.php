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
        ];
        return view ('profile', $data);
    }

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
        // Validasi input termasuk IPK
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|max:2048',
            'ipk' => 'nullable|numeric|min:0|max:4.00', // Validasi IPK
        ]);

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename, 'public');
            $file->move('img', $filename);
        } else {
            $filename = null; // Jika tidak ada foto
        }

        // Simpan data pengguna termasuk IPK
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $filename,
            'ipk' => $request->input('ipk'), // Simpan nilai IPK
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
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
        $kelas = $kelasModel->getKelas();
        $title = 'Edit.user';

        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id) {
        $user = UserModel::findOrFail($id);

        // Validasi input termasuk IPK
        $request->validate([
            'nama' => 'required|string|max:255',
           
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|max:2048',
            'ipk' => 'nullable|numeric|min:0|max:4.00', // Validasi IPK
        ]);

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('upload/img'), $filename);
            $user->foto = $filename;
        }

        // Update data pengguna termasuk IPK
        $user->update([
            'nama' => $request->input('nama'),
           
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $user->foto, // Tetap menggunakan foto lama jika tidak diubah
            'ipk' => $request->input('ipk'), // Update nilai IPK
        ]);

        return redirect()->to('/user')->with('success', 'User Update Successfully');
    }

    public function destroy($id) {
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->to('user/')->with('success', 'User has been deleted successfully');
    }
}
