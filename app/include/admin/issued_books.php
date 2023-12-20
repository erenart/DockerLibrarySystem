<?php
@include 'config.php';
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
            <a href="<?=WEB?>admin/issued_books/issue" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> Issue Book<a/>
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Issued Books</h1>
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
                    <th>Issued For</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      
            <?php

            $list = "SELECT * FROM books WHERE book_status = 'Issued'";
            $records = $booksconn->query($list);   
            if ($records->num_rows>0) {
                      while ($row = $records->fetch_assoc()) {
                          
                            $specificTimestamp = strtotime($row["book_issued_on"]);
                            $todayTimestamp = strtotime(date('Y-m-d'));

                            $daysPassed = floor(($todayTimestamp - $specificTimestamp) / (60 * 60 * 24));      
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
                    <td><?php echo $daysPassed." Days" ?></td>
                    <td><a href="<?=WEB?>admin/delete/<?=$row["ID"]?>/<?="return"?>" class="btn btn-outline-info btn-xs">Returned</a></td>
                </tr>
                <?php
                      }
                 }   
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