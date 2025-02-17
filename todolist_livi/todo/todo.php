<?php
include('config.php');
$hasil= mysqli_query($mysqli,"select * from tbtodo;");
if (isset($_POST['cari'])){
  $cari=$_POST['cari'];
  $sql=" SELECT * FROM tbtodo WHERE tugas LIKE '%$cari%'";
}else{
  $sql=" SELECT * FROM tbtodo LIMIT 0,5;";
}

if (isset($_GET['start'])){
  $star= $_GET['star'];
  $sql=" SELECT * FROM tbtodo $start,5;";
}

$hasil= mysqli_query($mysqli,$sql);
$sql2= "SELECT * FROM tbtodo";
$hasil2= mysqli_query($mysqli,$sql2);
$jlhdata=mysqli_num_rows($hasil2);
echo $jlhdata;
$perulangan= $jlhdata/5;


?>
<?php
  if (isset($_GET['pesan_tambah'])) {
    ?>
        <div class="alert alert-<?php echo $_GET['pesan_tambah']=='berhasil'?'success':'danger' ;?> alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['pesan_tambah']=='berhasil'?'Berhasil':'Gagal' ;?> ditambah!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
  }
  if (isset($_GET['pesan_edit'])) {
    ?>
        <div class="alert alert-<?php echo $_GET['pesan_edit']=='berhasil'?'warning':'danger' ;?> alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['pesan_edit']=='berhasil'?'Berhasil':'Gagal' ;?> diedit!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
  }
  if (isset($_GET['pesan_hapus'])) {
    ?>
        <div class="alert alert-<?php echo $_GET['pesan_hapus']=='berhasil'?'warning':'danger' ;?> alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['pesan_hapus']=='berhasil'?'Berhasil':'Gagal' ;?> dihapus!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
  }
  if (isset($_GET['login'])) {
    ?>
        <div class="alert alert-<?php echo $_GET['login']=='berhasil'?'warning':'danger' ;?> alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['login']=='berhasil'?'Berhasil':'Gagal' ;?> dihapus!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
  }
?>
<!-- Font Link w3scholl -->
 <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function updatestatus(id, checkbox) {
      var status = checkbox.checked ? "Selesai" : "Belum Selesai";

      $.ajax({
        url: 'todo/update_status.php',
        type: 'POST',
        data: {id: id, keterangan: status},
        success: function(response){
          if (response.trim() === "success"){
            document.getElementById('status-' + id).innerText = status;
          }else{
            alert('Gagal memperbarui status!');
            checkbox.checked = !checkbox.checked;
          }
        },
        error: function(){
          alert('Terjadi kesalahan, coba lagi!');
          checkbox.checked = !checkbox.checked;
        }
      });
    }
    </script>
</head>
 
<!--Button trigger modal -->
<button style="float: right;" class="btn btn-primary mb-2" type="button" data-bs-toggle="modal" 
data-bs-target="#exampleModal"> 
  <i class="fa fa-plus">  Tambah</i></button> 
  <br>
  <br>
  <form action="index.php?halaman=todo" method="POST">
  <div class="row d-flex justify-content-end mb-2">
    <div class="col-2">
      <input type="text" name="cari" class="col-12">
    </div>
    <div class="col-1 ">
      <button type="submit" class="col-10">
        Cari
</button>

    </div>
  </div>
</form>
<!--Button trigger modal -->

<!--Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-body" id="exampleModalLabel">Tugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form method="POST" action="todo/aksi_tambah_todo.php"> 
  <div class="modal-body">     
    <div class="mb-3">
      <label class="form-label text-body">Tugas</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="tugas" name="tugas" required>
          </div>
          <div class="mb-3">
            <label class="form-label text-body">Jangka Waktu</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="jangkawaktu" name="jangkawaktu" required>
          </div>
          <div class="mb-3">
            <combo label class="form-label text-body">Keterangan</label>
            <select class="form-control" name="keterangan">
              <option>Selesai</option>
              <option>Belum Selesai</option>
            </select>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
</form>
    </div>
  </div>
</div>
<!--Modal -->

</body>
<table border="1" class="table-hover-bg table table-bordered text-center teks-putih" style="background-color:#20c997">
        <tr class="table-active fw-bolder text-center">
        
        <td>No</td><td>Tugas</td><td>Jangka Waktu</td><td>Keterangan</td><td>Aksi</td>
        </tr></div>
        
        <?php
        $no=1;
        if(mysqli_num_rows(result: $hasil)> 0)
        while ($row = mysqli_fetch_array(result: $hasil)) {
          
        echo "<tr>
          <td>$no</td>
          <td>$row[tugas]</td>
          <td>$row[jangkawaktu]</td>
          <td>
          <input type='checkbox' onclick='updatestatus($row[id], this)'" . ($row['keterangan'] == 'Selesai' ? 'checked' : '').">
          <span id='status-$row[id]'>$row[keterangan]</span>
          </td>
          <td>
          <a class='btn btn-warning fa fa-pencil' href='index.php?halaman=edit_todo&id=$row[id]'> Edit </a>"; ?>
          <a class='btn btn-danger fa fa-trash' href='todo/aksi_hapus_todo.php?id=<?=$row['id']?>' onclick="return confirm('are you sure?')">  Hapus </a></td>
        </td>
          <?php
        echo 
        "</tr>";
        $no++;
        }else{
          echo "<tr><td colspan='5' class='text-center'>Data Tidak Ditemukan.</td></tr>";
        }
        ?>
    </table>
    
    <?php if (isset($_POST['cari']) && !empty(trim($_POST['cari']))) { ?>
    <div class="d-flex justify-content-right mb-2">
      <a href="index.php?halaman=todo" class="btn btn-primary border-light px-3 bg-warning">
        <i class="fa fa-arrow-left">Kembali Ke List Tugas</i>
    </a>
    </div>
    <?php } ?>
    
    <div class="d-flex justify-content-end">
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <?php
    $page=0;
     for ($i=0; $i <$perulangan; $i++) {
      ?>

<li class="page-item"><a class="page-link" href="index.php?halaman=todo&star=<?=$page?>"><?=$i+1?></a></li>

<?php
$page+=5;
     }
    ?>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>