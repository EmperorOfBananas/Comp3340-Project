<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();
    if($_SESSION["isadmin"]){
      $openConnection=OpenCon();//open database connection
      $inquiryid=$_GET["inquiryid"];
      $result=queryResultSelect($openConnection,"SELECT * FROM Inquiry WHERE InquiryId=$inquiryid");//retrieve email to check if user with that email already exists
      if(mysqli_num_rows($result)>0){//checks if any rows were selected
       $row=mysqli_fetch_assoc($result);
       $inquiry->title=$row["Title"];
       $inquiry->description=$row["Description"];
       $inquiry->response=$row["Response"];
       echo json_encode($inquiry);
      }
      CloseCon($openConnection);
    }
?>