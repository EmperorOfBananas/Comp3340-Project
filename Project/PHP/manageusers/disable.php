<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();//start session

	if($_SESSION["isadmin"]){//checks if an admin is logged in
      $openConnection=OpenCon();//opens database connection
      $operation=$_POST["operation"];//retrieves operation to be performed
      $userid=$_POST["users"];//retrieve user id
	 if($operation=="Disable"){//check if admin wants to disable account
     	if($userid!="ViewAll"){//check if admin is trying to disable all
          $stmt=mysqli_prepare($openConnection,"UPDATE UserAdmin SET isDisabled=1 WHERE UserId=$userid");//update record to disable account
          mysqli_stmt_execute($stmt);
          echo '<div class="alert alert-success text-center">User Account Disabled</div>';
        }
      }
      CloseCon($openConnection);//closes connection
    }
?>