<?php
	require_once("../databaseconnection.php");//database connection functionality
	$openConnection=OpenCon();//open database connection
	$item=$_POST["item"];//retrieve item name
    $brand=$_POST["brand"];//retrieve brand
    $description=$_POST["description"];//retrieve description
    $image=$_POST["image"];//retrieve image link
    $price=$_POST["price"];//retrieve price
    $stock=$_POST["stock"];//retrieve stock
    $categories=$_POST["categories"];//retrieve categories
	//insert new record
     $stmt=mysqli_prepare($openConnection,"INSERT INTO Products (Item,Brand,ItemDesc,ProductImage,Price,Stock,CategoryId) VALUES (?,?,?,?,?,?,?)");
     mysqli_stmt_bind_param($stmt,"ssssdii",$item,$brand,$description,$image,$price,$stock,$categories);
     mysqli_stmt_execute($stmt);
   
	CloseCon($openConnection);//closes connection
	header('Refresh:1;  url=index.php?added=1');//redirect
?>