<?php

$conn = mysqli_connect("localhost", "root", "", "angsur_database");
if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi Berhasil";
}


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

function tambah_data($data)
{
    global $conn;
    $email =  htmlspecialchars($data["email"]);
    $nama =  htmlspecialchars($data["nama"]);
    $username =  htmlspecialchars($data["username"]);
    $password = md5($data["password"]);
    $no_telfon =  htmlspecialchars($data["no_telfon"]);
    $akses =  htmlspecialchars($data["akses"]);
    $gambar = upload();

    if (!$gambar) {
        return false;
    }

 
    $query_cek = "SELECT * FROM pegawai WHERE username = '$username'";
    $query_cek2 = "SELECT * FROM pegawai WHERE email = '$email'";
  


    $result = mysqli_query($conn, $query_cek);
    $result2 = mysqli_query($conn, $query_cek2);
    if (mysqli_num_rows($result) > 0) {
        // Jika nama jenis sudah ada, atur session alert Bootstrap
        session_start();
        $_SESSION['username_terdaftar'] = '<div class="alert alert-danger" role="alert">username  sudah ada dalam database.</div>';
        header("Location:../pengguna/tambah_pengguna.php");
     
       
       
        
    }elseif (mysqli_num_rows($result2) > 0) {
        # code...
        session_start(); 
        $_SESSION['email'] = '<div class="alert alert-danger" role="alert"> email sudah terdaftar sudah ada dalam database.</div>';
    
        header("Location:../pengguna/tambah_pengguna.php");
     
        
    }else {
        # code...
    
     
        // Jika nama jenis belum ada, lakukan penambahan data
        $query = "INSERT INTO pegawai VALUES ('1', '$nama','$email','$username','$password','$no_telfon','$gambar','$akses')";
        mysqli_query($conn, $query);
        // Atur session alert Bootstrap untuk sukses
        session_start();
        $_SESSION['berhasil_tambah'] = '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.</div>';
        
        header("Location:../pengguna/pengguna.php");
        
        
    }

    
  
}
function hapus_pengguna($id_pegawai)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pegawai WHERE kode_pegawai=$id_pegawai");
    return mysqli_affected_rows($conn);
}
function ubah_pengguna($data)
{
    global $conn;

    $id_pegawai =  $data["kode_pegawai"];
    $email =  htmlspecialchars($data["email"]);
    $nama =  htmlspecialchars($data["nama"]);
    $username =  htmlspecialchars($data["username"]);
    // $password = mysqli_real_escape_string($conn, $data["password"]);
    $no_telfon =  htmlspecialchars($data["no_telfon"]);
    $akses =  htmlspecialchars($data["akses"]);
    $query = "UPDATE pegawai SET nama='$nama',email='$email',username='$username',no_telfon='$no_telfon',akses='$akses' WHERE kode_pegawai='$id_pegawai'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn); 
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
    move_uploaded_file($tmpName, '../images/' . $nameFileBaru);

    return $nameFileBaru;
}
    
