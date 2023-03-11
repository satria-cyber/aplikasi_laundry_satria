<!DOCTYPE html>
<html lang="en">
<head>
  <style> 

.link, 
.link:link,
.link:active,
.link:visited{
    padding : 6px 15px;
    height : 4px ;
    margin-left : 11px;
    margin-right : 5px;
    margin-bottom : 15px;
    border-radius : 4px ;
    color : white;
    background-color : #34df04;
    text-decoration : none;
    font-family : Arial,Helvetica, sans-serif ;
}

.form {
    width : 700px;
    text-align: center;
    background : #cbc8e2 ;
    margin : 80px auto ;
    padding : 30px 20px ;
    box-sizing : border-box ;
    border : 1px solid black ;
    border-radius : 16px ;
    font-family : Arial,Helvetica, sans-serif ;
</style>
<?php
$title = 'Pembayaran';
require 'koneksi.php';
require 'navigasi.php';

$query = mysqli_query($conn, "SELECT transaksi.*, pelanggan.nama_pelanggan, detail_transaksi.total_harga, detail_transaksi.total_bayar FROM transaksi INNER JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN detail_transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi WHERE transaksi.id_transaksi = " . $_GET['id']);
$data = mysqli_fetch_assoc($query);

?>
                                        <div class="form">                      
                                        <br>
                                        <h4>Pesanan Atas Nama</h4>
                                        <h2><strong> <?= $data['nama_pelanggan'] ?></strong></h2>
                                        <h4> Berhasil Di Bayar</h4>
                                        <h3><strong>Kode Invoice <?= $data['kode_invoice'] ?></strong><br><br></h3>
                                        <h3><strong>Total Pembayaran <?= 'Rp ' . number_format($data['total_harga']); ?></strong><br></h3>
                                        <h3><strong>Total Uang Bayar <?= 'Rp ' . number_format($data['total_bayar']); ?></strong><br></h3>
                                        <h3><strong>Kembalian <?= 'Rp ' . number_format($data['total_bayar'] - $data['total_harga']); ?></strong><br><br></h3>
                                        <a href="transaksi.php" class="link">Kembali Ke Menu Utama</a>
                                    </div>
                                </div>