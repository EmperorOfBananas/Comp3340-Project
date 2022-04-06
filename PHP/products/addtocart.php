<?php
  require_once("../databaseconnection.php"); //functionsfor database connection
  session_start();//start session
  $openConnection=OpenCon();//create database connection
  $itemid=intval($_GET['itemid']);//retrieve itemid
  $result=queryResultSelect($openConnection, "SELECT Item,Stock,ItemId FROM Products WHERE ItemId={$itemid}");//Retrieve item name and stock of item
 //check if any results were returned
  if(mysqli_num_rows($result)>0){
	$row=mysqli_fetch_assoc($result);//fetch results
    $id="'{$itemid}'";//stringify itemid
     if(isset($_SESSION[$id])){//check if session has quantity set for this item
      if($row["Stock"]>$_SESSION[$id]){//check if quantity of item in cart does not exceed what is in stock
        $_SESSION[$id]+=1;//increment quantity
        $quantity=$_SESSION[$id];
        echo "<div class='alert alert-dark text-center' product='{$row['ItemId']}'>Item added: {$row['Item']}, In Cart: {$quantity}</div>";//prints how many of this item is in cart
      }else{
        $quantity=$_SESSION[$id];
		echo "<div class='alert alert-dark text-center' product='{$row['ItemId']}'>Item cannot be added: {$row['Item']}, In Cart: {$quantity}</div>";//Item cannot be added message
      }
    }else{
      $_SESSION[$id]=1; //sets session for current item
      $quantity=$_SESSION[$id];
      echo "<div class='alert alert-dark text-center' product='{$row['ItemId']}'>Item added: {$row['Item']}, In Cart: {$quantity}</div>";//prints how many of this item is in cart
	  $_SESSION["inCart"][$id]=$itemid;//set session inCart variable to contain the value of the itemid
    }
  }

  CloseCon($openConnection);
?>