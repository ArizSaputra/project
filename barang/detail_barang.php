<?php 
  session_start();
  if (!isset($_SESSION['id_pegawai'])) {
    header("Location:../awal.php");
    exit;
 }
  require '../barang/fungsi_barang.php';
 
  global $conn;
  $id_barang = $_GET['kode_barang'];
     $barang = query("select barang.*,jenis_barang.jenis_barang,jenis_barang.kode_jenis FROM barang JOIN jenis_barang ON barang.kode_jenis=jenis_barang.kode_jenis where barang.kode_barang=$id_barang")[0];
  
    //  if (isset($_POST["ubah"])) { //cek apakah tombol tambah (dalam form bukan di halaman utama ) sudah di 
    //     //tekan atau belum
    
    //     if (ubah_barang($_POST) > 0) {
    //         $_SESSION['berhasil_ubah'] = '<div class="alert alert-success" role="alert">Data berhasil di ubah.</div>';
            
    //         header("Location:../barang/data_barang.php");
    //     } else {
    //         $_SESSION['gagal_ubah'] = '<div class="alert alert-danger" role="alert">Data gagal di ubah.</div>';
            
    //         header("Location:../barang/edit_pengguna.php");;
    //     }
    // } ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>barang</title>
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
                    <h1 class="mt-4">barang</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">barang</li>
                    </ol>
                    



                  
                    <a  class="btn btn-outline-danger mb-4" href="../barang/data_barang.php" >Kembali</a> 
                    
                    <form action=""method="post"enctype="multipart/form-data">
  <div class="form-group">
  <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
  <label for=""> nama barang:</label>  
    <input type="text" class="form-control" id="nama_barang"name="nama_barang" placeholder="Masukkan nama_barang"value="<?= $barang["nama_barang"]; ?>"readonly>
    </div>
  
  <div class="form-group">
  <label for=""> harga jual barang:</label>  
  <input type="text" class="form-control"name="harga_jual" id="harga_jual" oninput="formatCurrency(this)"placeholder="masukkan harga_jual"  value="<?= $barang["harga_jual"]; ?>"readonly>
     </div> 
    
   
  <div class="form-group">
  <label for=""> harga beli barang:</label>  
    <input type="text" class="form-control" id="harga_beli" name="harga_beli" oninput="formatCurrency(this)" placeholder="Masukkan harga beli"readonly value="<?= $barang["harga_beli"]; ?>" >

    </div>


  

  
  <div class="form-group">

     
  <label for=""> jenis barang:</label>
            
 
        <input type="text" class="form-control" id="jenis_barang"value="<?= $barang["nama_jenis"]; ?>"readonly>
    </div>
  <div class="form-group">

     

  <label for=""> stok barang:</label>  
 
        <input type="text" class="form-control" id="jenis_barang"value="<?= $barang["stok"]; ?>"readonly>
    </div>
 <div class="form-group">
            <label for="tanggal"> Tanggal expired:</label>
            <input type="date" class="form-control" id="tanggal"name="tanggal_exp" value="<?= $barang["tanggal_exp"]; ?>"readonly>
        </div>


        <div class="form-group">
    <label for="gambar">Gambar</label>
    <div class="card" style="width: 18rem;">
  <img src="../upload/<?= $barang["gambar"]; ?>" class="card-img-top" alt="...">
  <div class="card-body">
   
  </div>
</div>
      </div>
</form>



                </div>
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
  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../dist/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../dist/assets/demo/chart-area-demo.js"></script>
    <script src="../dist/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../dist/assets/demo/datatables-demo.js"></script>
    <script>
  
    
    
 

    
</script>

<script>
function formatCurrency(input) {//fungsi membuat titik ketika mencapai ribuan dalam input
    // Hapus tanda titik atau koma jika ada
    let valueWithoutCommas = input.value.replace(/[,.]/g, '');

    // Format angka dengan tanda titik sebagai pemisah ribuan
    let formattedValue = new Intl.NumberFormat('id-ID').format(valueWithoutCommas);

    // Tampilkan nilai yang diformat pada input
    input.value = formattedValue;
}

var harga_jual = document.getElementById("harga_jual");
var harga_beli = document.getElementById("harga_beli");

// Fungsi untuk memisahkan ribuan dalam nilai input teks
function formatRibuan(input) {
    return input.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Tambahkan event listener untuk memformat nilai saat halaman dimuat
harga_jual.value = formatRibuan(harga_jual.value);
harga_beli.value = formatRibuan(harga_beli.value);

// Tambahkan event listener untuk memformat nilai saat pengguna mengetik
harga_jual.addEventListener("input", function () {
    harga_jual.value = formatRibuan(harga_jual.value.replace(/,/g, ""));
});
harga_beli.addEventListener("input", function () {
    harga_beli.value = formatRibuan(harga_beli.value.replace(/,/g, ""));
});
</script>
</body>

</html>