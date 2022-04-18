<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();//start session
    if($_SESSION["isadmin"]){//check if admin is logged in
      $openConnection=OpenCon();//open database connection
      $itemid=$_GET["itemid"];//retrieve use if
      $result=queryResultSelect($openConnection,"SELECT * FROM Products WHERE itemid=$itemid");//retrieve product information with that item id
      if(mysqli_num_rows($result)>0){//checks if any rows were selected
       $row=mysqli_fetch_assoc($result);//record result
       $product->item=$row["Item"];//set item name to object
       $product->brand=$row["Brand"];//set brand to object
       $product->description=$row["ItemDesc"];//set item description to object
       $product->image=$row["ProductImage"];//set product image to object
       $product->price=$row["Price"];//set price to object
       $product->stock=$row["Stock"];//set stock to object
       $product->category=$row["CategoryId"];   //encode to json to be parsed by javascript 
       echo json_encode($product);
      }
      CloseCon($openConnection);//closes connection
    }
?>