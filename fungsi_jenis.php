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
function tambah_data($data)
{
    global $conn;
    $nama_jeniss =  htmlspecialchars($data["jenis_barang"]);
    $query = "INSERT INTO jenis_barang  VALUES ('', '$nama_jeniss')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus_jenis($id_jenis)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM jenis_barang WHERE kode_jenis=$id_jenis");
    return mysqli_affected_rows($conn);
}
function ubah_jenis($data)
{
    global $conn;

    $nama_jeniss = htmlspecialchars($data["jenis_barang"]);
    $id_jenis = $data["id_jenis"];

    $query = "UPDATE jenis_barang SET jenis_barang='$nama_jeniss' WHERE kode_jenis=$id_jenis";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
