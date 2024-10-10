@extends ('layouts.app')

@section ('content')

<a href="{{ route('user.create') }}" class="btn 
btn-primary mb-3">View</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Aksi</th>
</tr>
</thead>
<tbody>
    <?php
    foreach ($kelas as $user) {
        ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nama'] ?></td>
            <td><?= $user['npm'] ?></td>
            <td><?= $user['nama_kelas'] ?></td>
            <td><a href="{{ route('user.show', $user->id) }}" class="btn btn-warning mb-3">Detail</a></td>
            <td></td>
    </tr>
    <?php
    }
    ?>
</tbody>
</table>

@endsection