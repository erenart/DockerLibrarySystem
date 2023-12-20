<?php
@include 'config.php';
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Books Panel</h1>
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
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Location Rack</th>
                    <th>Status</th>
                    <th>ISBN Number</th>
                  </tr>
                  </thead>
                  <tbody>
                      
            <?php

            $list = "SELECT * FROM books";
            $records = $booksconn->query($list);   
                      $book_status = "";
            if ($records->num_rows>0) { 
                      while ($row = $records->fetch_assoc()) {
                      if($row["book_status"] == "Available") {
                        $book_status = '<div class="badge bg-success">Available</div>';
                      }
                      else {
                        $book_status = '<div class="badge bg-danger">Issued</div>';
                      }
                  ?>     
                      
                <tr>
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["book_name"] ?></td>
                    <td><?php echo $row["book_author"] ?></td>
                    <td><?php echo $row["book_category"]; ?></td>
                    <td><?php echo $row["book_location_rack"] ?></td>
                    <td><?php echo $book_status ?></td>
                    <td><?php echo $row["book_isbn_number"] ?></td>
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