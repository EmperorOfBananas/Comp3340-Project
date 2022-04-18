<?php
  require_once("../databaseconnection.php"); //database connection functionality
  session_start();//session start

  if($_SESSION["isadmin"]){//checks if admin is logged in
    $openConnection=OpenCon();//opens connection
    $inquiryid=$_POST["inquiries"];//retrive inquiry id
    $response=$_POST["response"];//retrieve response

 	$stmt=mysqli_prepare($openConnection,"UPDATE Inquiry SET Response=? WHERE InquiryId=?");//update inquiry with response
    mysqli_stmt_bind_param($stmt,"si",$response,$inquiryid);//binds variables to statement
    mysqli_stmt_execute($stmt);

    CloseCon($openConnection);//closes connection
  }
	header('Refresh:1;  url=index.php?updated=1');//redirect
?>