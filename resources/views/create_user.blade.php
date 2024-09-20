<!DOCTYPE html>
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
            background: linear-gradient(to bottom right, #DE3163,);
        }
        form {
            background: red;
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
            background-color: #DE3163;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #F0E68C;
        }
        h2 {
            text-align: center; /* Center align the title */
        }
    </style>
</head>
<body>

    <form action="/user/store" method="POST">
        <h2>Create User</h2>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="nama">Nama :</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Anda" required>
        </div>

        <div class="form-group">
            <label for="npm">NPM :</label>
            <input type="text" id="npm" name="npm" placeholder="Masukkan NPM Anda" required>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas :</label>
            <input type="text" id="kelas" name="kelas" placeholder="Masukkan Kelas Anda" required>
        </div>

        <input type="submit" value="Submit">
    </form>

</body>
</html>