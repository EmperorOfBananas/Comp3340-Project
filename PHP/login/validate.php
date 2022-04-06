<?php
	require_once("../databaseconnection.php");//database connection functionality
	$openConnection=OpenCon();//opens database connection
    $email=$_POST["email"];//retrieve email
    $password=$_POST["password"];//retrieve password
    $result=queryResultSelect($openConnection,"SELECT UserId,Email,Password,AdminFlag,isDisabled FROM UserAdmin WHERE Email='{$email}'");//retrieve record user with that email
    if(mysqli_num_rows($result)>0){//check if row was selected
     	$row=mysqli_fetch_assoc($result);//retrieve record
        $useremail=$row["Email"];//retrieve record email
      	$userid=$row["UserId"];//retrieve record user id
        $userpass=$row["Password"];//retrieve user password
      	$isdisabled=$row["isDisabled"];//retrieve isdiabled value
        if($isdisabled){
          CloseCon($openConnection);//closes connection
          header('Refresh:1;  url=index.php?isdisabled=1');//redirect
          exit(); 
        }else if($password==$userpass){//check if inputted password matches record password
          session_start();//start session
          $_SESSION["email"]=$useremail;//set email session variable
          $_SESSION["userid"]=$userid;//set userid session variable
          $_SESSION["isadmin"]=$row["AdminFlag"];//set admin flag session variable
          CloseCon($openConnection);//closes connection
          header('Refresh:1;  url=../home/index.php');//redirect page
          exit();//exit
        }else{
          CloseCon($openConnection);//closes connection
          header('Refresh:1;  url=index.php?invalid=1');//redirect
          exit();
        }
    }else{
          CloseCon($openConnection);//closes connection
          header('Refresh:1;  url=index.php?invalid=1');//redirect
          exit();
    }
?>