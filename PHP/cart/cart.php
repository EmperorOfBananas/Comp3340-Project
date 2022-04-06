<?php
  require_once("../databaseconnection.php"); //database connection functionality
  session_start();//starts session
  $openConnection=OpenCon();//opens database connection
  $total=0;//begins total at 0
  if($_GET["checkoutCompleted"]){//checks if chekcout is complete
   echo '<div class="alert alert-success text-center">Checkout was successful!</div>'; 
  }
  echo '<div class="container">
  		<!--cart title-->
        <h2 class="text-center bg-dark py-3 text-white">Cart</h2>';
  if(isset($_SESSION["inCart"]) && count($_SESSION["inCart"])!=0){//checks if cart is empty
    $cart=$_SESSION["inCart"];//retrieve array of itmems
    foreach($cart as $item){   //for each item in cart
        $result=queryResultSelect($openConnection, "SELECT * FROM Products WHERE ItemId=$item");//retrieve item information
        if(mysqli_num_rows($result)>0){//checks if row was selected
          $row=mysqli_fetch_assoc($result);//retrieve row record
          $quantity=$_SESSION["'{$item}'"];//gets quantity in cart
          $total+=$quantity*$row["Price"];//add it to total
          echo '<div class="row my-2 p-3 shadow text-center align-items-center" itemid="'.$row["ItemId"].'">
          			<div class="col col-3">
                    	<!--product image-->
                    	<img style="height:10rem" class="img-fluid w-100" src="'.$row["ProductImage"].'" alt="'.$row["Item"].'"/>
                    </div>
                    <div class="col col-6">
                    	<div class="d-flex flex-column">
                        	<!--product name-->
                        	<h5 class="mb-4">'.$row["Item"].'</h5>
                            <!--change quantity-->
                    		<input class="form-control mx-auto w-50" type="number" onchange="validateQuantity(this)" min="1" max="'.$row["Stock"].'" value="'.$quantity.'"name="'.$row["ItemId"].'"/> 
                            <span>x</span> 
                            <!--item price-->
                            <span>$'.$row["Price"].'</span>
                    	</div>
                    </div>
                    <div class="col col-3">
                    	<!--remove item from cart-->
                    	<i class="fa-solid fa-trash-can" onclick="removeItem(this)" title="'.$row["ItemId"].'"></i>
                    </div>
          		</div>';
        }
    }
    $_SESSION["total"]=$total;//set total
  }else{
    echo '<div class="row shadow text-center my-5 py-5">
    		<!--cart is empty-->
            <div class="col"><i class="fa-solid fa-bag-shopping"></i> Cart is empty</div>
          </div>';
  }
    echo '<div class="row my-4">
            <div class="col col-sm-6 col-md-8 col-lg-8"></div>
            <!--total price-->
            <div class="total text-end col col-sm-3 col-md-2 col-lg-2">Subtotal: $'. $total.'</div>
            <div class="col col-sm-3 col-md-2 col-lg-2"><input class="btn btn-dark" ';
		if(isset($_SESSION["userid"])){//checks if user is logged in
			echo 'onclick="checkout()" '; //allow checkout
        }
		echo 'type="button" value="Checkout"/></div>
          </div>
        </div>';
  CloseCon($openConnection);//closes connection
?>
<script src="../../JS/cart.js"></script>