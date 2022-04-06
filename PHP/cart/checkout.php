<?php
  require_once("../databaseconnection.php"); //database connection functionality
  session_start();//session start

  if(isset($_SESSION["inCart"]) && count($_SESSION["inCart"])!=0){//checks if there is anything in cart
    $openConnection=OpenCon();//opens connection
    $userid=$_SESSION["userid"];//retrive userid
    $total=$_SESSION["total"];//retrieve cart toal
    $date=date('Y-m-d H:i:s');//date
    $cart=$_SESSION["inCart"];//retrive array with list of items in cart
 	$stmt=mysqli_prepare($openConnection,"INSERT INTO Transactions (TotalPrice,UserId,Date) VALUES (?,?,?)");//insert transaction
    mysqli_stmt_bind_param($stmt,"dis",$total,$userid,$date);//binds variables to statement
    mysqli_stmt_execute($stmt);
    $result=queryResultSelect($openConnection, "SELECT MAX(TransactionId) as TransactionId FROM Transactions");//selects max id from transaction table
    if(mysqli_num_rows($result)>0){//checks if any rows were selected
      $row=mysqli_fetch_assoc($result);//fetch record
      $orderid=$row["TransactionId"];//retrieve transaction id
      echo $orderid;// echo max id
    }
    foreach($cart as $productid){//for each product
      $quantity=$_SESSION["'{$productid}'"];//retrieve quantity in cart
      $stmt=mysqli_prepare($openConnection,"INSERT INTO Sales (TransactionId,ItemId,Quantity) VALUES (?,?,?)");//insert how many bought in sales table
      mysqli_stmt_bind_param($stmt,"iii",$orderid,$productid,$quantity);
      mysqli_stmt_execute($stmt);        
      $result=queryResultSelect($openConnection, "SELECT Stock FROM Products WHERE ItemId=$productid");//select stock for item
      if(mysqli_num_rows($result)>0){//check if row was selected
      	$row=mysqli_fetch_assoc($result);//retrieve row
        $stock=$row["Stock"]-$quantity;//update stock
      }
      $stmt=mysqli_prepare($openConnection,"UPDATE Products SET Stock=? WHERE ItemId=?");//update stock for that item
      mysqli_stmt_bind_param($stmt,"ii",$stock,$productid);
      mysqli_stmt_execute($stmt);  
      unset($_SESSION["'{$productid}'"]);//unset item session variable
    }
    unset($_SESSION["total"]);//unset total session variable
    unset($_SESSION["inCart"]);//unset cart session variable
    CloseCon($openConnection);//clsoes connection
  }else{
    echo "empty";
  }
?>