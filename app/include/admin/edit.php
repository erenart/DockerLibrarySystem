<?php
@include 'config.php';

            $ID = $_GET["ID"];
            $list = "SELECT * FROM books WHERE ID=".$ID;
            $records = $booksconn->query($list);
            
if(isset($_POST['submit'])){
    $new_book_name = $_POST['book_name'];
    $new_book_author = $_POST['book_author'];
    $new_book_category = $_POST['book_category'];
    $new_book_location_rack = $_POST['book_location_rack'];
    $new_book_isbn_number = $_POST['book_isbn_number'];
      
//$insert = "INSERT INTO books(book_name, book_author, book_category, book_location_rack, book_isbn_number) VALUES('$book_name', '$book_author', '$book_category', '$book_location_rack', '$book_isbn_number')"
                    $insert = "UPDATE books SET book_name = '".$new_book_name."' WHERE ID =".$ID;
                    mysqli_query($booksconn, $insert);
                    $insert = "UPDATE books SET book_author = '".$new_book_author."' WHERE ID =".$ID;
                    mysqli_query($booksconn, $insert);
                    $insert = "UPDATE books SET book_category = '".$new_book_category."' WHERE ID =".$ID;
                    mysqli_query($booksconn, $insert);
                    $insert = "UPDATE books SET book_location_rack = '".$new_book_location_rack."' WHERE ID =".$ID;
                    mysqli_query($booksconn, $insert);
                    $insert = "UPDATE books SET book_isbn_number = '".$new_book_isbn_number."' WHERE ID =".$ID;
                    mysqli_query($booksconn, $insert);

        header("location:".$webURL."admin/books_panel");
}
                                  
?>            

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Books Panel</h1>
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
                        <label class="form-label">Book Name</label>
                        <input type="text" name="book_name" required autocomplete="off" value="<?php echo $row["book_name"];?>" class="form-control"/>
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Author Name</label>
                        <input type="text" name="book_author" required autocomplete="off" value="<?php echo $row["book_author"];?>" class="form-control"/>
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="book_category" required autocomplete="off" value="<?php echo $row["book_category"];?>" class="form-control"/>
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Book Location Rack</label>
                        <input type="text" name="book_location_rack" required autocomplete="off" value="<?php echo $row["book_location_rack"];?>" class="form-control"/>
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Book ISBN Number</label>
                        <input type="text" name="book_isbn_number" required autocomplete="off" value="<?php echo $row["book_isbn_number"];?>" class="form-control"/>
        		</div>
                    <div class="mt-4 mb-0">
        		</div>
                <input type="submit" name="submit" autocomplete="off" value="Done" class="btn btn-success" style="float:right;" />
        	</form>
                <p><a href="<?=WEB?>admin/books_panel">Back</a></p>
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