<?php
@include 'config.php';
$ID = $_SESSION['ID'];

            //$ID = $_GET["ID"];
            $list = "SELECT * FROM user_log WHERE user_name='".$ID."'";
            $records = $conn->query($list);
            
if(isset($_POST['submit'])){
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];
    $new_avatar = $_POST['avatar'];

                    $insert = "UPDATE user_log SET name = '".$new_name."' WHERE user_name =".$ID;
                    mysqli_query($conn, $insert);
                    $insert = "UPDATE user_log SET email = '".$new_email."' WHERE user_name=".$ID;
                    mysqli_query($conn, $insert);
                    $insert = "UPDATE user_log SET password = '".$new_password."' WHERE user_name =".$ID;
                    mysqli_query($conn, $insert);
                    $insert = "UPDATE user_log SET avatar = '".$new_avatar."' WHERE user_name =".$ID;
                    mysqli_query($conn, $insert);

        header("location:".$webURL."admin");
}
                                  
?>            

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile Edit</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
          
       <div class="card">
              <!-- /.card-header -->
                <?php  
                    if ($records->num_rows>0) { 
                      while ($row = $records->fetch_assoc()) {
                ?>     
                <div class="card-body">
            <form action="" method="post">
                    <div class="row">
        			<div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" required autocomplete="off" value="<?php echo $row["name"];?>" class="form-control"/>
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" required autocomplete="off" value="<?php echo $row["email"];?>" class="form-control"/>
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" name="password" required autocomplete="off" value="<?php echo $row["password"];?>" class="form-control"/>
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Avatar</label>
                        <input type="text" name="avatar" required autocomplete="off" value="<?php echo $row["avatar"];?>" class="form-control"/>
        			</div>
        			</div>
                <input type="submit" name="submit" autocomplete="off" value="Done" class="btn btn-success" style="float:right;" />
        	</form>
                <p><a href="<?=WEB?>admin">Back</a></p>
                </div>
              <!-- /.card-body -->
            </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php
                      }
                    }
?>