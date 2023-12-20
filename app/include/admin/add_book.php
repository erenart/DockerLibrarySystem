<?php
@include 'config.php';

if(isset($_POST['submit'])){
   $book_name = mysqli_real_escape_string($booksconn, $_POST['book_name']);
   $book_author = mysqli_real_escape_string($booksconn, $_POST['book_author']);
   $book_category = mysqli_real_escape_string($booksconn, $_POST['book_category']);
   $book_location_rack = mysqli_real_escape_string($booksconn, $_POST['book_location_rack']);
   $book_isbn_number = mysqli_real_escape_string($booksconn, $_POST['book_isbn_number']);
   

         $insert = "INSERT INTO books(book_name, book_author, book_category, book_location_rack, book_isbn_number) VALUES('$book_name', '$book_author', '$book_category', '$book_location_rack', '$book_isbn_number')";
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
            <h1 class="m-0 text-dark">Add Book</h1>
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
                    <div class="row">
        			<div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Book Name</label>
                        <input type="text" name="book_name" required id="book_name" class="form-control" />
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Author Name</label>
                        <input type="text" name="book_author" required id="book_author" class="form-control" />
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="book_category" required id="book_category" class="form-control" />
                        </div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Book ISBN Number</label>
                        <input type="text" name="book_isbn_number" required id="book_name" class="form-control" />
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
                        <label class="form-label">Book Location Rack</label>
                        <input type="text" name="book_location_rack" required id="book_name" class="form-control" />
        			</div>
        			</div>
                        <div class="col-md-6">
        			<div class="mb-3">
        		</div>
                </div>
                </div>
                <input type="submit" name="submit" value="Add" class="btn btn-success" style="float:right;" />
                <p class="btn btn-outline-light"><a href="<?=WEB?>admin/books_panel">Back</a></p>
            </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>