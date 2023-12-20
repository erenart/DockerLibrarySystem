<?php
@include 'config.php';
$ID = $_SESSION['ID'];



?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Issued</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
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
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Book ISBN Number</th>
                    <th>Issued User ID</th>
                    <th>Issued User Name</th>
                  </tr>
                  </thead>
                  <tbody>
                      
            <?php

            $list = "SELECT * FROM books WHERE issued_user_ID =".$ID;
            $records = $booksconn->query($list);   
            if ($records->num_rows>0) {
                      while ($row = $records->fetch_assoc()) {
                  ?>     
                      
                <tr>
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["book_name"] ?></td>
                    <td><?php echo $row["book_isbn_number"] ?></td>
                    <td><?php echo $row["issued_user_ID"] ?></td>
                <?php

            $list2 = "SELECT * FROM user_log WHERE ID =".$row["issued_user_ID"];
            $records2 = $conn->query($list2);   
            if ($records2->num_rows>0) {
                      while ($row2 = $records2->fetch_assoc()) {
            ?> 
                    <td><?php echo $row2["name"] ?></td>
                </tr>
                <?php
                      }
                 }   
            }
            }
            else {
                ?>
                <p class="form-label" style="color: #FF0000;"><?php echo "THERE IS NO BOOK ISSUED TO YOU.";?></p>
                <?php
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