<?php
include "../config.php";
$tugas=$_POST['tugas'];
$jangkawaktu=$_POST['jangkawaktu'];
$keterangan=$_POST['keterangan'];
$sql=" insert into tbtodo (tugas,jangkawaktu,keterangan) values ('$tugas','$jangkawaktu','$keterangan')";
//echo $sql;
mysqli_query($mysqli,$sql);
$r=mysqli_affected_rows($mysqli);
if ($r > 0) {
    header("location:http:/todolist_livi/index.php?halaman=todo&pesan_tambah=berhasil");
}else{
    header("location:http:/todolist_livi/index.php?halaman=todo&pesan_tambah=gagal");
}
?>