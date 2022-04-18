<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();//start session

	if($_SESSION["isadmin"]){	//check if an admin is logged in
      $openConnection=OpenCon();//opens database connection
      $operation=$_POST["operation"];//retrieve operation
      $itemid=$_POST["products"];//retrieve product id
      if($operation=="View"){//check if admin wants to view product
        if($itemid=="ViewAll"){//check if admin wants to view all products
          //select all products
          $result=queryResultSelect($openConnection,"SELECT * FROM Products INNER JOIN Categories ON Products.CategoryId=Categories.CategoryId");
        }else{
          //select a product
          $result=queryResultSelect($openConnection,"SELECT * FROM Products INNER JOIN Categories ON Products.CategoryId=Categories.CategoryId WHERE ItemId=$itemid");
        }
    	if(mysqli_num_rows($result)>0){//check if row was selected
          	echo '<h5 class="text-center text-white bg-dark py-3">Products</h5>
            	  <div class="table-responsive">
                  <!--https://getbootstrap.com/docs/5.1/content/tables/-->
                  <table class="table">
                    <thead>
                      <!--table row-->
                      <tr>
                      	<!--table headings-->
                        <th scope="col">Item ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Category</th>
                      </tr>
                     </thead>';
     		while($row=mysqli_fetch_assoc($result)){//retrieve record
              echo '<tr>
              			<!--table columns-->
                        <td>'.$row["ItemId"].'</td>
              			<td><img style="height:5rem;" src="'.$row["ProductImage"].'" alt='.$row["Item"].'/></td>
                        <td>'.$row["Item"].'</td>
                        <td>'.$row["Brand"].'</td>
                        <td>'.$row["ItemDesc"].'</td>
                        <td>'.$row["Price"].'</td>
                        <td>'.$row["Stock"].'</td>
                        <td>'.$row["name"].'</td>
              		</tr>';
            }    
           echo "</table>
           		 </div>";
        } 
      }
      CloseCon($openConnection);//closes connection
    }
?>