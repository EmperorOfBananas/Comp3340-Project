<!--container-->
<div class="container mb-5 pb-1">
  <h2 class="text-center text-white py-3 bg-dark">Manage Products</h2>
  <!--form, method post-->
  <form class="d-flex flex-column align-items-center mt-4 mb-5" action="index.php" method="POST">
    <?php include "delete.php"; ?>
    <?php include "disable.php";?>
    <div class="form-floating">
      <!--https://getbootstrap.com/docs/5.1/forms/select/-->
      <select class="form-select form-select-lg my-1" id="operation" name="operation" aria-label=".form-select-lg" required>
        <!--options-->
        <option value="" hidden>Select Operation</option>
        <option value="View">View</option>   
        <option value="Delete">Delete</option>
      </select>
      <label for="operation">Operation</label>
    </div>
  <?php
    session_start();//start session
    if($_SESSION["isadmin"]){//check if admin is logged in
      require_once("../databaseconnection.php");//database connection functionality
      $openConnection=OpenCon();//open database connection
      $result=queryResultSelect($openConnection,"SELECT ItemId, Item FROM Products");//retrieve all products
      echo '<div class="form-floating">
      		  <!--https://getbootstrap.com/docs/5.1/forms/select/-->
              <select class="form-select form-select-lg my-1" id="products" name="products" aria-label=".form-select-lg" required>';
      if(mysqli_num_rows($result)>0){//checks if any rows were selected
         echo '<!--options-->
         	   <option value="ViewAll">View All Products</option>';
       while($row=mysqli_fetch_assoc($result)){//retrieve records
         echo '<option value="'.$row["ItemId"].'">'.$row["ItemId"].'. '.$row["Item"].'</option>';
       }
      }
      echo '	</select>
              <label for="products">Products</label>
            </div>
            <!--submit button-->
            <input class="btn btn-dark my-2" type="submit" value="Submit"/>
            <div class="d-flex">
              <!--add new product page-->
              <a href="../addproduct/index.php"class="nav-link text-dark">Add New Product</a>
              <!--update record product page-->
              <a href="../updateproduct/index.php"class="nav-link text-dark">Update Product Record</a>
            </div>';
     CloseCon($openConnection);//close connection
    }  
  ?>
  </form>
<?php include "view.php"; ?>
</div>