<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();

	if($_SESSION["isadmin"]){	
      $openConnection=OpenCon();//opens database connection
      $operation=$_POST["operation"];
      $itemid=$_POST["products"];
	 if($operation=="Delete"){
       if($itemid!="ViewAll"){
          $stmt=mysqli_prepare($openConnection,"DELETE FROM Products WHERE ItemId=$itemid");
          mysqli_stmt_execute($stmt);
          echo '<div class="alert alert-success text-center">Product Deleted Successfully</div>';
       }
      }
      CloseCon($openConnection);
    }
?>