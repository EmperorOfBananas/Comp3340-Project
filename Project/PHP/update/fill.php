<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();//start session
    if($_SESSION["isadmin"]){//check if admin is logged in
      $openConnection=OpenCon();//open database connection
      $userid=$_GET["userid"];//retrieve user id
      $result=queryResultSelect($openConnection,"SELECT * FROM UserAdmin WHERE userid=$userid");//retrieve user records
      if(mysqli_num_rows($result)>0){//checks if any rows were selected
       $row=mysqli_fetch_assoc($result);
       $user->fname=$row["FirstName"];//set first name to object
       $user->lname=$row["LastName"];//set last name to object
       $user->email=$row["Email"];//set email to object
       $user->city=$row["City"];//set city to object
       $user->address=$row["Address"];//set address to object
       $user->postal=$row["PostalCode"];//set postal code to object
       $user->password=$row["Password"];//set password to object
       $user->isadmin=$row["AdminFlag"];//set admin flag to object        
       $user->isdisabled=$row["isDisabled"]; //set is disabled to object    
       echo json_encode($user);//encode to json to be parsed by javascript
      }
      CloseCon($openConnection);//closes connection
    }
?>