<?php
require '../suplier/fungsi_suplier.php';
$id_suplier = $_GET["id_suplier"];

if (hapus_suplier($id_suplier) > 0) {
    session_start();
    $_SESSION['berhasil_hapus'] = '<div class="alert alert-success" role="alert">Data berhasil di hapus.</div>';
    
    header("Location:../suplier/data_suplier.php");
} else {
    session_start();
    $_SESSION['gagal_hapus'] = '<div class="alert alert-danger" role="alert">Data gagal di hapus.</div>';
    
    header("Location:../suplier/data_suplier.php");
}
