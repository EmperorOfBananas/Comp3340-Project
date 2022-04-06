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
    $confirmPassword=$_POST["confirm"];//retrieve confirm password
	$isadmin=$_POST["isadmin"];//isadmin, 1 or 0
    $result=queryResultSelect($openConnection,"SELECT Email FROM UserAdmin WHERE Email='{$email}'");//retrieve email to check if user with that email already exists
    if(mysqli_num_rows($result)>0){//checks if any rows were selected
      CloseCon($openConnection);//closes connection
      header('Refresh:1;  url=index.php?emailTaken=1');//redirect
      exit();
    }else if($password!=$confirmPassword){//password and confirm password do not match
      CloseCon($openConnection);//closes connection
      header('Refresh:1;  url=index.php?doNotMatch=1');//redirect
      exit();
    }else{
      //insert new record
      $stmt=mysqli_prepare($openConnection,"INSERT INTO UserAdmin (AdminFlag,FirstName,LastName,Email,Password,Address,City,PostalCode) VALUES (?,?,?,?,?,?,?,?)");
      mysqli_stmt_bind_param($stmt,"isssssss",$isadmin,$fname,$lname,$email,$password,$address,$city,$postal);
      mysqli_stmt_execute($stmt);
    }
    
	CloseCon($openConnection);//closes connection
	header('Refresh:1;  url=index.php?added=1');//redirect
?>