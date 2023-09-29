<?php
require 'koneksi.php';

if(isset ($_POST['submit'])) {

    $nama_customer = $_POST['nama_customer'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $tgl_penjualan = $_POST['tgl_penjualan'];
    $jenis_cat = $_POST['jenis_cat'];
    $warna = $_POST['warna'];
    $jml_beli = $_POST['jml_beli'];

    $result_penjualan = mysqli_query($conn, "INSERT INTO penjualan (`id`, `nama_customer`, `no_hp`, `alamat`, `tgl_penjualan`, `jenis_cat`, `warna`, `jml_beli`) VALUES ('', '$nama_customer', '$no_hp', '$alamat', '$tgl_penjualan', '$jenis_cat', '$warna', '$jml_beli')");

    if ($result_penjualan) {
        echo '<script>alert("Data Berhasil Ditambahkan.")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>
        div{
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        table{
            width: 500px;
            border: 2px solid black;
            border-collapse: collapse;
            box-shadow: 5px 10px 8px 3px #888888;
        }

        th{
            background-color: lightblue;
        }

        h1{
            font-size: 25px;
        }

        .topBorder{
            border-top: 2px solid black ;
        }

        td{
            background-color: lightgray;
            padding: 12px;
        }

        #button{
            
            text-align: center;
            border: 1px solid whitesmoke;
        }

        .submitButton{
            border: none;
            border-radius: 5px;
            width: 60px;
            background-color: green;
            padding: 8px;
            color: whitesmoke;
            font-weight: bold;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-right: 10px;
            cursor: pointer;
        }

        .submitButton:hover{
            background-color: red;
        }

        .submitButton:active{
            background-color: orange;
        }

        .data{
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }
        
        .dataButton{
            display: inline-block;
            text-align: center;
            width: 150px;
            text-decoration: none;
            padding: 5px;
            border-radius: 10px;
            color: white;
            background-color: green;
            font-weight: bold;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            cursor: pointer;;
        }

        .dataButton:hover{
            background-color: red;
        }

        .dataButton:active{
            background-color: orange;
        }
    </style>
</head>
<body>
    <div class="data">
        <a class="dataButton" href="data_penjualan.php">Ke Data Penjualan</a>
    </div>

    <div>
        <form action="" method="POST">
            <table>
                <tr>
                    <th colspan="3"><h1>Form Tambah Data</h1></th>
                </tr>
            
                <tr class="topBorder">
                    <td><label>Nama Customer</label></td>
                    <td>:</td>
                    <td><input type="text" name="nama_customer"></td>
                </tr>

                <tr>
                    <td><label>No HP</label></td>
                    <td>:</td>
                    <td><input type="text" name="no_hp"></td>
                </tr>

                <tr>
                    <td><label>Alamat</label></td> 
                    <td>:</td>
                    <td><textarea name="alamat"></textarea></td>
                </tr>

                <tr>
                    <td><label>Tanggal Penjualan</label></td> 
                    <td>:</td>
                    <td><input type="date" name="tgl_penjualan"></td>
                </tr>

                <tr>
                    <td><label>Jenis Cat:</label></td>
                    <td>:</td>
                    <td>
                        <select name="jenis_cat">
                            <option disabled selected>Jenis Cat</option>
                            <option value="Bituminous Paint">Bituminous Paint</option>
                            <option value="Chlorinated Rubber">Chlorinated Rubber</option>
                            <option value="Vinyl">Vinyl</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Warna Cat:</label></td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="warna" value="Merah">Merah
                        <input type="radio" name="warna" value="Biru">Biru
                        <input type="radio" name="warna" value="Kuning">Kuning
                    </td>
                </tr>

                <tr>
                    <td><label>Jumlah Beli:</label></td>
                    <td>:</td>
                    <td><input type="number" name="jml_beli"></td>
                </tr>

                <tr>
                    <td id="button" colspan="3">
                        <input class="submitButton" type="submit" name="submit" value="Simpan">
                        <input class="submitButton" type="reset" name="reset" value="Batal">
                    </td>
                </tr>
            </table>
         </form>
    </div>
</body>
</html>