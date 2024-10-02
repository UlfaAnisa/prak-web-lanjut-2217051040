
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WLTugas2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .profile-container {
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-container img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .profile-container .info {
            background-color: #FFFF33;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<div class="profile-container">
    <img src="https://tse3.mm.bing.net/th?id=OIP.7v1NRcDNndfz2GtLSef8cgHaHa&pid=Api&P=0&h=220" alt="Minions">
    <div class="info">
        <strong>Nama:</strong> {{ $nama }}
        @foreach($errors->get('nama') as $msg)
            <p>class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>

    <div class="info">
        <strong>Kelas:</strong> {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}
    </div>
    <div class="info">
        <strong>NPM:</strong> {{ $npm }}
    </div>
</div>

</body>

</html>
