<!--https://getbootstrap.com/docs/5.1/examples/sign-in/-->
<!--align items to center-->
<div class="form d-flex flex-column align-items-center my-3">
 <!--form, method post-->
 <form class="text-center p-3 my-auto border border-2 border-dark rounded-3" action="registration.php" method="POST">
   <h3 class="mb-3"><a class="nav-link text-dark" href="../home/index.php">E-commerce</a></h3>
   <!--first name input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="fname" maxlength="20" name="fname" required>
      <label for="fname">First name</label>
    </div>
   <!--last name input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="lname" maxlength="45" name="lname" required>
      <label for="lname">Last name</label>
    </div>
    <?php if($_GET["emailTaken"]){//checks if email was taken
			echo "<div>
            		Email Taken. Please try again!
            	  </div>";
	  		}
    ?>
   <!--email input field-->
    <div class="form-floating mb-1">
      <input type="email" class="form-control" id="email" maxlength="45" name="email" required>
      <label for="email">Email address</label>
    </div>
   <!--city input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="city" maxlength="45" name="city" required>
      <label for="city">City</label>
    </div>
   <!--address input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="address" maxlength="45" name="address" required>
      <label for="address">Address</label>
    </div>
   <!--postal code input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="postal" maxlength="7" name="postal" required>
      <label for="postal">Postal Code</label>
    </div>
    <?php if($_GET["doNotMatch"]){//checks if passwords did not match
			echo "<div>
            		Passwords did not match!
            	  </div>";
	  		}
    ?>
   <!--password input field-->
    <div class="form-floating mb-1">
      <input type="password" class="form-control" id="password" minlength="8" name="password" required>
      <label for="password">Password</label>
    </div>
   <!--confirm password input field-->
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="confirmpassword" name="confirm" required>
      <label for="confirmpassword">Confirm Password</label>
    </div>
   <div class="d-flex flex-column align-items-center">
    <input class="btn btn-dark w-50 mb-2" type="submit" value="Register"/>
    <!--go to login page-->
    <a class="nav-link text-dark mb-3" href="../login/index.php">Already have an account? Log In</a>
    <p class="text-center text-dark fw-bold">&copy; 2022 Company, Inc</p>
   </div>
  </form>
</div>