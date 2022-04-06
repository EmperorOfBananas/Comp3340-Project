<div class="container">
  <h2 class="text-center text-white py-3 bg-dark">Manage Users</h2>
  <form class="d-flex flex-column align-items-center mt-3 mb-5" action="index.php" method="POST">
    <?php include "delete.php"; ?>
    <?php include "disable.php";?>
    <div class="form-floating">
      <select class="form-select form-select-lg my-1" id="operation" name="operation" aria-label=".form-select-lg example" required>
        <option value="View">View</option>   
        <option value="Disable">Disable</option>
        <option value="Delete">Delete</option>
      </select>
      <label for="operation">Operation</label>
    </div>
  <?php
    session_start();
    if($_SESSION["isadmin"]){
      require_once("../databaseconnection.php");//database connection functionality
      $openConnection=OpenCon();//open database connection
      $result=queryResultSelect($openConnection,"SELECT UserId, FirstName, LastName FROM UserAdmin EXCEPT SELECT UserId, FirstName, LastName FROM UserAdmin WHERE UserId=1");//retrieve email to check if user with that email already exists
      echo '<div class="form-floating">
              <select class="form-select form-select-lg my-1" id="users" name="users" aria-label=".form-select-lg example" required>';
      if(mysqli_num_rows($result)>0){//checks if any rows were selected
         echo '<option value="ViewAll">View All Users</option>';
       while($row=mysqli_fetch_assoc($result)){
         echo '<option value="'.$row["UserId"].'">'.$row["UserId"].'. '.$row["FirstName"].' '.$row["LastName"].'</option>';
       }
      }
      echo '	</select>
              <label for="users">Users</label>
            </div>
            <input class="btn btn-dark my-2" type="submit" value="Submit"/>
            <div class="d-flex">
              <a href="../add/index.php"class="nav-link text-dark">Add New User</a>
              <a href="../update/index.php"class="nav-link text-dark">Update User Record</a>
            </div>';
     CloseCon($openConnection);
    }  
  ?>
  </form>
<?php include "view.php"; ?>
</div>