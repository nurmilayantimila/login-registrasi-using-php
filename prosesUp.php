<?php 
include 'server.php';
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];




 

 
$sql=mysqli_query($conn, "INSERT INTO `user` (`username`,`password`, `email`)
		 VALUES ('$username','$password','$email' )");

	if ($sql){
		//header('location:tambah.php');
		
		header('location:view.php');

	}else{
		echo"gagal tambah data:".mysqli_error($conn);
	}
	

	
?>