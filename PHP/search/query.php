<?php
    require_once('../databaseconnection.php');//database connection functionality
	session_start();//start session
    $openConnection=OpenCon();//opens database connection
	$query=$_GET["query"];//retrieves query
	$result=queryResultSelect($openConnection,"SELECT * FROM Products WHERE Item LIKE '%{$query}%' OR ItemDesc LIKE '%{$query}%'");//queries for items that match query
    echo '<div class="container">
    		<h2 class="text-center text-white bg-dark py-3">Search Results</h2>';
	if(mysqli_num_rows($result)>0){    //checks if any rows were selected
      while($row=mysqli_fetch_assoc($result)){//retrieves records
          $id="'{$row["ItemId"]}'";//stringify itemid
          if(isset($_SESSION[$id])){//checks if session variable is set
            $quantity=$_SESSION[$id];//set quantity
          }else{
            $quantity=0;//if doesn't exist set it to 0
          }
          echo '<!--product details section-->
          		  <div class="row my-2 p-4 shadow text-center align-items-center" itemid="'.$row["ItemId"].'">
          			<div class="col col-3">
                    	<!--product image-->
                    	<img style="height:10rem" class="img-fluid w-100" src="'.$row["ProductImage"].'" alt="'.$row["Item"].'"/>
                    </div>
                    <div class="col col-6">
                    	<!--product information-->
                    	<div class="d-flex flex-column">
                        	<h5 class="mb-3 fw-bold fs-2">'.$row["Item"].'</h5>
                            <span class="mb-1">'.$row["ItemDesc"].'</span>
							<span>$'.$row["Price"].'</span>
                    	</div>
                    </div>
                    <div class="col col-3">
                    	<!--change item quantity in cart-->
                  		<input class="form-control mx-auto" type="number" onchange="validateQuantity(this)" min="1" max="'.$row["Stock"].'" value="'.$quantity.'"name="'.$row["ItemId"].'"/> 
                    </div>
          		  </div>';
      }
    }else{
        echo '<div class="card my-5 p-5">
                <div class="card-body p-4">
                  <!--no query results-->
                  <h5 class="card-title text-center">No Search Results</h5>
                </div>
              </div>';
    }
	echo "</div>";
    CloseCon($openConnection);//close database connection
?>
<script src="../../JS/details.js"></script>