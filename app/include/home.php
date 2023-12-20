<?php
$ID = $_SESSION['ID'];
?>

<img src="<?=WEB?>dist/img/imglib.jpg" class="position-absolute" style="opacity: 0.7" alt="alt"/>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>788</h3>

                <p>Books</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>124<sup style="font-size: 20px"></sup></h3>

                <p>Issued Already</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>310</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        </div>
    </section>
    
    <section class="content">
       <div class="container-fluid">
       <div class="card" style="background-color: rgba(255, 255, 255, 0.7)">
              <!-- /.card-header -->


                <div class="card-body">

                <div class="row" style="justify-content: center; justify-content: space-around; margin-top: 20px">
                        
                   
          <div class="col-auto" style="height: 440px; width: 440px">
            <!-- small box -->
            <div class="small-box bg-orange" style="height: 440px; width: 440px">
              <div class="inner">
                <h3>In July</h3>

                <h4>+200 New Arrivals</h4>
                <p>We are extending our library!</p>
                <p>More than 200 books will belong to our racks.</p>
              </div>
              <div class="icon">
                <i class="ion-bag"></i>
              </div>
            </div>
          </div>

                    
          <div class="col-auto" style="height: 440px; width: 440px">
            <!-- small box -->
            <div class="small-box bg-dark" style="height: 440px; width: 440px">
              <div class="inner">
                <h3>1day = 1zł</h3>

                <h4>Now issue a book and only pay 1 zł per day!</h4>
                <p>(This is just until 31 DECEMBER 2023 11:59pm)</p>
              </div>
            </div>
          </div>
                    
          <?php
          if ($ID == 1) {
          ?>
          </div>
                <div class="row" style="justify-content: center; justify-content: space-around; margin-top: 20px">
                    <div class="row" style="justify-content: start;align-content: stretch; width: 400px">
                <p class="btn bg-orange btn-outline-light"><a href="<?=WEB?>admin/books_panel">Browse Books</a></p>
                    </div>
                    <div class="row" style="justify-content: start; align-content: stretch; width: 400px">
                <p class="btn bg-dark btn-outline-light"><a href="<?=WEB?>admin/books_panel">Browse Books</a></p>
                    </div>
                </div>
          <?php
          }
          else {
          ?>
          </div>
                <div class="row" style="justify-content: center; justify-content: space-around; margin-top: 20px">
                    <div class="row" style="justify-content: start;align-content: stretch; width: 400px">
                <p class="btn bg-orange btn-outline-light"><a href="<?=WEB?>user/books">Browse Books</a></p>
                    </div>
                    <div class="row" style="justify-content: start; align-content: stretch; width: 400px">
                <p class="btn bg-dark btn-outline-light"><a href="<?=WEB?>user/books">Browse Books</a></p>
                    </div>
                </div>
          <?php
          }
          ?>
                      
     
            </div>
            </div>
            </section>
</div>
<div style="height: 448px">
</div>


  

