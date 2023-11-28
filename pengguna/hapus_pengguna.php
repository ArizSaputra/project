<?php
  session_start();
require '../pengguna/fungsi_pengguna.php';
$id_pegawai = $_GET["id_pegawai"];

if (hapus_pengguna($id_pegawai) > 0) {
   
    $_SESSION['berhasil_hapus'] = '<div class="alert alert-success" role="alert">Data berhasil di hapus.</div>';
    
    header("Location:../pengguna/pengguna.php");
} else {
  
    $_SESSION['gagal_hapus'] = '<div class="alert alert-danger" role="alert">Data gagal di hapus.</div>';
    
    header("Location:../pengguna/pengguna.php");
}
