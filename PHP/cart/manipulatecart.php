<?php
  require_once("../databaseconnection.php"); //database connection functionality
  session_start();//start session
  $openConnection=OpenCon();//creates database connection
  $itemid=intval($_GET['itemid']);//retrieve itemid of product
  $quantity=intval($_GET['quantity']);//retrieves quantity
  $id="'{$itemid}'";//stringify itemid
 $result=queryResultSelect($openConnection, "SELECT Price FROM Products WHERE ItemId=$itemid");//retrieve price of item
  if(mysqli_num_rows($result)>0){//checks if any rows were selected
  	$row=mysqli_fetch_assoc($result);//retrieve record
    $price=$row["Price"];//retrive record price
  }

  if(isset($_SESSION["inCart"][$id])){//checks if cart session variable is set
    if(isset($_GET['remove'])){//checks if remove is set
      $_SESSION["total"]-=$price*$_SESSION[$id];//recalculates total
      unset($_SESSION[$id]);//unsets session variable
      unset($_SESSION["inCart"][$id]);//unset session cart variable for item
      if(count($_SESSION["inCart"])==0){//if cart is empty set total to 0
        $_SESSION["total"]=0;
      }
    }else if(isset($_SESSION[$id])){//check if session variable is set for item
      if($quantity>$_SESSION[$id]){//checks if quantity is greater than current value in cart
         $quantityDiff=$quantity-$_SESSION[$id];//calculates quantity difference
         $_SESSION["total"]+=$price*$quantityDiff;//recaculates total
      }else if($quantity<$_SESSION[$id]){//checks if quantity is less than current value in cart
         $quantityDiff=$_SESSION[$id]-$quantity;//calculates quantity difference
         $_SESSION["total"]-=$price*$quantityDiff;//recalculates total
      }
      $_SESSION[$id]=$quantity;
    }
  }
  echo $_SESSION["total"];//print total
  CloseCon($openConnection);//close connection
?>