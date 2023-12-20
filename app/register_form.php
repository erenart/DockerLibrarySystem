<?php
@include 'config.php';
define("DATA", "data/");
define("myCLASS", "class/");
include_once(DATA."Connection.php");
define("WEB",$webURL);

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $avatar = ($_POST['avatar']);

   $select = " SELECT * FROM user_log WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'User already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'Password not matched!';
      }else{
         $insert = "INSERT INTO user_log(name, email, password, avatar) VALUES('$name','$email','$pass','$avatar')";
         mysqli_query($conn, $insert);
         header('location:'.$webURL);
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   <link rel="icon" type="image/png" sizes="32x32" href="<?=WEB?>dist/img/icon-lib.png"/>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

    <form action="" method="post" autocomplete="off">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

<table id="pokemonSelect" style="width: 450px;">
<tr>
<td><label for="Bulbasaur"><input type="radio" name="avatar" value="Bulbasaur" checked="checked"><img src="<?=WEB?>dist/img/Bulbasaur.png" alt="Bulbasaur"></label></td>
<td><label for="Charmander"><input type="radio" name="avatar" value="Charmander"><img src="<?=WEB?>dist/img/Charmander.png" alt="Charmander"></label></td>
<td><label for="Squirtle"><input type="radio" name="avatar" value="Squirtle"><img src="<?=WEB?>dist/img/Squirtle.png" alt="Squirtle"></label></td>
</tr>
</table>
  
      </body>
      </html>
      <input type="text" name="name" required placeholder="Enter your name & surname">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="<?=WEB?>">login now</a></p>
   </form>
</div>

</body>
</html>