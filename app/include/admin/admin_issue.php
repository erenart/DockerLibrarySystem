<?php
@include 'config.php';

   $error = 0;
if(isset($_POST['submit'])){
   $user_ID = mysqli_real_escape_string($conn, $_POST['user_ID']);
   if ($user_ID == 1) {
       $error = 1;
   }
   else {
   $book_ID = mysqli_real_escape_string($booksconn, $_POST['book_ID']);

            $list = "SELECT * FROM user_log WHERE ID =".$user_ID;
            $records = $conn->query($list);
            if ($records->num_rows>0) { 
            $list = "SELECT * FROM books WHERE ID =".$book_ID;
            $records = $booksconn->query($list);
            if ($records->num_rows>0) { 
                      while ($row = $records->fetch_assoc()) {
                      if($row["book_status"] == "Issued") {
                        $error = 3;
                      }
                      else {
                          
                        $insert = "UPDATE books SET issued_user_ID = '".$user_ID."' WHERE ID =".$book_ID;
                        mysqli_query($booksconn, $insert);
                        $insert = "UPDATE books SET book_issued_on = '". date('Y-m-d') ."' WHERE ID =".$book_ID;
                        mysqli_query($booksconn, $insert);
                        $insert = "UPDATE books SET book_status = 'Issued' WHERE ID =".$book_ID;
                        mysqli_query($booksconn, $insert);
                        header("location:".$webURL."admin/issued_books");
         
                        if ($conn->query($sql) === TRUE) {
                        } else {
                            echo "Error: " . $conn->error;
                        }       
                      }          
                      }         
            }
            else{
                $error = 2;
            }
            }
            else{
                $error = 1;
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
            <h1 class="m-0 text-dark">Issue a book</h1>
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
                <p class="form-label" style="color: #FF0000;"><?php echo "INVALID User ID";?></p>
                
                <?php
                }
                elseif ($error == 2){
                ?>
                <p class="form-label" style="color: #FF0000;"><?php echo "INVALID Book ID";?></p>
                <?php
                }
                elseif ($error == 3){
                ?>
                <p class="form-label" style="color: #FF0000;"><?php echo "THIS BOOK IS NOT AVAILABLE";?></p>
                <?php
                }
                ?>
                    <div class="row">
        			<div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">User ID</label>
                        <input type="text" name="user_ID" required id="user_ID" class="form-control" />
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Book ID</label>
                        <input type="text" name="book_ID" required id="book_ID" class="form-control" />
        		</div>
                </div>
                </div>
                <input type="submit" name="submit" value="Add" class="btn btn-success" style="float:right;" />
                <p class="btn btn-outline-light"><a href="<?=WEB?>admin/issued_books">Back</a></p>
            </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>