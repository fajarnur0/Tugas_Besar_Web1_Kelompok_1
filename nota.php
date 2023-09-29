<?php 
require 'koneksi.php';

$id = $_GET['id'];
$result_penjualan = mysqli_query($conn, "SELECT * FROM penjualan WHERE `id` = '$id'");

foreach($result_penjualan as $penjualan){
    $nama_customer = $penjualan['nama_customer'];
    $no_hp = $penjualan['no_hp'];
    $alamat = $penjualan['alamat'];
    $tgl_penjualan = $penjualan['tgl_penjualan'];
    $jenis_cat = $penjualan['jenis_cat'];
    $warna = $penjualan['warna'];
    $jml_beli = $penjualan['jml_beli'];
}

switch($jenis_cat){
    case ("Bituminous Paint"):
        $harga = 20000;
        break;
    case ("Chlorinated Rubber"):
        $harga = 30000;
        break;
    case("Vinyl"):
        $harga = 40000;
        break;
    default:
        $harga = null;
        break;
}
$total_harga = $harga * $jml_beli;

if($jml_beli >= 5 && $jml_beli < 10) {
    $diskon = $total_harga * 5/100;
}elseif($jml_beli >= 10) {
    $diskon = $total_harga * 10/100;
}else{
    $diskon = 0;
}
    
$total_bayar = $total_harga - $diskon;

$result_totalHarga = mysqli_query($conn, "SELECT * FROM total_harga WHERE `id_penjualan` = '$id'");
if(mysqli_num_rows($result_totalHarga) > 0 && mysqli_num_rows($result_totalHarga) < 2) {
    // Jika sudah ada datanya
    $query = "UPDATE total_harga 
              SET `harga` = '$harga', `total_harga` = '$total_harga', `diskon` = '$diskon', `total_bayar` = '$total_bayar'
              WHERE `id_penjualan` = '$id'";
} else {
    // Jika belum ada datanya
    $query = "INSERT INTO total_harga (`id_penjualan`, `harga`, `total_harga`, `diskon`, `total_bayar`) 
              VALUES ('$id', '$harga', '$total_harga', '$diskon', '$total_bayar')";
}

$result_totalHarga = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <style>
        div{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        fieldset{
            display: inline-block;
        }

        table{
            border-top: 1px dashed black;
            border-collapse: collapse;
            width: 425px;
        }

        .topBorder{
            border-top: 1px dashed black;
        }

        .bottomBorder{
            border-bottom: 1px dashed black;
        }
    </style>
</head>
<body>
    <!-- HTML -->
    <div>
        <fieldset>
            <legend>Struk Transaksi</legend>
            <table>
                <tr>
                    <th colspan="4"><h3>Toko Cat Guna Bangun Jaya</h3></th>
                </tr>
            
                <tr>
                    <td colspan="" style="font-size: small;"><b>Nota Penjualan</b></td>
                    <td style="font-size: small; text-align:end;" colspan="2"><b>Tanggal Penjualan: <?php echo date("d-m-Y", strtotime($tgl_penjualan));?></b></td>
                </tr>

                <tr>
                    <td class="topBorder"><pre>Nama Customer</pre></td>
                    <td class="topBorder"><pre>:</pre></td>
                    <td class="topBorder" colspan="2"><pre><?php echo $nama_customer; ?></pre></td>
                </tr>

                <tr>
                    <td><pre>No HP</pre></td>
                    <td><pre>:</pre></td>
                    <td><pre><?php echo $no_hp; ?></pre></td>
                </tr>

                <tr>
                    <td><pre>Alamat</pre></td>
                    <td><pre>:</pre></td>
                    <td><pre><?php echo $alamat; ?></pre></td>
                </tr>

                <tr>
                    <td><pre>Jenis Cat</pre></td>
                    <td><pre>:</pre></td>
                    <td><pre><?php echo $jenis_cat; ?></pre></td>
                </tr>

                <tr>
                    <td><pre>Warna</pre></td>
                    <td><pre>:</pre></td>
                    <td><pre><?php echo $warna; ?></pre></td>
                </tr>
                
                <tr>
                    <td><pre>Harga</pre></td>
                    <td><pre>:</pre></td>
                    <td><pre><?php echo $harga; ?></pre></td>
                </tr>
                <tr>
                    <td><pre>Jumlah Beli</pre></td>
                    <td><pre>:</pre></td>
                    <td><pre><?php echo $jml_beli; ?> </pre></td>
                    <td rowspan="2" style="padding-bottom: 5px;"><pre>(*)</pre></td>
                </tr>

                <tr>
                    <td class="topBorder"><pre>Total Harga</pre></td>
                    <td class="topBorder"><pre>:</pre></td>
                    <td class="topBorder"><pre><?php echo "Rp. " . $total_harga; ?></pre></td>
                </tr>

                <tr>
                    <td><pre>Diskon</pre></td>
                    <td><pre>:</pre></td>
                    <td><pre><?php echo "Rp. " . $diskon; ?></pre></td>
                    <td class="bottomBorder" rowspan="2" style="padding-bottom: 21px;"><pre>(-)</pre></td>
                </tr>

                <tr>
                    <td class="topBorder bottomBorder"><pre>Total Bayar</pre></td>
                    <td class="topBorder bottomBorder"><pre>:</pre></td>
                    <td class="topBorder bottomBorder" style="padding: 10px;"><pre><?php echo "Rp. " . $total_bayar; ?></pre></td>
                </tr>
        
            </table>
            
        </fieldset>
    </div>
</body>
</html>