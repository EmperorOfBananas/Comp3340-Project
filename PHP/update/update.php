<!--https://getbootstrap.com/docs/5.1/examples/sign-in/-->
<!--align items to center-->
<div class="form d-flex flex-column align-items-center my-3">
 <!--form, method post-->
 <form class="text-center p-3 my-auto border border-2 border-dark rounded-3" action="updateuser.php" method="POST">
   <h3 class="mb-3">Update User</h3>
   <?php if($_GET["updated"]){//checks if passwords did not match
			echo '<div class="alert alert-success text-center">
            		User Record Updated Successfully!
            	  </div>';
	  		}
    ?>
     <?php
    session_start();
    if($_SESSION["isadmin"]){
      require_once("../databaseconnection.php");//database connection functionality
      $openConnection=OpenCon();//open database connection
      $result=queryResultSelect($openConnection,"SELECT UserId, FirstName, LastName FROM UserAdmin EXCEPT SELECT UserId, FirstName, LastName FROM UserAdmin WHERE UserId=1");//retrieve email to check if user with that email already exists
      echo '<div class="form-floating">
              <select onchange="fillFields(this.value)" class="form-select form-select-lg my-1" id="users" name="users" aria-label=".form-select-lg example" required>';
      if(mysqli_num_rows($result)>0){//checks if any rows were selected
         echo '<option hidden>Select User</option>';
       while($row=mysqli_fetch_assoc($result)){
         echo '<option value="'.$row["UserId"].'">'.$row["UserId"].'. '.$row["FirstName"].' '.$row["LastName"].'</option>';
       }
      }
      echo '	</select>
              <label for="users">Users</label>
            </div>';
      CloseCon($openConnection);
    }  
  ?>
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
    <!--is admin input field-->
    <div class="form-floating mb-1">
      <input type="number" class="form-control" min=0 max=1 id="isadmin" name="isadmin" required>
      <label for="isadmin">isAdmin</label>
    </div>
    <!--is disabled input field-->
    <div class="form-floating mb-3">
      <input type="number" class="form-control" min=0 max=1 id="isdisabled" name="isdisabled" required>
      <label for="isdisabled">isDisabled</label>
    </div>
   <div class="d-flex flex-column align-items-center">
    <a href="../manageusers/index.php" class="nav-link text-dark">Manage Users</a>
    <input class="btn btn-dark w-50 mb-2" type="submit" value="Update User"/>
   </div>
  </form>
</div>
<script src="../../JS/update.js"></script>