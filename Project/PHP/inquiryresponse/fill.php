<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();//star session
    if($_SESSION["isadmin"]){//check if admin is logged in
      $openConnection=OpenCon();//open database connection
      $inquiryid=$_GET["inquiryid"];//retrieve inquiryid
      $result=queryResultSelect($openConnection,"SELECT * FROM Inquiry WHERE InquiryId=$inquiryid");//retrieve inquiries with that inquiry id
      if(mysqli_num_rows($result)>0){//checks if any rows were selected
       $row=mysqli_fetch_assoc($result);//retrieve record
       $inquiry->title=$row["Title"];//set title to an object
       $inquiry->description=$row["Description"];//set description to an object
       $inquiry->response=$row["Response"];//set response to an object
       echo json_encode($inquiry);//encode json to be parsed by javascript
      }
      CloseCon($openConnection);//close connection
    }
?>