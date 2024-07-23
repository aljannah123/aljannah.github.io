<?php 
require 'functions.php';

if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>

    <style type="text/css">
label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

table {
    border-collapse: collapse;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

table tr {
    margin-bottom: 10px;
}

table td {
    padding: 5px;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

h1 {
    text-align: center;
    color: #333;
    font-family: Arial, sans-serif;
    margin-bottom: 20px;
}
    </style>
</head>
<body>
    <h1>HALAMAN REGISTRASI</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="username">Username</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="username" id="username">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>:</td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password2">Konfirmasi Password</label>
                </td>
                <td>:</td>
                <td>
                    <input type="password" name="password2" id="password2">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="register">Register</button>
                </td>
               
            </tr>
        </table>
    </form>
</body>
</html>