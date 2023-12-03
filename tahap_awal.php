<?php 
  session_start();
  if (!isset($_SESSION['id_pegawai'])) {
    header("Location:../awal.php");
    exit;
    
 }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Laporan Pembelian</title>
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
                    <h1 class="mt-4">Laporan Pengeluaran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Transaksi Pembelian Barang</li>
                    </ol>
                  

              <table class="table table-bordered">


                    <?php
                    require '../laporan/fungsi_laporan.php';
                     global $conn;
                        $pengguna = query("SELECT DATE_FORMAT(pembelian.tgl_pembelian, '%M %Y') AS bulan_pembelian, COUNT(pembelian.kode_pembelian) AS jumlah_pembelian, SUM(barang.harga_jual) AS total_harga_jual FROM pembelian JOIN barang ON barang.kode_barang = pembelian.kode_barang WHERE pembelian.tgl_pembelian  GROUP BY bulan_pembelian;");
                    
                    ?>
           
                        <thead class="text-center">
                            <tr>
                                <td>Nomor</td>
                                <td>Bulan Pengeluaran</td>
                                <td>Total Transaksi Pengeluaran</td>
                                <td>Total Harga Pengeluaran</td>
                                <td>Aksi</td>
                              
                            
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($pengguna as $pgn) :?>
                            
                                <tr>
                                    <th scope="row" class="text-center"><?= $no++; ?></th>
                                    <td class="text-center"><?= $pgn["bulan_pembelian"]; ?></td>
                                    <td class="text-center"><?= $pgn["jumlah_pembelian"]; ?></td>
                                    <td class="text-center"><?= $pgn["total_harga_jual"]; ?></td>
                                    <td class="text-center">
                                        
                                        <a class="btn btn-primary" href="../laporan/detail_laporan.php?bulan_pembelian=<?= $pgn["bulan_pembelian"]; ?>" role="button"><i class="fas fa-eye"></i></i>Detail</a>|
                                    </td>
                                </tr>

                        </tbody>
                    <?php endforeach; ?>
                    </table>


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
    <!-- <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">tambah jenis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="nama_jenis">Masukkan jenis barang baru</label>
                            <input type="text" class="form-control" id="nama_jenis" name="nama_jenis">

                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="tambah">simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div> -->

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