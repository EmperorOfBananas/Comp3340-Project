<?php
	require_once("../databaseconnection.php");
	session_start();
	if(isset($_SESSION["userid"])){
      $openConnection=OpenCon();//open database connection
      $password=$_POST["password"];//retrieve password
      $confirm=$_POST["confirm"];//retrieve confirm password
      $userid=$_SESSION["userid"];//retrieve userid
      if($password==$confirm){//check if password and confirm password match each other
        $stmt=mysqli_prepare($openConnection,"UPDATE UserAdmin SET Password=? WHERE UserId=?");//update info
        mysqli_stmt_bind_param($stmt,"si",$password, $userid);//bind params
        mysqli_stmt_execute($stmt);  
      }else{
        header('Refresh:1;  url=index.php?doNotMatch=1'); //redirect
        exit();
      }
      CloseCon($openConnection);//close connection
    }
      header('Refresh:1;  url=index.php');
?>