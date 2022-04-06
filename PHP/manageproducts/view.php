<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();

	if($_SESSION["isadmin"]){	
      $openConnection=OpenCon();//opens database connection
      $operation=$_POST["operation"];
      $itemid=$_POST["products"];
      if($operation=="View"){
        if($itemid=="ViewAll"){
          $result=queryResultSelect($openConnection,"SELECT * FROM Products INNER JOIN Categories ON Products.CategoryId=Categories.CategoryId");
        }else{
          $result=queryResultSelect($openConnection,"SELECT * FROM Products INNER JOIN Categories ON Products.CategoryId=Categories.CategoryId WHERE ItemId=$itemid");
        }
    	if(mysqli_num_rows($result)>0){//check if row was selected
          	echo '<h5 class="text-center text-white bg-dark py-3">Products</h5>
            	  <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
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
      CloseCon($openConnection);
    }
?>