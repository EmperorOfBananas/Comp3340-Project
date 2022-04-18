<?php
	require_once("../databaseconnection.php");//database connection functionality
	session_start();//start session
	if(isset($_SESSION["userid"])){//check if user is logged in
      $openConnection=OpenCon();//open database connection
      $fname=$_POST["fname"];//retrieve firstname
      $lname=$_POST["lname"];//retrieve last name
      $email=$_POST["email"];//retrieve email
      $userid=$_SESSION["userid"];//retrieve user id
      $stmt=mysqli_prepare($openConnection,"UPDATE UserAdmin SET FirstName=?,LastName=?,Email=? WHERE UserId=?");//update values
      mysqli_stmt_bind_param($stmt,"sssi",$fname,$lname,$email,$userid);//bind params
      mysqli_stmt_execute($stmt);  
      CloseCon($openConnection);//close connection
    }
      header('Refresh:1;  url=index.php');//redirect
?>