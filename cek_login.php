<?php
session_start();
require 'pengguna/fungsi_pengguna.php';
// $conn = mysqli_connect("localhost", "root", "", "kreditannew");

// var_dump($_POST["password"]);
// var_dump($_POST["no_telfon"]);
    $no_telfon=$_POST['no_telfon'];
    $password=md5($_POST["password"]);

    $reslut=mysqli_query($conn,"select * from pegawai where no_telfon='$no_telfon'");
    if (mysqli_num_rows($reslut)==1) {
        $row=mysqli_fetch_assoc($reslut);
        
    if ($row['password']===$password) {
        if ($row['akses']==="admin") {
           $_SESSION["id_pegawai"]=$row['kode_pegawai'];
    $_SESSION["hak_akses"]=$row['akses'];
    $_SESSION["username_pegawai"]=$row['username'];
    $_SESSION["berhasil_login"]="selamat anda berhasil login";
   
        header("Location:index.php");  
        }else {
            $_SESSION['akses_salah'] = '<div class="alert alert-danger" role="alert">maaf hanya admin yang boleh mengakses web ini.</div>';
        
            header("Location: awal.php"); 
        }
   
       
        
    }else {
        $_SESSION['password_salah'] = '<div class="alert alert-danger" role="alert">password salah.</div>';
      
        header("Location: awal.php"); 
    }
    
    }else {
        $_SESSION['no_telfon_tidak_valid'] = '<div class="alert alert-danger" role="alert">No telfon tidak valid.</div>';
        
        header("Location: awal.php");
    }
