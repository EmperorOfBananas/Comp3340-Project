<?php
	require_once("../databaseconnection.php");//database connection functionality
	$openConnection=OpenCon();//open database connection
	$fname=$_POST["fname"];//retrieve first name
    $lname=$_POST["lname"];//retrieve last name
    $email=$_POST["email"];//retrieve email
    $city=$_POST["city"];//retrieve city
    $address=$_POST["address"];//retrieve address
    $postal=$_POST["postal"];//retrieve postal code
    $password=$_POST["password"];//retrieve password
	$isadmin=$_POST["isadmin"];//isadmin, 1 or 0
	$isdisabled=$_POST["isdisabled"];//isdisabled value
	$userid=$_POST["users"];//retrieve user id
    $result=queryResultSelect($openConnection,"SELECT Email FROM UserAdmin WHERE Email='{$email}' EXCEPT SELECT Email FROM UserAdmin WHERE UserId=$userid");//retrieve all user records except for admin
    if(mysqli_num_rows($result)>0){//checks if any rows were selected
      CloseCon($openConnection);//closes connection
      header('Refresh:1;  url=index.php?emailTaken=1');//redirect
      exit();
    }else{
      //update record
      $stmt=mysqli_prepare($openConnection,"UPDATE UserAdmin SET AdminFlag=?,FirstName=?,LastName=?,Email=?,Password=?,Address=?,City=?,PostalCode=?,isDisabled=? WHERE UserId=?");
      mysqli_stmt_bind_param($stmt,"isssssssii",$isadmin,$fname,$lname,$email,$password,$address,$city,$postal,$isdisabled,$userid);
      mysqli_stmt_execute($stmt);
    }
    
	CloseCon($openConnection);//closes connection
	header('Refresh:1;  url=index.php?updated=1');//redirect
?>