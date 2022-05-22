
<?php
session_start();
include "include/connect.php";
include "include/header.php";

?>


<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">ADMIN</h1>
                                        <?php
                                        if(isset($_SESSION['status']) && $_SESSION['status']!=''){
                                            echo "<div class='alert alert-danger' role='alert'>".$_SESSION['status']."</div>";
                                            unset($_SESSION['status']);
                                        }
                                        ?>
                                    </div>
                                    <form class="user" action ="code.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="login_email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="login_pass">
                                        </div>
                                        <div class="form-group">
                                            
                                            <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                                Login</button>
                                        </div>
                                        <hr>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>

<?php

include "include/scripts.php";
include "include/footer.php";

?>