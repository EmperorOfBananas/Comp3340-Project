<html>
	<?php
  		try{
            //connect to db  
    		$connect = "mysql:host=localhost;dbname=stefan3_Web3340";
    		$user = "stefan3_Web3340";
    		$pass = "test";

    		$pdo = new PDO($connect, $user, $pass);
    		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            //if all form inputs have been given and the user does not wish to view the products list
    		if(!empty($_POST["function"])&&!empty($_POST["id"])&&!empty($_POST["item"])&&
    		!empty($_POST["brand"])&&!empty($_POST["desc"])&&!empty($_POST["price"])&&
            !empty($_POST["stock"])&&!empty($_POST["image"])&&!empty($_POST["category"])&&$_POST["function"]!="View"){
                //if the user wishes to add a new product
        		if($_POST["function"] == "Add"){
            		$sql = "INSERT INTO Products VALUES (".$_POST["id"].",'".$_POST["item"]."','".$_POST["brand"]."','".$_POST["desc"].$_POST["image"]."',".$_POST["price"].",".$_POST["stock"].$_POST["category"].");";
            		$result = $pdo->query($sql);
            		$pdo = null;
        		}
                //if the user wishes to edit an existing product
        		else if($_POST["function"] == "Edit"){
                    $sql = "UPDATE Products SET Item = '".$_POST["item"]."', Brand = '".$_POST["brand"]."', ItemDesc = '".$_POST["desc"]."', ProductImage = 'assets/".$_POST["id"]."', Price = ".$_POST["price"].", Stock = ".$_POST["stock"].", CategoryId = ".$_POST["category"]." WHERE ItemId = ".$_POST["id"].";";
                    $result = $pdo->query($sql);
            		$pdo = null;
        		}
    		}
            //if the user wishes to delete a product
            else if($_POST["function"] == "Remove" && !empty($_POST["id"])){
                $sql = "DELETE FROM Products WHERE ItemId = ".$_POST["id"].";";
                $result = $pdo->query($sql);
                $pdo = null;
            }
            //if the user wishes to view the database
    		else if($_POST["function"]=="View"){
                //if the id entry is not empty, they will only view the data pertaining to the specified item
                if(!empty($_POST["id"])){
                    $sql = "SELECT * FROM Products WHERE ItemId = ".$_POST["id"].";";
                }
                //else they will view the entire db
                else{
                    $sql = "SELECT * FROM Products";
                }
                //print the rows in result
        		$result = $pdo->query($sql);
        		echo 'Item Id'." - ".'Item'." - ".'Brand'." - ".'Asset Link'." - ".'Price'." - ".'Stock'.'Category'."<br/>";
        		while($row = $result->fetch()){
					$cIdSQL = "SELECT name FROM Category WHERE CategoryId = ".$_POST['category'].";";//use the category id to find the category name
					$cId = $pdo->query($cIdSQL);
            		echo $row['ItemId']." - ".$row['Item']." - ".$row['Brand']." - ".$row['ItemDesc']." - ".$row['ProductImage']." - $".$row['Price']." - ".$row['Stock']." - ".$cId."<br/>";
        		}
        		$pdo = null;
    		}
    	}
        //error handeling
    	catch(PDOException $e){
        	die($e->getMessage());
    	}  
	?> 
	<head>
    	<title>Product Manager</title>
        <meta name="author" content="Juan Villalobos">
        <meta name="date posted" content="01/04/2022">
    </head>
	<body>
        <!--Product Manager Form, Includes a dropdown menu as well as sufficient input boxes to create more items. Does not take the image location, however, that is auto generated in the lines of code above.
    This does however mean that, image assets must later be manually loaded into the assets folder-->
    	<form action="productmanager.php" method="POST">
        	<label for="function">Function:</label>
        	<select name="function" id="function">
            	<option value="Add">Add</option>
            	<option value="Edit">Edit</option>
                <option value="Remove">Remove</option>
            	<option value="View">View</option>
      		<p>ItemID: <input type="text" name="id" value=""></p>
      		<p>Item: <input type="text" name="item" value=""></p>
      		<p>Brand: <input type="text" name="brand" value=""></p>
        	<p>ItemDesc: <input type="text" name="desc" value=""></p>
        	<p>Price: <input type="text" name="price" value=""></p>
        	<p>Stock: <input type="text" name="stock" value=""></p>
			<p>Image link: <input type="text" name="image" value=""></p>
			<p>Category ID: <input type="text" name="category" value=""></p>
      		<input type="submit" name="submit" value="Submit">
      		<input type="reset" name="clear" value="Clear">
    	</form>
		<form action="admin.html" method="GET">
      			<input type="submit" name="AM" value="Back to Admin Manager">
    	</form>
    </body>     
</html>