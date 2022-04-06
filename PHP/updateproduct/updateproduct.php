<?php
	require_once("../databaseconnection.php");//database connection functionality
	$openConnection=OpenCon();//open database connection
	$item=$_POST["item"];//retrieve first name
    $brand=$_POST["brand"];//retrieve last name
    $description=$_POST["description"];//retrieve email
    $image=$_POST["image"];//retrieve city
    $price=$_POST["price"];//retrieve address
    $stock=$_POST["stock"];//retrieve postal code
    $categories=$_POST["categories"];//retrieve password
	$itemid=$_POST["products"];
	//insert new record
     $stmt=mysqli_prepare($openConnection,"UPDATE Products SET Item=?,Brand=?,ItemDesc=?,ProductImage=?,Price=?,Stock=?,CategoryId=? WHERE ItemId=?");
     mysqli_stmt_bind_param($stmt,"ssssdiii",$item,$brand,$description,$image,$price,$stock,$categories,$itemid);
     mysqli_stmt_execute($stmt);
   
	CloseCon($openConnection);//closes connection
	header('Refresh:1;  url=index.php?updated=1');//redirect
?>