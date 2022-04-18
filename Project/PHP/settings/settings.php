<?php
	require_once("../databaseconnection.php");//database connection functionality
	session_start();//start session
	if(isset($_SESSION["userid"])){//checks if users is logged in
      $openConnection=OpenCon();//open database connection
  	  $userid=$_SESSION["userid"];//retrieve user id
      $result=queryResultSelect($openConnection,"SELECT * FROM UserAdmin WHERE UserId=$userid");//select user with that userid
      if(mysqli_num_rows($result)>0){//cehck if any rows were selected
          $row=mysqli_fetch_assoc($result);//fetch records
          echo '<!--https://getbootstrap.com/docs/5.1/examples/sign-in/-->
          		<div class="container">
          			<!--title-->
          			<h2 class="text-center mb-3 py-3 bg-dark text-white">Account Settings</h2>
            		<div class="row">      
                    	<div class="col col-12 col-sm-12 col-md-4 col-lg-4 mb-3">
                        <!--personal information form, method post-->
                         <form class="text-center p-3 border border-2 border-dark rounded-3" action="updatename.php" method="POST">
                           <h3 class="mb-3">Personal Information</h3>
                           <!--first name input field-->
                            <div class="form-floating mb-1">
                              <input type="text" class="form-control" id="fname" maxlength="20" name="fname" value="'.$row["FirstName"].'" required>
                              <label for="fname">First name</label>
                            </div>
                            <!--last name input field-->
                            <div class="form-floating mb-1">
                              <input type="text" class="form-control" id="lname" maxlength="45" name="lname" value="'.$row["LastName"].'" required>
                              <label for="lname">Last name</label>
                            </div>
                            <!--email input field-->
                            <div class="form-floating mb-1">
                              <input type="email" class="form-control" id="email" maxlength="45" name="email" value="'.$row["Email"].'" required>
                              <label for="email">Email address</label>
                            </div>  
                            <input class="btn btn-dark w-50 mb-2" type="submit" value="UPDATE"/>
                          </form>
                        </div>
                    	<div class="col col-12 col-sm-12 col-md-4 col-lg-4 mb-3">
                        <!--residency form-->
                         <form class="text-center p-3 border border-2 border-dark rounded-3" action="updateresidency.php" method="POST">
                           <h3 class="mb-3">Place of Residence</h3>
                          <!--city input field-->
                          <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="city" maxlength="45" name="city" value="'.$row["City"].'" required>
                            <label for="city">City</label>
                          </div>
                          <!--address input field-->
                          <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="address" maxlength="45" name="address" value="'.$row["Address"].'" required>
                            <label for="address">Address</label>
                          </div>
                          <!--postal input field-->
                          <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="postal" maxlength="7" name="postal" value="'.$row["PostalCode"].'" required>
                            <label for="postal">Postal Code</label>
                          </div>
                            <input class="btn btn-dark w-50 mb-2" type="submit" value="UPDATE"/>
                          </form>
                        </div>
                    	<div class="col col-12 col-sm-12 col-md-4 col-lg-4 mb-3">
                        <!--change password form-->
                         <form class="text-center p-3 border border-2 border-dark rounded-3" action="updatepassword.php" method="POST">
                          <h3 class="mb-3">Change Password</h3>';
        				  if($_GET["doNotMatch"]){//if passwords did not match
                            echo "<span>Passwords did not match. Please try again!</span>";
                          }
                          echo '<!--password input field-->
                          <div class="form-floating mb-1">
                            <input type="password" class="form-control" id="password" minlength="8" name="password" required>
                            <label for="password">Password</label>
                          </div>
                          <!--confirm password input field-->
                          <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirmpassword" name="confirm" required>
                            <label for="confirmpassword">Confirm Password</label>
                          </div>
                          <input class="btn btn-dark w-50 mb-2" type="submit" value="UPDATE"/>
                        </form>
                        </div>
                    </div>
            	</div>';
      }

      CloseCon($openConnection);//close connection
    }
?>