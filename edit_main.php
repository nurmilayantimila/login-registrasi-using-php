<?php 
    session_start();
    include('server.php'); 

    if (isset($_GET['id'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $id = ($_GET["id"]);
    
        // menampilkan data dari database yang mempunyai id=$id
        $query = "SELECT * FROM user WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        // jika data gagal diambil maka akan tampil error berikut
        if(!$result){
          die ("Query Error: ".mysqli_errno($conn).
             " - ".mysqli_error($conn));
        }
        // mengambil data dari database
        $data = mysqli_fetch_assoc($result);
          // apabila data tidak ada pada database maka akan dijalankan perintah ini
           if (!count($data)) {
              echo "<script>alert('Data tidak ditemukan pada database');window.location='view.php';</script>";
           }
      } else {
        // apabila tidak ada data GET id pada akan di redirect ke index.php
        echo "<script>alert('Masukkan data id.');window.location='edit_main.php';</script>";
      }         
      ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/logoo.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <!-- <img src="assets/images/logo.svg" alt="logo" class="logo"> -->
              </div>
              <p class="login-card-description">Edit User</p>

    <form action="proses_edit.php" method="post">
        



        <div class="form-group">
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
                  <label for="username" class="sr-only">Username</label>
                  <input type="text" name="username" id="" class="form-control" placeholder="Email address" value="<?php echo $data['username']; ?>">
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Username" value="<?php echo $data['email']; ?>">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password_1" id="password" class="form-control" placeholder="***********" >
                </div>

                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Confirm Password</label>
                  <input type="password" name="password_2" id="password" class="form-control" placeholder="***********" >
                </div>
                <button type="submit"  id="login" class="btn btn-block login-btn mb-4" type="submit" value="">Save</button>
              </form>
              <!-- <a href="#!" class="forgot-password-link">Forgot password?</a> -->
              <!-- <p>Have an Account? <a href="index.php">Sign in</a></p> -->
              </p>
              <!-- <nav class="login-card-footer-nav">
                <a href="#!">Terms of use.</a>
                <a href="#!">Privacy policy</a>
              </nav> -->
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>