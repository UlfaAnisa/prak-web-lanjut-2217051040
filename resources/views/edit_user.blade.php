<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom right, #e3f2fd, #bbdefb);
        }
        form {
            background: ;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Adds padding and border to the element's total width and height */
        }
        input[type="submit"] {
            background-color: #363636;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #000080;
        }
        h2 {
            text-align: center; /* Center align the title */
        }
    </style>
</head>
<body> -->

@extends('layouts.app')

@section('content')
<div>
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" value="{{ old('nama', $user->nama) }}">
 
        <label for="npm">NPM : </label>
        <input type="text" id="npm" name="npm" class="form-control" placeholder="Masukkan NPM" value="{{ old('npm', $user->npm) }}">
        
        <label for="kelas">Kelas :</label>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelas as $kelasItem)
            <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                {{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>
        <label for="foto" class="form-label">Foto</label>
        <input class="form-control" type="file" id="foto" name="foto">
        @if ($user->foto)
        <img src="{{asset($user->foto)}}" alt="User Photo" width="100" class="mt-2">
        @endif
        <button type="submit">Submit</button>
    </form>
</div>
@endsection