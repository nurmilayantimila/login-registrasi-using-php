<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <script src="https://kit.fontawesome.com/834a366be0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    
</head>
<body style="background-color: #e4e4e4; " >

    

    <div class="homecontent" style="background-color: #e4e4e4; ">
    <h4>FORMULIR USERS</h4>
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    
        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <p class="welco" style=" ">Welcome <strong><?php echo $_SESSION['username']; ?><a href="index.php?logout='1'" style="color: grey; margin-left: 20px;" ><i class="fas fa-sign-out-alt"></i></a></strong></p>
            
           
            <center>
    <table border="1" align="center" style="margin-top: 50px; " class="styled-table">
     
      <th class="column-title" >No </th>
     <th class="column-title" >Username</th>
     <th class="column-title">password</th>
     <th class="column-title">email</th>
     <th class="column-title">action</th>

    </center>



        <?php endif ?>

        


     <?php 

include "server.php";
$no=0;
$sql = mysqli_query($conn, "SELECT * FROM user ORDER BY id ASC ");
if(mysqli_num_rows($sql)){
foreach ($sql as $data ) {
  $no++ ?>
<tr>
<td><?=$no?></td>
<td><?=$data['username']?></td>
<td><?=$data['password']?></td>
<td><?=$data['email']?></td>
<td>
	<a href="delete1.php?id=<?php echo $data['id']; ?>"><i class="fas fa-trash-alt"></i></a>
	<a href="edit_main.php?id=<?php echo $data['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
</td>

</tr>
<?php
}


}
?>

    </div>

    
  
    
    </body>

</body>
</html>