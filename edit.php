<?php
require "koneksi.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM penjualan WHERE `id` = '$id'";
    $result_penjualan = mysqli_query($conn, $query);

    if (mysqli_num_rows($result_penjualan) == 1) {
        $row = mysqli_fetch_assoc($result_penjualan);
        $nama_customer = $row['nama_customer'];
        $no_hp = $row['no_hp'];
        $alamat = $row['alamat'];
        $tgl_penjualan = $row['tgl_penjualan'];
        $jenis_cat = $row['jenis_cat'];
        $warna = $row['warna'];
        $jml_beli = $row['jml_beli'];


    } else {
         echo "<script>alert('Data Tidak Ditemukan.');</script>";;
        exit;
    }
}

if(isset ($_POST['ubah'])) {

    $nama_customer = $_POST['nama_customer'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $tgl_penjualan = $_POST['tgl_penjualan'];
    $jenis_cat = $_POST['jenis_cat'];
    $warna = $_POST['warna'];
    $jml_beli = $_POST['jml_beli'];

    $query = "UPDATE penjualan SET `nama_customer` = '$nama_customer', `no_hp` = '$no_hp', `alamat` = '$alamat', `tgl_penjualan` = '$tgl_penjualan', `jenis_cat` = '$jenis_cat', `warna` = '$warna', `jml_beli` = '$jml_beli' WHERE `id` = '$id'";
    
    $result_penjualan = mysqli_query($conn, $query);
    
    if ($result_penjualan) {
        echo "<script>alert('Data Berhasil Diperbarui.');</script>";
    }else{
        echo "<script>alert('Gagal memperbarui data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penjualan</title>
    <style>
        div{
            display: flex;
            justify-content: center;
            margin-top: 20px;
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
    
        .buttonBack{
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

        .buttonBack:hover{
            background-color: red;
            border: 2px solid red;
        }

        .buttonBack:active{
            background-color: orange;
            border: 2px solid orange;
        }

        .kembali{
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="kembali">
        <button class="buttonBack" onclick="kembali()">Kembali</button>
    </div>
    
    <div>
        <form action="" method="POST">
            <table>
                <tr>
                    <th colspan="3"><h1>Form Edit Data</h1></th>
                </tr>
            
                <tr class="topBorder">
                    <td><label>Nama Customer</label></td>
                    <td>:</td>
                    <td><input type="text" name="nama_customer" value="<?php echo $nama_customer;?>"></td>
                </tr>

                <tr>
                    <td><label>No HP</label></td>
                    <td>:</td>
                    <td><input type="text" name="no_hp" value="<?php echo $no_hp;?>"></td>
                </tr>

                <tr>
                    <td><label>Alamat</label></td> 
                    <td>:</td>
                    <td><textarea name="alamat"><?php echo $alamat;?></textarea></td>
                </tr>

                <tr>
                    <td><label>Tanggal Penjualan</label></td> 
                    <td>:</td>
                    <td><input type="date" name="tgl_penjualan" value="<?php echo $tgl_penjualan;?>"></td>
                </tr>

                <tr>
                    <td><label>Jenis Cat:</label></td>
                    <td>:</td>
                    <td>
                        <select name="jenis_cat" value="<?php echo $jenis_cat;?>">
                            <option disabled selected>Jenis Cat</option>
                            <option value="Bituminous Paint" <?php 
                            if($jenis_cat == "Bituminous Paint"){
                                echo 'selected';
                            }?>>Bituminous Paint</option>

                            <option value="Chlorinated Rubber" <?php 
                            if($jenis_cat == "Chlorinated Rubber"){
                                echo 'selected';
                            }?>>Chlorinated Rubber</option>
                            
                            <option value="Vinyl" <?php 
                            if($jenis_cat == "Vinyl"){
                                echo 'selected';
                            }?>>Vinyl</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Warna Cat:</label></td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="warna" value="Merah" <?php 
                            if($warna == "Merah"){
                                echo 'checked';
                            }?>>Merah

                        <input type="radio" name="warna" value="Biru"  <?php 
                            if($warna == "Biru"){
                                echo 'checked';
                            }?>>Biru
                        <input type="radio" name="warna" value="Kuning" <?php 
                            if($warna == "Kuning"){
                                echo 'checked';
                            }?>>Kuning
                    </td>
                </tr>

                <tr>
                    <td><label>Jumlah Beli:</label></td>
                    <td>:</td>
                    <td><input type="number" name="jml_beli" value="<?php echo $jml_beli;?>"></td>
                </tr>

                <tr>
                    <td id="button" colspan="3">
                        <input class="submitButton" type="submit" name="ubah" value="Ubah" id="submitButton">
                        <input class="submitButton" type="reset" name="reset" value="Batal">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script>
        function kembali() {
            window.history.back();
        }
    </script>
</body>
</html>