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
 function tampil_data()  {
          global $conn;
                 $result=query("select * from pelanggan"); 
                 return $result;
}
function tambah_data($data)
{
    global $conn;

    $nama_suplier=  htmlspecialchars($data["nama_suplier"]);
    $alamat =  htmlspecialchars($data["alamat"]);
 
    $jenis_kelamin =  htmlspecialchars($data["jenis_kelamin"]);
    $no_telfon =  htmlspecialchars($data["no_telfon"]);


  


 
 
        # code...
    
     
        // Jika nama jenis belum ada, lakukan penambahan data
        $query = "INSERT INTO suplier VALUES ('', '$nama_suplier','$alamat','$jenis_kelamin','$no_telfon')";
        mysqli_query($conn, $query);
        // Atur session alert Bootstrap untuk sukses
        return mysqli_affected_rows($conn);

        
        
    

    
  
}
function hapus_suplier($id_suplier)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM suplier WHERE id_suplier=$id_suplier");
    return mysqli_affected_rows($conn);
}
function ubah_suplier($data)
{
    global $conn;

    $nama_suplier=  htmlspecialchars($data["nama_suplier"]);
    $alamat =  htmlspecialchars($data["alamat"]);
    $id_suplier =  $data["id_suplier"];
 
    $jenis_kelamin =  htmlspecialchars($data["jenis_kelamin"]);
    $no_telfon =  htmlspecialchars($data["no_telfon"]);
    $query = "UPDATE suplier SET nama_suplier='$nama_suplier',alamat='$alamat',jenis_kelamin='$jenis_kelamin',no_telfon='$no_telfon' WHERE id_suplier=$id_suplier";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

  

 
}
