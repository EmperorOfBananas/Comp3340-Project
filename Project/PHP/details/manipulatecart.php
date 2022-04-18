<?php
  require_once("../databaseconnection.php"); //database connection functionality
  session_start();//start session
  if(isset($_SESSION["userid"])){//check if user is logged in
    $openConnection=OpenCon();//start database connection
    $itemid=intval($_GET['itemid']);//retrieve item id
    $id="'{$itemid}'";//stringify itemid
   $result=queryResultSelect($openConnection, "SELECT Price FROM Products WHERE ItemId=$itemid");//retrieve item price
    if(mysqli_num_rows($result)>0){//checks if any results were returned
      $row=mysqli_fetch_assoc($result);//retrieves record
      $price=$row["Price"];//retrieves price of item
    }

    if(isset($_SESSION["inCart"][$id])){//checks if item is in the cart
      $quantity=intval($_GET['quantity']);//retrieve quantity of item
      if(isset($_SESSION[$id])){//check if item is part of the session
        $_SESSION[$id]=$quantity;
      }
    }else{
        $_SESSION[$id]=1;//set item with session variable
        $_SESSION["inCart"][$id]=$itemid;//set item to cart session variable
      }
    CloseCon($openConnection);//close connection
  }
?>