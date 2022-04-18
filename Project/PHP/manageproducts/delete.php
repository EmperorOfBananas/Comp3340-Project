<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();//start session

	if($_SESSION["isadmin"]){	//check if admin is logged in
      $openConnection=OpenCon();//opens database connection
      $operation=$_POST["operation"];//retrieve operation to be performed
      $itemid=$_POST["products"];//retrieve product id
	 if($operation=="Delete"){//check if operation was delete
       if($itemid!="ViewAll"){//check if admin wants to delete all products
          $stmt=mysqli_prepare($openConnection,"DELETE FROM Products WHERE ItemId=$itemid");//delete item with that item id
          mysqli_stmt_execute($stmt);
          echo '<div class="alert alert-success text-center">Product Deleted Successfully</div>';
       }
      }
      CloseCon($openConnection);//close connection
    }
?>