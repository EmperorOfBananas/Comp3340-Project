<!--https://getbootstrap.com/docs/5.1/examples/sign-in/-->
<!--align form to center-->
<div class="form d-flex flex-column align-items-center vh-100">
  <!--form, method post-->
 <form class="text-center border border-dark border-2 rounded-3 p-3 my-auto" action="validate.php" method="POST">
   <h3 class="mb-3"><a class="nav-link text-dark" href="../home/index.php">E-commerce</a></h3>
   <?php 
        session_start();//start session
        if(isset($_SESSION["userid"])){//checks if user is logged in
          header('Refresh:1;  url=../home/index.php');//redirect
          exit();      
        }else if($_GET["registered"]){//checks if user just finished registering
            echo '<!--alert for successful registration-->
            <div class="alert alert-success text-center">
            	Registration Successful!
            </div>';
        }else if($_GET["invalid"]){//checks for invalid input
          echo '<!--alert for invalid input-->
          <div class="alert alert-warning text-center">
          	Email address and/or password incorrect!
          </div>';
         }else if($_GET["isdisabled"]){//checks if user account is disabled
          echo '<!--alert for account disabled-->
          <div class="alert alert-warning text-center">
          	Unable to login. Account is disabled.
          </div>';
        }
	?>
    <!--email address input field-->
    <div class="form-floating mb-1">
      <input type="email" class="form-control" id="email" name="email" required>
      <label for="email">Email address</label>
    </div>
   <!--password input field-->
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="password" name="password" required>
      <label for="password">Password</label>
    </div>
   <div class="d-flex flex-column align-items-center">
    <input class="btn btn-dark w-50 mb-2" type="submit" value="Sign In"/>
     <!--go to register page-->
    <a class="nav-link text-dark" href="../register/index.php">Don't have an account? Register Now</a>
    <p class="text-center text-dark fw-bold">&copy; 2022 Company, Inc</p>
   </div>
  </form>
</div>