<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();

	if($_SESSION["isadmin"]){	
      $openConnection=OpenCon();//opens database connection
      $operation=$_POST["operation"];
      $userid=$_POST["users"];
	 if($operation=="Delete"){
       if($userid!="ViewAll"){
          $stmt=mysqli_prepare($openConnection,"DELETE FROM UserAdmin WHERE UserId=$userid");
          mysqli_stmt_execute($stmt);
          echo '<div class="alert alert-success text-center">User Account Deleted Successfully</div>';
       }
      }
      CloseCon($openConnection);
    }
?>