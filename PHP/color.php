<?php
  require_once("databaseconnection.php"); //database connection functionality
  session_start();//session start

  $openConnection=OpenCon();//opens connection
  $result=queryResultSelect($openConnection, "SELECT ColorScheme FROM UserAdmin WHERE UserId=1");//selects max id from transaction table
  if(mysqli_num_rows($result)>0){//checks if any rows were selected
    $row=mysqli_fetch_assoc($result);//fetch record
    echo $row["ColorScheme"];//retrieve transaction id    
  }
  CloseCon($openConnection);//clsoes connection
  
?>