<!--https://getbootstrap.com/docs/5.1/examples/sign-in/-->
<!--align items to center-->
<div class="form d-flex flex-column align-items-center my-3">
 <!--form, method post-->
 <form class="text-center p-3 my-auto border border-2 border-dark rounded-3" action="addproduct.php" method="POST">
   <!--title-->
   <h3 class="mb-3 text-dark">Add Product</h3>
   <?php if($_GET["added"]){//checks if product was added
			echo '<div class="alert alert-success text-center">
            		Product Added Successfully!
            	  </div>';
	  		}
    ?>
   <!--item name input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="item" maxlength="45" name="item" required>
      <label for="item">Item Name</label>
    </div>
   <!--Brand input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="brand" maxlength="30" name="brand" required>
      <label for="brand">Brand</label>
    </div>
   <!--Description input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="description" maxlength="100" name="description" required>
      <label for="description">Description</label>
    </div>
   <!--image link input field-->
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="image" maxlength="250" name="image" required>
      <label for="image">Image</label>
    </div>
   <!--price input field-->
    <div class="form-floating mb-1">
      <input type="number" class="form-control" id="price" min=1 step="0.10" name="price" required>
      <label for="price">Price</label>
    </div>
   <!--stock input field-->
    <div class="form-floating mb-1">
      <input type="number" class="form-control" id="stock" min="1" name="stock" required>
      <label for="stock">Stock</label>
    </div>
   <!--categories select-->
    <div class="form-floating">
      <!--https://getbootstrap.com/docs/5.1/forms/select/-->
      <select class="form-select form-select-lg my-1" id="categories" name="categories" aria-label=".form-select-lg" required>
        <!--options-->
        <option value="" hidden>Select Category</option>   
        <option value="1">Books</option>   
        <option value="2">Electronics</option>
        <option value="3">Home</option>
        <option value="4">Sports</option>   
        <option value="5">Toys</option>
      </select>
      <label for="categories">Categories</label>
    </div>
   <div class="d-flex flex-column align-items-center">
    <!--link to go back to manage products page-->
    <a href="../manageproducts/index.php" class="nav-link text-dark">Manage Products</a>
    <!--submit button-->
    <input class="btn btn-dark w-50 mb-2" type="submit" value="Add Product"/>
   </div>
  </form>
</div>