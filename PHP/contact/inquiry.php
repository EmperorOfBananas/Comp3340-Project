<?php
  require_once("../databaseconnection.php"); //database connection functionality
  session_start();//session start

  if(isset($_SESSION["userid"])){//checks if user logged in
    $openConnection=OpenCon();//opens connection
    $userid=$_SESSION["userid"];//retrive userid
    $title=$_POST["title"];//retrieve cart toal
    $description=$_POST["description"];
    $date=date('Y-m-d H:i:s');//date

 	$stmt=mysqli_prepare($openConnection,"INSERT INTO Inquiry (UserId,Title,Description,Date) VALUES (?,?,?,?)");//insert transaction
    mysqli_stmt_bind_param($stmt,"isss",$userid,$title,$description,$date);//binds variables to statement
    mysqli_stmt_execute($stmt);

    CloseCon($openConnection);//clsoes connection
  }
	header('Refresh:1;  url=index.php');//redirect
?>