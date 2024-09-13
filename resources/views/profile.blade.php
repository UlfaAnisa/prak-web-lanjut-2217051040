<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #FFFF00;
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
            background-color: #ddd;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <img src="https://img.pixers.pics/pho(s3:700/PI/62/8/700_PI628_0a52c36a534004114ce074067697190e_5b7abc84a0477_.,700,653,jpg)/stickers-minion-kevin.jpg.jpg">
        <div class="info">
            <strong>Nama:</strong> <?= $nama ?>
        </div>
        <div class="info">
            <strong>Kelas:</strong> <?= $kelas ?>
        </div>
        <div class="info">
            <strong>NPM:</strong> <?= $npm ?>
        </div>
    </div>
</body>

</html>