<?php
  require_once("../databaseconnection.php"); //database connection functionality
  session_start();//start session
  
  if(isset($_GET["itemid"])){//checks if itemid is set 
    $openConnection=OpenCon();//opens database connection
    $itemid=intval($_GET["itemid"]);//retrieve itemid
    $id="'{$itemid}'";//stringify itemid
    if(isset($_SESSION[$id])){//checks if session variable is set
      $quantity=$_SESSION[$id];//set quantity
    }else{
      $quantity=0;//if doesn't exist set it to 0
    }
    $result=queryResultSelect($openConnection, "SELECT * FROM Products WHERE ItemId=$itemid");//retrieve information on item
    if(mysqli_num_rows($result)>0){//checks if any of rows have been selected
      $row=mysqli_fetch_assoc($result);//retrieve records
          echo '<div class="container">
          		  <!--product details section-->
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
          		  </div>
                </div>';
    }
    CloseCon($openConnection);//close connection
  }

?>

<script src="../../JS/details.js"></script>