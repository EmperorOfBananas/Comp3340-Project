<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();
    if($_SESSION["isadmin"]){
      $openConnection=OpenCon();//open database connection
      $itemid=$_GET["itemid"];
      $result=queryResultSelect($openConnection,"SELECT * FROM Products WHERE itemid=$itemid");//retrieve email to check if user with that email already exists
      if(mysqli_num_rows($result)>0){//checks if any rows were selected
       $row=mysqli_fetch_assoc($result);
       $product->item=$row["Item"];
       $product->brand=$row["Brand"];
       $product->description=$row["ItemDesc"];
       $product->image=$row["ProductImage"];
       $product->price=$row["Price"];
       $product->stock=$row["Stock"];
       $product->category=$row["CategoryId"];          
       echo json_encode($product);
      }
      CloseCon($openConnection);
    }
?>