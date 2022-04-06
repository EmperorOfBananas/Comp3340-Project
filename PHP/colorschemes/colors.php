<div class="container">   
   <h2 class="text-center text-white bg-dark py-3">Website Color Schemes</h2> 
   <form class="d-flex flex-column align-items-center" action="updatecolors.php" method="POST">
   <?php
     session_start();
     if($_GET["updated"]){//checks if passwords did not match
			echo '<div class="alert alert-success text-center">
            		Color Scheme Updated Successfully!
            	  </div>';
	  }
     
      if($_SESSION["isadmin"]){
        echo '<div class="form-floating my-2">
                <select class="form-select form-select-lg" id="colors" name="colors" aria-label=".form-select-lg example" required>
					<option value="dark">Dark</option>
       				<option value="red">Red</option>
                    <option value="blue">Blue</option>
        		</select>
                <label for="colors">Colors</label>
              </div>
              <button type="submit" class="mt-3 btn btn-dark">Update Color Scheme</button>';
      }  
    ?>

  </form>
</div>