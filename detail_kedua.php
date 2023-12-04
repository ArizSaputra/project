



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Verifikasi Pemesanan</title>
<link rel="stylesheet" href="../dist/css/styles.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Kreditan   </a>
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
                    <a class="dropdown-item" href="../awal.php">Logout</a>
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
                <h1 class="mt-4">Detail Laporan Pendapatan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Daftar Pendapatan</li>
                    </ol>
                    <a  class="btn btn-outline-danger mb-4" href="../laporan/tahap_kedua.php" >Kembali</a> 
                   
             <table class="table table-bordered">

                    <?php
                    require '../laporan/fungsi_laporan.php';
                    $bulan_pendapatan = $_GET['bulan_pendapatan'];
                     global $conn;
                        $barang = query("SELECT
                        DATE_FORMAT(riwayat_angsuran.tgl_bayar, '%M') AS bulan_pendapatan,
                        pelanggan.nama_pelanggan,
                        riwayat_angsuran.jumlah_bayar,
                        riwayat_angsuran.denda
                    FROM
                        riwayat_angsuran
                    JOIN
                        pelanggan ON riwayat_angsuran.no_ktp=pelanggan.no_ktp
                    WHERE
                        DATE_FORMAT(riwayat_angsuran.tgl_bayar, '%M %Y') = '$bulan_pendapatan'
                    GROUP BY
                        riwayat_angsuran.id_riwayat;
                    ");
                    
                    ?>
               
                        <thead class="text-center">
                            <tr>
                            <td>Nomor</td>
                                <td>Nama Pelanggan</td>
                                
                                <td>Jumlah Bayar</td>
                                <td>Denda</td>
                               

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($barang as $brg) :?>
                            

                                <tr>
                                    <th scope="row" class="text-center"><?= $no++; ?></th>
                                    <td class="text-center"><?= $brg["nama_pelanggan"]; ?></td>
                                    <td class="text-center"><?= $brg["jumlah_bayar"]; ?></td>
                                    <td class="text-center"><?= $brg["denda"]; ?></td>
                                 
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