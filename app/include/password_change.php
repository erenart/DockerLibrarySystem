<?php
@include 'config.php';
$_SESSION['password_success'] = 0;
$ID = $_SESSION['ID'];
$error = 0;

if(isset($_POST['submit'])){
   $old_password = md5($_POST['old_password']);
   $new_password = md5($_POST['new_password']);
   $cnew_password = md5($_POST['cnew_password']);
   
   
            $list = "SELECT * FROM user_log WHERE ID=".$ID;
            $records = $conn->query($list);   
            if ($records->num_rows>0) { 
                        while ($row = $records->fetch_assoc()) {
                          if ($old_password == $row["password"]) {
                              if ($new_password == $cnew_password) {
                                  if ($new_password != $row["password"]) {
                                  $insert = "UPDATE user_log SET password = '".$new_password."' WHERE ID =".$ID;
                                  mysqli_query($conn, $insert);
                                  $_SESSION['password_success'] = 1;
                                  if ($ID == 1) {
                                  header("location:".$webURL."/admin/profile");
                                  }
                                  else {
                                  header("location:".$webURL."/user/profile");
                                  }
                              }
                              else {
                              $error = 3;
                              }
                          }
                          else {
                              $error = 2;
                          }
                          }
                        else {
                              $error = 1;
                        }
                        }
            }
}

?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Change Password</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
          
       <div class="card">
              <!-- /.card-header -->

                <div class="card-body">
            <form action="" method="post" autocomplete="off">
                                    <?php
                                    if ($error == 1) {
                                    ?>
                                    <p class="form-label" style="color: #FF0000;"><?php echo "WRONG PASSWORD";?></p>
                
                                    <?php
                                    }
                                    elseif ($error == 2){
                                    ?>
                                    <p class="form-label" style="color: #FF0000;"><?php echo "PASSWORDS DO NOT MATCH";?></p>
                                    <?php
                                    }
                                    elseif ($error == 3){
                                    ?>
                                    <p class="form-label" style="color: #FF0000;"><?php echo "NEW PASSWORD CAN NOT BE THE SAME AS YOUR OLD PASSWORD";?></p>
                                    <?php
                                    }
                                    ?>
                                <div class="row">
        			<div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input type="password" name="old_password" required id="old_password" class="form-control" />
        			</div>
        			</div>
                                </div>
                    <div class="row">
        			<div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="new_password" required id="new_password" class="form-control" />
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="cnew_password" required id="cnew_password" class="form-control" />
        		</div>
                        </div>
                        </div>
                <input type="submit" name="submit" value="Done" class="btn btn-success" style="float:right;" />
                <?php
                if ($ID == 1) {
                ?>
                <p class="btn btn-outline-light"><a href="<?=WEB?>admin/profile">Back</a></p>
                <?php
                }
                else {
                ?>
                <p class="btn btn-outline-light"><a href="<?=WEB?>user/profile">Back</a></p>
                <?php
                }
                ?>
            </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>