<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();//start session

	if($_SESSION["isadmin"]){//check if an admin is logged in
      $openConnection=OpenCon();//opens database connection
      $operation=$_POST["operation"];//retrieve operation to be performed
      $userid=$_POST["users"];//retrieve user id
	 if($operation=="Delete"){//check if the delete operation should be performed
       if($userid!="ViewAll"){//check if admin is trying to delete all users
          $stmt=mysqli_prepare($openConnection,"DELETE FROM UserAdmin WHERE UserId=$userid");//delete account
          mysqli_stmt_execute($stmt);
          echo '<div class="alert alert-success text-center">User Account Deleted Successfully</div>';
       }
      }
      CloseCon($openConnection);//closes connection
    }
?>