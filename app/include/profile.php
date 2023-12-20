<?php
@include 'config.php';  
$password_success = $_SESSION['password_success'];
$ID = $_SESSION['ID'];

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<?php
if ($ID != 1){
            
            $list = "SELECT * FROM user_log WHERE ID=".$ID;
            $records = $conn->query($list);   
            if ($records->num_rows>0) { 
                      while ($row = $records->fetch_assoc()) {
               
/*if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $avatar = ($_POST['avatar']);

}*/
?>
    <section class="content">
          
       <div class="card">
              <!-- /.card-header -->


                <div class="card-body">
            <form action="" method="post">
                    <div class="row">
        			<div class="col-md-6">
        			<div class="mb-3">
        			</div>
                        <?php 
                        if ($password_success == 1) {
                        ?>
                        <p class="form-label" style="color: #00FF00;"><?php echo "YOUR PASSWORD HAS BEEN CHANGED!";?></p>
                        <?php
                        $_SESSION['password_success'] = 0;
                        }
                        ?>
                        <td><img src="<?=WEB?>dist/img/<?=$avatar?>.png"></td>
                                <div class="col-md-6">
        			<div class="mb-3">
        			</div>
        			</div>
                     <a>User ID:</a>
                        <label class="form-label"><?php echo $row["ID"]; ?></label>
                                <div class="col-md-6">
        			<div class="mb-3">
        			</div>
        			</div>
                     <a>Name & Surname:</a>
                        <label class="form-label"><?php echo $row["name"]; ?></label>
                                <div class="col-md-6">
        			<div class="mb-3">
        			</div>
        			</div>
                     <a>Email:</a>
                        <label class="form-label"><?php echo $row["email"]; ?></label>
                                <div class="col-md-6">
        			<div class="mb-3">
        			</div>
        			</div>
                     <p class="btn-xs"><a href="<?=WEB?>user/profile/password_change" style="color: #F78181">Change My Password</a></p>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
        			</div>
                                <div class="col-md-6" style="float:right;">
                     <a>Account Created On:</a>
                        <label class="form-label"><?php echo $row["account_created_on"]; ?></label>
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
        		</div>
                    <div class="mt-4 mb-0">
        		</div>
        	</form>

                 </div>

              <!-- /.card-body -->
            </div>
                <p class="btn btn-outline-light" style="float:left;"><a href="<?=WEB?>user">Back</a></p>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
                      }
            }
            
}
else {?>
                        <div class="card">
                <div class="card-body">
                                            <?php 
                        if ($password_success == 1) {
                        ?>
                        <p class="form-label" style="color: #00FF00;"><?php echo "YOUR PASSWORD HAS BEEN CHANGED!";?></p>
                        <?php
                        $_SESSION['password_success'] = 0;
                        }
                        ?>
                     <p class="btn-xs"><a href="<?=WEB?>admin/profile/password_change" style="color: #F78181">Change Password</a></p>
        	</div>
                </div>
                </div>

<?php
}
?>