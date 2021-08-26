if (password_1 == password_2) {
        $password = md5($password_1);
        $query  = "UPDATE user SET username = '$username', email = '$email', password = '$password' WHERE id = '$id'";
  
        $result = mysqli_query($conn, $query);

        
    if($result){
        echo "<script>alert('Data berhasil diubah.');window.location='view.php';</script>";

        
    } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Query gagal.');window.location='edit_main.php';</script>";
    
    }

    }

    //

    <?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'server.php';

	// membuat variabel untuk menampung data dari form
    $id = ($_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $password = md5($password_1);
    $query  = "UPDATE user SET username = '$username', email = '$email', password = '$password' WHERE id = '$id'";
  
    if ($password_1 == $password_2) {
        
        
        $result = mysqli_query($conn, $query);

        
    } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Query gagal.');</script>";
    
    }

     
  
   
  // periska query apakah ada error
 

 
  