<?php
	require_once("../databaseconnection.php");//database connection functionality
	session_start();//session start
	if(isset($_SESSION["userid"])){//check if user is logged in
      $openConnection=OpenCon();//open database connection
      $city=$_POST["city"];//retrieve city
      $address=$_POST["address"];//retrieve address
      $postal=$_POST["postal"];//retrieve postal
      $userid=$_SESSION["userid"];//retrieve user id
      $stmt=mysqli_prepare($openConnection,"UPDATE UserAdmin SET City=?,Address=?,PostalCode=? WHERE UserId=?");//update information
      mysqli_stmt_bind_param($stmt,"sssi",$city,$address,$postal,$userid);//bind param
      mysqli_stmt_execute($stmt);  
      CloseCon($openConnection);//close database connection
    }
      header('Refresh:1;  url=index.php');//redirect
?>