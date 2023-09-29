<?php
require 'koneksi.php';
$id = $_GET["id"];
$result_penjualan= mysqli_query($conn, "DELETE FROM penjualan WHERE `id` = '$id'" );
if($result_penjualan){
    echo '<script>alert("Data Berhasil Dihapus.")</script>';
    echo '<h3 style="display: flex; justify-content: center; margin-top: 200px;">Data Berhasil Dihapus.</h3>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus</title>
    <style>
        div{
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="kembali">
        <button class="buttonBack" onclick="kembali()">Kembali</button>
    </div>

    <script>
        function kembali() {
            window.history.back();
        }
    </script>
</body>
</html>