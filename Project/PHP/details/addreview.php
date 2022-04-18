<?php
  require_once("../databaseconnection.php"); //database connection functionality
  session_start();//starts session
  
  if(isset($_SESSION["userid"])){//checks if user is logged in
    $openConnection=OpenCon();//opens database connection
    $rating=intval($_POST["rating"]);//retrieves rating
    $description=$_POST["description"];//retrieve description
    $userid=$_SESSION["userid"];//retrieve user id
    $itemid=intval($_GET["itemid"]);//retrieve item id
    //insert review into table
    $stmt=mysqli_prepare($openConnection,"INSERT INTO Reviews (UserId,ItemId,Rating,Description) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($stmt,"iiis",$userid,$itemid,$rating,$description);
    mysqli_stmt_execute($stmt);    
    CloseCon($openConnection);
  }
  header("Refresh:1;  url=index.php?itemid=$itemid");//redirect

?>