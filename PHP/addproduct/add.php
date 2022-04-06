<!--https://getbootstrap.com/docs/5.1/examples/sign-in/-->
<!--align items to center-->
<div class="form d-flex flex-column align-items-center my-3">
 <!--form, method post-->
 <form class="text-center p-3 my-auto border border-2 border-dark rounded-3" action="addproduct.php" method="POST">
   <h3 class="mb-3">Add Product</h3>
   <?php if($_GET["added"]){//checks if passwords did not match
			echo '<div class="alert alert-success text-center">
            		Product Added Successfully!
            	  </div>';
	  		}
    ?>
   <!--first name input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="item" maxlength="45" name="item" required>
      <label for="item">Item Name</label>
    </div>
   <!--last name input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="brand" maxlength="30" name="brand" required>
      <label for="brand">Brand</label>
    </div>
   <!--email input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="description" maxlength="100" name="description" required>
      <label for="description">Description</label>
    </div>
   <!--city input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="image" maxlength="250" name="image" required>
      <label for="image">Image</label>
    </div>
   <!--address input field-->
    <div class="form-floating mb-1">
      <input type="number" class="form-control" id="price" min=1 step="0.10" name="price" required>
      <label for="price">Price</label>
    </div>
   <!--postal code input field-->
    <div class="form-floating mb-1">
      <input type="number" class="form-control" id="stock" min="1" name="stock" required>
      <label for="stock">Stock</label>
    </div>
   <!--password input field-->
    <div class="form-floating">
      <select class="form-select form-select-lg my-1" id="categories" name="categories" aria-label=".form-select-lg example" required>
        <option value="1">Books</option>   
        <option value="2">Electronics</option>
        <option value="3">Home</option>
        <option value="4">Sports</option>   
        <option value="5">Toys</option>
      </select>
      <label for="categories">Categories</label>
    </div>
   <div class="d-flex flex-column align-items-center">
    <a href="../manageproducts/index.php" class="nav-link text-dark">Manage Products</a>
    <input class="btn btn-dark w-50 mb-2" type="submit" value="Add Product"/>
   </div>
  </form>
</div>