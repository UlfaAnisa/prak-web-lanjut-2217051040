@extends ('layouts.app')

@section ('content')

<div class="container">
        <h1 class="text-center">List Data</h1>
    <div class="mb-3 mt-2">
        <a href="{{ route('user.create') }}" class="btn btn-add">Tambah Pengguna Baru</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Foto</th>
                <th>Aksi</th>
                <th>IPK</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kelas as $user) { ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['nama'] ?></td>
                <td><?= $user['nama_kelas'] ?></td>
                <td><?= $user['ipk'] ?></td>
                <td>
                    <img src="{{asset('img/'. $user->foto)}}" alt="Foto User" width="100">
                </td>
                <td>
                    <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-edit btn-sm">Edit</a>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-detail btn-sm">Detail</a>
                    <button class="btn btn-delete btn-sm" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }">Delete</button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>