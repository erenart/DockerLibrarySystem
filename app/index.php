<?php
error_reporting(0);
@include 'config.php';

session_start();
if (!empty($_SESSION["ID"]) && !empty($_SESSION["admin_name"])) {
    header("location:".$webURL."admin/logout");
    exit();
}
elseif (!empty($_SESSION["ID"]) && !empty($_SESSION["user_name"]) && !empty($_SESSION["avatar"])) {
    header("location:".$webURL."user/logout");
    exit(); 
}
else
{

$_SESSION['password_success'] = 0;

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_log WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
        
        //admin-user filter
      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['ID'] = $row["ID"];
         header('location:admin');

      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['avatar'] = $row['avatar'];
         $_SESSION['ID'] = $row["ID"];
         header('location:user');

      }
     
   }else{
      $error[] = 'Incorrect email or password!';
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Xan Library | Login</title>
   <link rel="icon" type="image/png" sizes="32x32" href="http://localhost:9000/dist/img/icon-lib.png"/>
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>
      <input type="email" name="email" required autocomplete="off" placeholder="Enter your email">
      <input type="password" name="password" required autocomplete="off" placeholder="Enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register">Register now</a></p>
   </form>

</div>

</body>
</html>
<?php
}
?>