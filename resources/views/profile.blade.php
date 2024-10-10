<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WLTugas2</title>
    <style>
        body {
            font-family: Monrovia, monrovia;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #800080;
        }
        .profile-container {
            text-align: center;
            background-color: #CA226B;
            padding: 100px;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .profile-container img {
            width: 150px;
            height: 150px;
            border-radius: 100%;
            margin-bottom: 50px;
        }
        .profile-container .info {
            background-color: #ddd;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .info-item {
            background-color: #d9dddc;
            color: #222021;
            margin: 10px 0;
            padding: 10px;
            width: 100%;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }
    </style>
</head>

<body>
<div class="profile-container">
        <div class="profile-picture">
            <img src="{{ asset('img/' . $user->foto) }}" alt="Profile Picture" />
        </div>

    <div class="profile-info">
        <div class="info-item">Nama : {{ $user->nama }}</div>
        <div class="info-item">NPM : {{ $user->npm }}</div>
        <div class="info-item">Kelas : {{ $user->nama_kelas ?? 'Kelas tidak ditemukan' }}</div>
    </div>
</div>

</body>

</html>