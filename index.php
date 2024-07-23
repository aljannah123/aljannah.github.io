<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;



}
require 'functions.php';

$JumlahDataPerhalaman = 4;
$jumlahData = count(query ("SELECT * FROM santri "));
$jumlahHalaman = ceil($jumlahData / $JumlahDataPerhalaman);
$halamanAktif = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
$awalData = ( $JumlahDataPerhalaman * $halamanAktif ) - $JumlahDataPerhalaman;


$santri = query("SELECT * FROM santri LIMIT $awalData, $JumlahDataPerhalaman");

if(isset($_POST["cari"]) ) {
  $santri = cari($_POST["keyword"]);  
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <a href="logout.php">Logout</a>

    <h1>Daftar Santri</h1>
    <p>Berikut Data Santri Baru Yayasan Tahfizh Darusshomad:</p>
    <a href="tambah.php">Tambah Data Santri</a>
    <br></br>
    <form action="" method="post">
        
        <input type="text" name="keyword" size="35" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>

    </form>
    <br><br>

<?php  if( $halamanAktif > 1 ) : ?>
<a href="?page=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>
<?php  for($i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
    <?php if($i == $halamanAktif ) :  ?>
    <a href="?page=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
<?php else : ?>
    <a href="?page=<?= $i; ?>"><?= $i; ?></a>
<?php  endif; ?>

<?php endfor; ?>
<?php  if( $halamanAktif < $jumlahHalaman ) : ?>
<a href="?page=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>


    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nis</th>
            <th>Alamat</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($santri as $row ) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= htmlspecialchars($row["nama"]); ?></td>
            <td><?= htmlspecialchars($row["nis"]); ?></td>
            <td><?= htmlspecialchars($row["alamat"]); ?></td>
            <td>
                <img src="img/<?= htmlspecialchars($row["gambar"]); ?>" width="50">
            </td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
        
    </table>

</body>
</html>