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
                    <h1 class="mt-4">Data Pegawai</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Pegawai yang Terdaftar</li>
                    </ol>
                    <?php
                                                if (isset($_SESSION['berhasil_tambah'])) {
                                                
                                echo $_SESSION['berhasil_tambah'];
                                unset($_SESSION['berhasil_tambah']);
                     } // Hapus session setelah digunakan agar pesan tidak muncul lagi
                    if (isset($_SESSION['berhasil_hapus'])) {
                      
    echo $_SESSION['berhasil_hapus'];
    unset($_SESSION['berhasil_hapus']);
                     } 
                     // Hapus session setelah digunakan agar pesan tidak muncul lagi
                    if (isset($_SESSION['gagal_hapus'])) {
                       echo $_SESSION['gagal_hapus'];
                        unset($_SESSION['gagal_hapus']);
                     } // Hapus session setelah digunakan agar pesan tidak muncul lagi
                    if (isset($_SESSION['berhasil_ubah'])) {
                      
    echo $_SESSION['berhasil_ubah'];
    unset($_SESSION['berhasil_ubah']);
                     } // Hapus session setelah digunakan agar pesan tidak muncul lagi
?>
                    <a  class="btn btn-outline-primary" href="../pengguna/tambah_pengguna.php" >Tambah Data Pegawai</a> 
                    <table class="table table-bordered">


                    <?php
                    require '../pengguna/fungsi_pengguna.php';
                     global $conn;
                        $pengguna = query("select * from pegawai");
                    
                    ?>
           
                        <thead class="text-center">
                            <tr>
                                <td>No</td>
                                <td>Foto Pegawai</td>
                                <td>Nama</td>
                                <td>email</td>
                                <td>username</td>
                                <td>password</td>
                                <td>no telfon</td>
                                <td>hak akses</td>
                                <td>aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($pengguna as $pgn) :?>
                            
                                <tr>
                                    <th scope="row" class="text-center"><?= $no++; ?></th>
                                    <td>
                                                <?php
                                                if (!empty($pgn["foto_pegawai"])) {
                                                    $gambar_path = 'images/' . $pgn["foto_pegawai"]; // Sesuaikan dengan direktori tempat gambar disimpan
                                                    echo "<img src='$gambar_path' alt='' style='max-width: 100px; max-height: 100px;'>";
                                                } else {
                                                    echo "Tidak Ada Gambar";
                                                }
                                                ?>
                                            </td>
                                    <td class="text-center"><?= $pgn["nama"]; ?></td>
                                    <td class="text-center"><?= $pgn["email"]; ?></td>
                                    <td class="text-center"><?= $pgn["username"]; ?></td>
                                    <td class="text-center"><?= $pgn["password"]; ?></td>
                                    <td class="text-center"><?= $pgn["no_telfon"]; ?></td>
                                    <td class="text-center"><?= $pgn["akses"]; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" href="../pengguna/hapus_pengguna.php?kode_pegawai=<?=$pgn["kode_pegawai"]; ?>" onclick="return confirm('apakah anda yakin')" role="button"><i class="fas fa-trash">
                                                </i>hapus</a>|
                                        <a class="btn btn-warning" href="../pengguna/edit_pengguna.php?kode_pegawai=<?= $pgn["kode_pegawai"]; ?>" role="button"><i class="fas fa-edit"></i>edit</a>|
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