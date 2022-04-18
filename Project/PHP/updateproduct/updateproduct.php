<?php
	require_once("../databaseconnection.php");//database connection functionality
	$openConnection=OpenCon();//open database connection
	$item=$_POST["item"];//retrieve item name
    $brand=$_POST["brand"];//retrieve brand
    $description=$_POST["description"];//retrieve description
    $image=$_POST["image"];//retrieve image
    $price=$_POST["price"];//retrieve price
    $stock=$_POST["stock"];//retrieve stock
    $categories=$_POST["categories"];//retrieve category id
	$itemid=$_POST["products"];//retrieve product id
	//insert new record
     $stmt=mysqli_prepare($openConnection,"UPDATE Products SET Item=?,Brand=?,ItemDesc=?,ProductImage=?,Price=?,Stock=?,CategoryId=? WHERE ItemId=?");
     mysqli_stmt_bind_param($stmt,"ssssdiii",$item,$brand,$description,$image,$price,$stock,$categories,$itemid);
     mysqli_stmt_execute($stmt);
   
	CloseCon($openConnection);//closes connection
	header('Refresh:1;  url=index.php?updated=1');//redirect
?>