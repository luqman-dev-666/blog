<?php include_once 'config/db.php' ; ?>
<?php include("includes/header.php") ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                        <?php
                          if(isset($_SESSION['status']) && $_SESSION['status']){
                            echo '<div class="alert alert-primary" role="alert">
                                    '.$_SESSION['status'].'
                                  </div>' ;
                            unset($_SESSION['status']) ;
                          }
                        ?>
                    </div>
                    <form class="user" method="POST" action="logincode.php">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" placeholder="Enter Email Address...">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password" >
                        </div>
                        <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block">Login</buton>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


<?php include("includes/scripts.php") ?>
