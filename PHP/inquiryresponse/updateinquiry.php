<?php
  require_once("../databaseconnection.php"); //database connection functionality
  session_start();//session start

  if($_SESSION["isadmin"]){//checks if user logged in
    $openConnection=OpenCon();//opens connection
    $inquiryid=$_POST["inquiries"];//retrive userid
    $response=$_POST["response"];

 	$stmt=mysqli_prepare($openConnection,"UPDATE Inquiry SET Response=? WHERE InquiryId=?");//insert transaction
    mysqli_stmt_bind_param($stmt,"si",$response,$inquiryid);//binds variables to statement
    mysqli_stmt_execute($stmt);

    CloseCon($openConnection);//clsoes connection
  }
	header('Refresh:1;  url=index.php?updated=1');//redirect
?>