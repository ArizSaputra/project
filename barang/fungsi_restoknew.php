<?php
$conn = mysqli_connect("localhost", "root", "", "angsur_database");


function query($query)
{
    global $conn;
 
    $result = mysqli_query($conn, $query);
    if ($result === false) {
        // Handle the error here
        return [];
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    $nameFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];



    // cek apakah data berhasil di tambahkan atau belum
    if ($error === 4) {
        echo "<script>
 alert ('silahkan pilih gambar terlebih dahulu!' );
</script>";

        return false;
    }

    // cek apakah  yang di upload itu gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
 alert ('silahkan pilih gambar terlebih dahulu!' );
</script>";
        return false;
    }
    // cek ukuran file yang di upload
    if ($ukuranFile > 1000000) {
        echo "<script>
 alert ('ukuran gambar terlalu besar' );
</script>";
        return false;
    }




    // lolos pengecekan ,gambar siapmdi upload
    // generate nama gambar baru

    $nameFileBaru = uniqid();
    $nameFileBaru .= '.';
    $nameFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../upload/' . $nameFileBaru);

    return $nameFileBaru;
}
// function tambah_data($data)
// {
//     global $conn;
    
//     $nama_barang = htmlspecialchars($data["nama_barang"]);
//     $harga_jual = htmlspecialchars($data["harga_jual"]);
//     $harga_jual_fix = preg_replace("/[^0-9]/", "", $harga_jual);
//     $harga_beli = htmlspecialchars($data["harga_beli"]);
//     $harga_beli_fix = preg_replace("/[^0-9]/", "", $harga_beli);
//     $tanggal_input = htmlspecialchars($data["tanggal_exp"]);

// // Mengonversi tanggal ke format 'YYYY-MM-DD'
// $tanggal_exp = date('Y-m-d', strtotime($tanggal_input));
  
   
//     $id_jenis = htmlspecialchars($data["id_jenis"]);
//     $gambar = upload();

//     if (!$gambar) {
//         return false;
//     }
//     $query = "INSERT INTO barang (nama_barang,harga_jual,harga_beli,id_jenis,tanggal_exp,gambar)
//     VALUES
//     ('$nama_barang','$harga_jual_fix','$harga_beli_fix','$id_jenis','$tanggal_exp','$gambar')";
//         mysqli_query($conn, $query);
    
//         return mysqli_affected_rows($conn);
//     }


    
  

    function hapus_barang($kode_angsuran)
    {
        global $conn;
    
        // Dapatkan nama file gambar yang terkait dengan data yang akan dihapus
        // $query = "SELECT gambar FROM barang WHERE id_barang = $id_barang";
        // $result = mysqli_query($conn, $query);
    
        // if ($result && mysqli_num_rows($result) > 0) {
        //     $row = mysqli_fetch_assoc($result);
        //     $namaGambar = $row['gambar'];
    
        //     // Hapus file gambar dari sistem file
        //     $pathToGambar = '../upload/' . $namaGambar;
        //     if (file_exists($pathToGambar)) {
        //         unlink($pathToGambar);
        //     }
    
            // Hapus data dari tabel "barang" dalam database
            $query = "DELETE FROM angsuran WHERE kode_angsuran = $kode_angsuran";
            mysqli_query($conn, $query);
    
            if (mysqli_affected_rows($conn) > 0) {
                return true; // Data dan gambar berhasil dihapus
            } else {
                return false; // Gagal menghapus data dari database
            }
        } 
    
    
function ubah_barang($data)
{
    global $conn;
   
    $kode_angsuran=$data['kode_angsuran'];
    $kode_barang = htmlspecialchars($data["kode_barang"]);
    $status = htmlspecialchars($data["status"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    
    
    $tgl_pembelian = htmlspecialchars($data["tgl_pembelian"]);
    $nama_toko = htmlspecialchars($data["nama_toko"]);
    $alamat_toko = htmlspecialchars($data["alamat_toko"]);
    $total_angsuran = htmlspecialchars($data["total_angsuran"]);
    $sisa_angsuran = htmlspecialchars($data["sisa_angsuran"]);
    $jumlah_dp = htmlspecialchars($data["jumlah_dp"]);

    $angsuran_perbulan = htmlspecialchars($data["angsuran_perbulan"]);


    $query = "UPDATE angsuran SET
    kode_barang = '$kode_barang',
    nama_barang = '$nama_barang',
    status = 'aktif'
    WHERE kode_angsuran= '$kode_angsuran'
    ";

    
    $query1 = "INSERT INTO pembelian (kode_barang,tgl_pembelian,nama_toko,alamat_toko)
    VALUES
    ('$kode_barang','$tgl_pembelian','$nama_toko','$alamat_toko')";

$query2 = "UPDATE detail_angsuran SET
total_angsuran = '$total_angsuran',
sisa_angsuran = '$sisa_angsuran',
angsuran_perbulan ='$angsuran_perbulan'

WHERE kode_angsuran= '$kode_angsuran'
";
   
    


    mysqli_query($conn, $query);
    
    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);



    return mysqli_affected_rows($conn);

  

 
}
