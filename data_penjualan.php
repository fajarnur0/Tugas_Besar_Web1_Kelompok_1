<?php 
require 'koneksi.php';

$result_penjualan= mysqli_query($conn, "SELECT * FROM penjualan");

$penjualan = mysqli_fetch_all($result_penjualan, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>
    <style>
        h1,h3{
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .title{
            background-color: yellow;
            width: 400px;
            margin: auto;
            border: 2px solid black;
            border-radius: 20px;
        }

        table{
            display: flex;
            justify-content: center;
            border-collapse: collapse;
        }

        th{
            border: 2px solid black;
            background-color: yellow;
        }

        td{
            border: 2px solid black;
            padding: 15px;
        }

        .button{
            display: inline-block;
            text-align: center;
            width: 100px;
            text-decoration: none;
            border: 2px solid green;
            padding: 5px;
            border-radius: 10px;
            color: white;
            background-color: green;
            font-weight: bold;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            cursor: pointer;
        }

        .button:hover{
            background-color: red;
            border: 2px solid red;
        }

        .button:active{
            background-color: orange;
            border: 2px solid orange;
        }

        .aksiButton{
            text-decoration: none;
            background-color: darkslategrey;
            color: white;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
        }

        .aksiButton:hover{
            background-color: red;
        }

        .aksiButton:active{
            background-color: orange;
        }
    </style>
</head>
<body>
    <div class="title">
        <h1>Toko Cat Bangun Jaya</h1>
        <h3>Data Penjualan</h3>
    </div>
    <table cellpadding="10" cellspacing="0">
        <tr>
            <td colspan="11" style="text-align: end; border:0;">
                <a href="tambah.php" class="button">Tambah Data</a>
                <button class="button" onclick="refresh()">Refresh</button>
            </td>
        </tr>

        <tr>
            <th>No.</th>
            <th>Nama Customor</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Tanggal Penjualan</th>
            <th>Jenis Cat</th>
            <th>Warna Cat</th>
            <th>Jumlah Beli</th>
            <th colspan="3">Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($penjualan as $pnjl):?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?= $pnjl["nama_customer"]; ?></td>
                <td><?= $pnjl["no_hp"];?></td>
                <td><?= $pnjl["alamat"];?></td>
                <td><?= date("d-m-Y", strtotime($pnjl["tgl_penjualan"]));?></td>
                <td><?= $pnjl["jenis_cat"];?></td>
                <td><?= $pnjl["warna"];?></td>
                <td><?= $pnjl["jml_beli"];?></td>
                <td><a href="hapus.php/?id=<?= $pnjl["id"] ?>" class="aksiButton" onclick="hapusData()">Hapus</a></td>
                <td><a href="edit.php/?id=<?= $pnjl["id"]?>" class="aksiButton">Edit</a></td>
                <td><a href="nota.php/?id=<?= $pnjl["id"]?>" class="aksiButton">Nota</a></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach ?>
    </table>

    <script>
        function hapusData() {
            if (confirm("Apakah Anda yakin ingin menghapus data?")) {
                window.location.href = "halaman_baru.php";
            }
        }

        function refresh() {
            location.reload();
        }
    </script>
</body>
</html>