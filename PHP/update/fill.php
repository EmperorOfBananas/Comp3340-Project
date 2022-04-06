<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();
    if($_SESSION["isadmin"]){
      $openConnection=OpenCon();//open database connection
      $userid=$_GET["userid"];
      $result=queryResultSelect($openConnection,"SELECT * FROM UserAdmin WHERE userid=$userid");//retrieve email to check if user with that email already exists
      if(mysqli_num_rows($result)>0){//checks if any rows were selected
       $row=mysqli_fetch_assoc($result);
       $user->fname=$row["FirstName"];
       $user->lname=$row["LastName"];
       $user->email=$row["Email"];
       $user->city=$row["City"];
       $user->address=$row["Address"];
       $user->postal=$row["PostalCode"];
       $user->password=$row["Password"];       
       $user->isadmin=$row["AdminFlag"];        
       $user->isdisabled=$row["isDisabled"];     
       echo json_encode($user);
      }
      CloseCon($openConnection);
    }
?>