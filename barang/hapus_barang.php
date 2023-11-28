<?php
require '../barang/fungsi_barang.php';
$id_barang = $_GET["kode_barang"];

if (hapus_barang($id_barang) > 0) {
    session_start();
    $_SESSION['berhasil_hapus'] = '<div class="alert alert-success" role="alert">Data berhasil di hapus.</div>';
    
    header("Location:../barang/data_barang.php");
} else {
    session_start();
    $_SESSION['gagal_hapus'] = '<div class="alert alert-danger" role="alert">Data gagal di hapus.</div>';
    
    header("Location:../barang/data_barang.php");
}
