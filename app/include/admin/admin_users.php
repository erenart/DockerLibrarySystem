<?php
@include 'config.php';
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
       <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Account Created On</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      
            <?php

            $list = "SELECT * FROM user_log WHERE user_type = 'user'";
            $records = $conn->query($list);   
            if ($records->num_rows>0) { 
                      while ($row = $records->fetch_assoc()) {
                  ?>     
                <tr>
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["account_created_on"] ?></td>
                    <td>
                    <a href="<?=WEB?>admin/delete/<?=$row["ID"]?>/<?="user"?>" class="btn btn-danger btn-xs" style="justify-content: center">Delete</a>
                    </td>
                </tr>
                <?php
                      }
                 }
            ?>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>