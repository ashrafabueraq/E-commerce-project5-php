<?php

require "config.php";

session_start();
if(!isset($_SESSION['loggeduser'])){
    header('location:login.php');
}
if(isset($_GET['logout'])){
  session_unset();
  header('location:login.php');
}
$user_id=$_SESSION['loggeduser'];
$viewuser="SELECT * FROM user WHERE user_id ='$user_id' ";
$result=$pdo->query($viewuser);
if(!$result){
    echo"Error ";
}


$row=$result->fetch(PDO::FETCH_ASSOC);




?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css" >
    <?php include 'include/style.php' ?> 
</head>
  <body>
<!-- Header -->
<?php include 'include/header.php' ?> 

<!-- Cart -->
<?php include 'include/smal_cart.php'; ?> 


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




    <div class="container">
        <div class="main-body">
        
              <!-- Breadcrumb -->
              <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
              </nav> -->
              <!-- /Breadcrumb -->
        <h1 class="text-center" style="margin-top: 150px;">My profile</h1><br><br>
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center"><br>
                        <img src="https://cdn.iconscout.com/icon/free/png-256/user-avatar-contact-portfolio-personal-portrait-profile-1-5182.png" alt="Admin" class="rounded-circle" width="150"><br>
                        <div class="mt-3">
                          <h4><?php echo $row['username'];?></h4><br>
                          <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                          <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                          <!-- <button class="btn btn-primary">Follow</button>
                          <button class="btn btn-outline-primary">Message</button> -->
                          <br>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card mt-3">
                    <!--  -->
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">User Name</h6>
                        </div>
                        <div class="col-sm-9 text-info">
                       <?php  echo $row['username'];?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-info">
                        <?php echo $row['email'];?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-info">
                          <?php echo $row['phone'];?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">City</h6>
                        </div>
                        <div class="col-sm-9 text-info">
                        <?php echo $row['city'];?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-info">
                        <?php echo $row['address'];?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-info "  href="updateuser.php">Edit</a>
                          <a class="btn btn-danger "  href="?logout=true">Log out </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  </table>
                  <h1> Your Order : </h1>
<table class="table">                  
  
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Total of the oeder </th>
      <th scope="col">Date of order</th>
      <th scope="col">Order detaile</th>
    </tr>
  </thead>
  <?php 
   
  $q1 = "
  SELECT * FROM `orders` 
  ";
  $data = $pdo->query($q1);
  
  foreach($data as $v){
      if($v['user_id'] == $user_id ){
?>
<tbody>
    <tr>
      <th scope="row"><?php echo $v['order_id']; ?></th>
      <td><?php echo $v['invoice']; ?></td>
      <td><?php echo $v['order_date']; ?></td>
      <td><?php echo '
      <a class="btn btn-primary" href="orderdetail.php?order_id='.$v['order_id'].'">Show detaile </a>
      
      '; 
      ?>
      </td>
    </tr>
  </tbody>
<?php
      } 
  }
  ?>
  

</table>



                 
<?php include 'include/js.php' ?> 
  </body>
</html>

