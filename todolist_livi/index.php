<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-success-subtle">
      <div class="container-fluid">
        <a class="navbar-brand teks-putih" href="#">TO DO LIST</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active teks-putih" aria-current="page" href="index.php?halaman=home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link teks-putih" href="index.php?halaman=todo">To Do</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true"></a>
            </li>
          </ul>
          <form class="d-flex" role="Login">
            <button class="btn btn-outline-success" type="submit">Login</button>
          </form>
        </div>
      </div>
    </nav>
    <!--Navbar-->
    <!--Content-->
    <div  class="container-fluid">
      <div class="row d-flex justify-content-center mt-3" style="min-height: 400px;">
        <div class="col-md-10 bg-success-subtle p-4 ">
           <?php
           $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 'home';
            if ($halaman =='home') {
              include "home/home.php";
            }
            else if ($halaman=='todo') {
              include "todo/todo.php";
            }
            else if ($halaman=='edit_todo') {
              include "todo/edit_todo.php";
            } 
            ?>
        </div>
      </div>
    </div>
    <!--Content-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(".alert").delat(1000).slideUp(200, function() {
        $(this).alert('close');
      })
      </script>
  </body>
</html>