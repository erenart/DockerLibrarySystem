<?php
@include 'config.php';  
$password_success = $_SESSION['password_success'];
$ID = $_SESSION['ID'];

?>

<head>

<style>
    
    .myCard{
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #0D4574;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }
    
    .myBox{
        width: 250px;
        height: 250px;
        background-color: #0D4574;
        text-align: center;
        line-height: 50px;
        margin-left: 250px;
        margin-top: 60px;
    }
 
</style>

</head>

<body>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

           <img src="<?=WEB?>dist/img/contact-us.png">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


        <section class="content">
          
            <div class="myCard">
    

    <div class="myBox">

        <img src="<?=WEB?>dist/img/mail-icon.png">
        <div>
        <p style="color: white">Send mail to our official email!</p>
        <label class="form-label" style="color: orange">contactus@librarysys.xan</label>
        </div>


  </div>
    
    
        <div class="myBox">
        <img src="<?=WEB?>dist/img/phone-icon.png">
        <div>
        <p style="color: white">Call our official phone number!</p>
        <label class="form-label" style="color: yellow">+48 525 376 98 48</label>
        </div>

  </div>
    
       </div>
        </section>
        
    </div>
</body>