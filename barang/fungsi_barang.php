<?php
$conn = mysqli_connect("localhost", "root", "", "angsur_database");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row; // Perbaikan disini
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
function tambah_data($data)
{
    global $conn;
    
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga_jual = htmlspecialchars($data["harga_jual"]);
    $harga_jual_fix = preg_replace("/[^0-9]/", "", $harga_jual);
    $harga_beli = htmlspecialchars($data["harga_beli"]);
    $harga_beli_fix = preg_replace("/[^0-9]/", "", $harga_beli);
    $tanggal_input = htmlspecialchars($data["tanggal_exp"]);


  
   
    $id_jenis = htmlspecialchars($data["kode_jenis"]);
   
    $query = "INSERT INTO barang (kode_jenis,nama_barang,harga_jual,harga_beli)
    VALUES
    ('$id_jenis','$nama_barang','$harga_jual_fix','$harga_beli_fix')";
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }


    
  

    function hapus_barang($id_barang)
    {
        global $conn;
    
        // Dapatkan nama file gambar yang terkait dengan data yang akan dihapus
        $query = "SELECT gambar FROM barang WHERE kode_barang = $id_barang";
        $result = mysqli_query($conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $namaGambar = $row['gambar'];
    
            // Hapus file gambar dari sistem file
            $pathToGambar = '../upload/' . $namaGambar;
            if (file_exists($pathToGambar)) {
                unlink($pathToGambar);
            }
    
            // Hapus data dari tabel "barang" dalam database
            $query = "DELETE FROM barang WHERE kode_barang = $id_barang";
            mysqli_query($conn, $query);
    
            if (mysqli_affected_rows($conn) > 0) {
                return true; // Data dan gambar berhasil dihapus
            } else {
                return false; // Gagal menghapus data dari database
            }
        } else {
            return false; // Data tidak ditemukan
        }
    }
    
function ubah_barang($data)
{
    global $conn;
    $id_barang=$data["kode_barang"];
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga_jual = htmlspecialchars($data["harga_jual"]);
    $harga_jual_fix = preg_replace("/[^0-9]/", "", $harga_jual);
    $harga_beli = htmlspecialchars($data["harga_beli"]);
    $harga_beli_fix = preg_replace("/[^0-9]/", "", $harga_beli);
    

    // ...

// ...

    $query = "UPDATE barang SET
    nama_barang = '$nama_barang',
    harga_jual = '$harga_jual_fix',
    harga_beli = '$harga_beli_fix'
    WHERE kode_barang= '$id_barang'
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

  

 
}
