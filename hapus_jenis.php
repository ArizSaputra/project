<?php
require 'fungsi_jenis.php';
$id_jenis = $_GET["id_jenis"];

if (hapus_jenis($id_jenis) > 0) {
    echo "<script>
  alert('data berhasil di hapus');
  document.location.href='jenis_barang.php';
  </script>";
} else {
    echo "<script>
  alert('data gagal di hapus,kemungkinan data berkaitan dengan tabel barang');
  document.location.href='jenis_barang.php';
  </script>";
}
