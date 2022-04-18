<?php 
  require_once("databaseconnection.php"); //database connection functionality
  session_start();//session start

  $openConnection=OpenCon();//opens connection
  $result=queryResultSelect($openConnection, "SELECT ColorScheme FROM UserAdmin WHERE UserId=1");//selects color scheme of main admin
  if(mysqli_num_rows($result)>0){//checks if any rows were selected
    $row=mysqli_fetch_assoc($result);//fetch record
    echo $row["ColorScheme"];//retrieve color scheme 
  }

  CloseCon($openConnection);//closes connection  
?>