<?php
  require_once("../databaseconnection.php"); 
  session_start();
  
  if(isset($_SESSION["userid"])){
    $openConnection=OpenCon();
    $rating=intval($_POST["rating"]);
    $description=$_POST["description"];
    $userid=$_SESSION["userid"];
    $itemid=intval($_GET["itemid"]);
    $stmt=mysqli_prepare($openConnection,"INSERT INTO Reviews (UserId,ItemId,Rating,Description) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($stmt,"iiis",$userid,$itemid,$rating,$description);
    mysqli_stmt_execute($stmt);    
    CloseCon($openConnection);
  }
  header("Refresh:1;  url=index.php?itemid=$itemid");

?>