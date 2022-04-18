<!--container-->
<div class="container">
  <h2 class="text-center text-white py-3 bg-dark">Manage Users</h2>
  <!--form,method post-->
  <form class="d-flex flex-column align-items-center mt-3 mb-5" action="index.php" method="POST">
    <?php include "delete.php"; ?>
    <?php include "disable.php";?>
    <div class="form-floating">
      <!--https://getbootstrap.com/docs/5.1/forms/select/-->
      <!--select input-->
      <select class="form-select form-select-lg my-1" id="operation" name="operation" aria-label=".form-select-lg" required>
        <!--options-->
        <option value="" hidden>Select Operation</option>   
        <option value="View">View</option>   
        <option value="Disable">Disable</option>
        <option value="Delete">Delete</option>
      </select>
      <label for="operation">Operation</label>
    </div>
  <?php
    session_start();//start session
    if($_SESSION["isadmin"]){//check if an admin is logged in
      require_once("../databaseconnection.php");//database connection functionality
      $openConnection=OpenCon();//open database connection
      //retrieve all records except for main admin
      $result=queryResultSelect($openConnection,"SELECT UserId, FirstName, LastName FROM UserAdmin EXCEPT SELECT UserId, FirstName, LastName FROM UserAdmin WHERE UserId=1");
      echo '<div class="form-floating">
      		  <!--https://getbootstrap.com/docs/5.1/forms/select/-->
              <select class="form-select form-select-lg my-1" id="users" name="users" aria-label=".form-select-lg" required>';
      if(mysqli_num_rows($result)>0){//checks if any rows were selected
         echo '<!--options-->
         	   <option value="" hidden>Select User</option>
         	   <option value="ViewAll">View All Users</option>';
       while($row=mysqli_fetch_assoc($result)){
         echo '<option value="'.$row["UserId"].'">'.$row["UserId"].'. '.$row["FirstName"].' '.$row["LastName"].'</option>';
       }
      }
      echo '	</select>
              <label for="users">Users</label>
            </div>
            <!--submit button-->
            <input class="btn btn-dark my-2" type="submit" value="Submit"/>
            <div class="d-flex">
              <!--link to go to add a new user page-->
              <a href="../add/index.php"class="nav-link text-dark">Add New User</a>
              <!--link to go to update user record page-->
              <a href="../update/index.php"class="nav-link text-dark">Update User Record</a>
            </div>';
     CloseCon($openConnection);//closes connection
    }  
  ?>
  </form>
<?php include "view.php"; ?>
</div>