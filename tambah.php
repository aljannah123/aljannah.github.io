<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;



}
require 'functions.php';


if( isset($_POST["submit"]) ) {

		


	
	if( tambah($_POST) > 0 ) {
		echo "
		<script>
		alert('data berhasil ditambahkan');
		document.location.herf = 'index.php';
		</script> ";
	}else {
		echo "
		<script>
		alert('data gagal ditambahkan');
		document.location.herf = 'index.php';
		</script> ";
	}

}

 ?>


<!DOCTYPE html>
<html>
<head>
	
	<title>Tambah Data Santri</title>
	<style type="text/css">
	body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #333;
}

form {
    width: 50%;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

ul {
    list-style: none;
    padding: 0;
}

li {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

label {
    width: 100px;
    font-weight: bold;
}

input[type="text"],
input[type="file"] {
    flex: 1;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px 20px;
    background-color: #5cb85c;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #4cae4c;
}
</style>
</head>
<body>
	<h1>Tambah Data Santri</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="nis">Nis :</label>
				<input type="text" name="nis" id="nis" required>
			</li>
			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat">
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
			
			
		</ul>
		

	</form>

</body>
</html>