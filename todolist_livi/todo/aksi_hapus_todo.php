<?php
include "../config.php";
$id = preg_replace('/[^0-9]/', '', $_GET['id']);
$sql ="DELETE FROM tbtodo WHERE id='$_GET[id]'";
 //echo $sql;
mysqli_query($mysqli,$sql);
$r=mysqli_affected_rows($mysqli);
if ($r > 0) {
    header("location:http:/todolist_livi/index.php?halaman=todo&pesan_hapus=berhasil");
}else{
    header("location:http:/todolist_livi/index.php?halaman=todo&pesan_hapus=gagal");
}
?>
