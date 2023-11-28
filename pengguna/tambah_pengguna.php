<?php
session_start();
if (!isset($_SESSION['id_pegawai'])) {
    header("Location:../awal.php");
    exit;
 }
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_POST["tambah"])) {
    require '../pengguna/fungsi_pengguna.php';

    // Panggil fungsi tambah_data
    tambah_data($_POST);
   


}?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>pengguna</title>
<link rel="stylesheet" href="../dist/css/styles.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Kreditan</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <!-- Navbar-->
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">data </div>
                        <a class="nav-link" href="../jenis_barang.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Jenis Barang
                        </a>
                        <a class="nav-link" href="../pengguna/pengguna.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></i></div>
                            Data Pegawai
                        </a>

                        <a class="nav-link " href="../suplier/data_suplier.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Data Pelanggan
                        </a>
                        <a class="nav-link" href="../barang/data_barang.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag"></i></div>
                            Data Barang
                        </a>
                        <div class="sb-sidenav-menu-heading">Transaksi</div>
                        <a class="nav-link" href="../Restok/tahap_awal.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag"></i></div>
                            Verifikasi Pemesanan
                        </a>
                        <a class="nav-link" href="../pembelian/tahap_awal.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag"></i></div>
                            Pembelian
                        </a>
                        <div class="sb-sidenav-menu-heading">Laporan</div>
                        <a class="nav-link" href="../laporan/tahap_kedua.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag"></i></div>
                            Laporan Pendapatan
                        </a>
                        <a class="nav-link" href="../laporan/tahap_awal.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag"></i></div>
                            Laporan Pengeluaran
                        </a>
                        <a class="nav-link" href="../laporan/angsuran.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag"></i></div>
                            Angsuran
                        </a>

                    </div>
                </div>
                
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Tambah Pengguna</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Pastikan Check Kembali Form</li>
                    </ol>
<?php

if (isset($_SESSION['username_terdaftar'])) {
    echo $_SESSION['username_terdaftar'];
    var_dump($_SESSION['username_terdaftar']);
    unset($_SESSION['username_terdaftar']); // Hapus session setelah digunakan agar pesan tidak muncul lagi
}
if (isset($_SESSION['email'])) {
    echo $_SESSION['email'];
    unset($_SESSION['email']); // Hapus session setelah digunakan agar pesan tidak muncul lagi
}

?>

                  
                    <a  class="btn btn-outline-danger mb-4" href="../pengguna/pengguna.php" >Kembali</a> 
                    
                    <form action=""method="post">
  <div class="form-group">

    <input type="email" class="form-control" id="nama"name="email" placeholder="Masukkan email"required>
    </div>
  <div class="form-group">
  <div class="form-group">

    <input type="text" class="form-control" id="nama"name="nama" placeholder="Masukkan nama Pengguna"required>
    </div>
  <div class="form-group">

    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username Pengguna"required >
    </div>
  <div class="form-group">
    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"required>
    <div class="input-group-append">
           
        </div>

  </div>
  <div class="form-group">
    <input type="number" class="form-control" id="no-telfon"name="no_telfon" placeholder ="Masukkan no telfon"required>
    <small id="nomor-telepon-help" class="form-text text-danger"></small>

  </div>
  <div class="form-group">
      
        <select class="form-control" id="hak akses"name="akses">
            <option value="">Pilih hak akses</option>
            <option value="admin">Admin</option>
            <option value="pegawai">Pegawai</option>
 
        </select>
    </div>
    <div class="form-group">
    <label for="gambar">Gambar</label>
    <input type="file" class="form-control-file" id="gambar" name="gambar" onchange="previewImage(this);">
    <img id="gambar-preview" src="#" alt="Gambar Pratinjau" style="max-width: 100%; display: none;">
      </div>
  


  <button type="submit"name="tambah" class="btn btn-primary">Submit</button>
</form>

                
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script>
const nomorTeleponInput = document.getElementById("no-telfon");
    const nomorTeleponHelp = document.getElementById("nomor-telepon-help");

    nomorTeleponInput.addEventListener("input", function () {
        if (this.value.length > 13) {
            this.value = this.value.slice(0, 13); // Menghapus karakter lebih dari 13
            nomorTeleponHelp.textContent = "Panjang nomor telepon tidak boleh lebih dari 13 karakter.";
        } else {
            nomorTeleponHelp.textContent = ""; // Menghapus notifikasi jika panjang karakter valid
        }
    });
</script>
<script>
    function previewImage(input) {
        var preview = document.getElementById('gambar-preview');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Tampilkan gambar terpilih
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none'; // Sembunyikan gambar jika tidak ada file yang dipilih
        }
    }
    
 

    
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../dist/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../dist/assets/demo/chart-area-demo.js"></script>
    <script src="../dist/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../dist/assets/demo/datatables-demo.js"></script>
</body>

</html>