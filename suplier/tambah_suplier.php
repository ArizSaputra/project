
<?php
session_start();
if (!isset($_SESSION['id_pegawai'])) {
    header("Location:../awal.php");
    exit;
 }
if (isset($_POST["tambah"])) {
    require '../suplier/fungsi_suplier.php';

    // Panggil fungsi tambah_data
    
   
if (tambah_data($_POST)>0) {

    $_SESSION['berhasil_tambah'] = '<div class="alert alert-success" role="alert">Data berhasil di tambah.</div>';
                
    header("Location:../suplier/data_suplier.php");
}else {
    $_SESSION['gagal_tambah'] = '<div class="alert alert-danger" role="alert">Data gagal di tambah.</div>';
        
    header("Location:../suplier/tambah_suplier.php");

}

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
                        <a class="nav-link" href="../laporan/tahap_awal.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag"></i></div>
                            Laporan Pembelian
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">syahroni pride</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Tambah Pelanggan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Pastikan Check Kembali Form</li>
                    </ol>
<?php

if (isset($_SESSION['gagal_tambah'])) {
    echo $_SESSION['gagal_tambah'];

    unset($_SESSION['gagal_tambah']); // Hapus session setelah digunakan agar pesan tidak muncul lagi
}
// if (isset($_SESSION['email'])) {
//     echo $_SESSION['email'];
//     unset($_SESSION['email']); // Hapus session setelah digunakan agar pesan tidak muncul lagi
// }

?>

                  
                    <a  class="btn btn-outline-danger mb-4" href="../suplier/data_suplier.php" >Kembali</a> 
                    
                    <form action=""method="post">

  <div class="form-group">

    <input type="text" class="form-control" id="nama"name="nama_suplier" placeholder="Masukkan nama Pengguna"required>
    </div>
  <div class="form-group">

  <textarea class="form-control" name="alamat" rows="4" cols="50"placeholder="alamat"></textarea>
    


  </div>
  <div class="form-group">
    <input type="number" class="form-control" id="no-telfon"name="no_telfon" placeholder ="Masukkan no telfon"required>
    <small id="nomor-telepon-help" class="form-text text-danger"></small>

  </div>
  <div class="form-group">
      
        <select class="form-control" id="jenis kelamin"name="jenis_kelamin">
            <option value="">pilih jenis kelamin</option>
            <option value="pria">Pria</option>
            <option value="wanita">Wanita</option>
 
        </select>
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


