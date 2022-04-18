<?php
  require_once("../databaseconnection.php"); //functions for database connection
  session_start();//starts session
  $openConnection=OpenCon();//creates database connection
  echo '<div class="container">';
  if(isset($_GET["books"])){//checks if querying for books category
     //selects items of book category
     $result=queryResultSelect($openConnection, "SELECT * FROM Products INNER JOIN Categories ON Products.CategoryId=Categories.CategoryId WHERE Products.CategoryId=1");
     echo '<h2 class="text-center mb-4 bg-dark text-white py-3 mx-2">Books</h2>';//books title
  }else if(isset($_GET["electronics"])){//checks if querying for electronics category
     //selects items of electronics category
     $result=queryResultSelect($openConnection, "SELECT * FROM Products INNER JOIN Categories ON Products.CategoryId=Categories.CategoryId WHERE Products.CategoryId=2");    
  	 echo '<h2 class="text-center mb-4 bg-dark text-white py-3 mx-2">Electronics</h2>';//electronics title
  }else if(isset($_GET["home"])){//checks if querying for home category
     //selects items of home category
     $result=queryResultSelect($openConnection, "SELECT * FROM Products INNER JOIN Categories ON Products.CategoryId=Categories.CategoryId WHERE Products.CategoryId=3");    
  	  echo '<h2 class="text-center mb-4 bg-dark text-white py-3 mx-2">Home</h2>';//home title
  }else if(isset($_GET["sport"])){//checks if querying for sport category
     //selects items of sport category
     $result=queryResultSelect($openConnection, "SELECT * FROM Products INNER JOIN Categories ON Products.CategoryId=Categories.CategoryId WHERE Products.CategoryId=4");    
  	 echo '<h2 class="text-center mb-4 bg-dark text-white py-3 mx-2">Sports</h2>';//sports title
  }else if(isset($_GET["toy"])){//checks if querying for toy category
     //selects items of toy category
     $result=queryResultSelect($openConnection, "SELECT * FROM Products INNER JOIN Categories ON Products.CategoryId=Categories.CategoryId WHERE Products.CategoryId=5");    
     echo '<h2 class="text-center mb-4 bg-dark text-white py-3 mx-2">Toys</h2>';//toys title
  }else{
     $result=queryResultSelect($openConnection, "SELECT * FROM Products");//selects all items
      echo '<h2 class="text-center mb-4 bg-dark text-white py-3 mx-2">Shop</h2>';//shop title
  }
  $index=0;

  if(mysqli_num_rows($result)>0){//checks if any rows were selected
    echo '<div class="shopItems">
    		<div class="row">';
	while($row=mysqli_fetch_assoc($result)){//fetches records
      if($index==4){//checks if there are four items in a row
        echo '</div><div class="row">';//create new row
        $index=0;//reset index
      }
      echo '<div class="col col-12 col-sm-6 col-md-6 col-lg-3 my-2">
      			<!--https://getbootstrap.com/docs/5.1/components/card/-->
      			<div class="card mx-auto text-center shadow p-2" data-itemid="'.$row["ItemId"].'">
                  <!--card image-->
                  <img style="height:15rem;" class="card-img-top img-fluid" src="'.$row["ProductImage"].'" alt="'.$row["Item"].'">
                  <!--card body-->
                  <div class="card-body card-main-height">
                    <!--card link to product page-->
                    <a href="../details/index.php?itemid='.$row["ItemId"].'" class="nav-link card-title fw-bold text-dark">'.$row["Item"].'</a>
                    <!--item description-->
                    <p class="card-text text-dark">'.$row["ItemDesc"].'</p>
                  </div>
                  <!--list group-->
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">$'.$row["Price"].'</li>
                  </ul>
                  <div class="card-body">
                  	<!--add to cart-->
                    <input class="btn btn-dark" type="button"';
      				if(isset($_SESSION["userid"])){//checks if user is logged on
                      echo ' onclick="addToCart(this.name)"';//adds an onclick functionality
                    }else{
                      echo ' onclick="alertUser(this.name)"';//otherwise alert user
                    }
      			echo ' value="Add to cart" name="'.$row["ItemId"].'"/>
                  </div>
               </div>
      		</div>';
      		$index++;//increase index
    }
    if($index==3){//checks if odd index
      echo '<div class="col col-12 col-sm-6 col-md-6 col-lg-3 my-1"></div>';
    }
    echo '</div>
    </div>';
  }
 echo '</div>';
  CloseCon($openConnection);//closes connection
?>
<script src="../../JS/products.js"></script>