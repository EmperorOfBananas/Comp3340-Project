<div class="container mb-5 pb-5">   
   <!--title-->
   <h2 class="text-center text-white bg-dark py-3">Website Color Schemes</h2> 
   <!--form, method post-->
   <form class="d-flex flex-column align-items-center" action="updatecolors.php" method="POST">
   <?php
     session_start();//start session
     if($_GET["updated"]){//checks if color scheme was updated
			echo '<div class="alert alert-success text-center">
            		Color Scheme Updated Successfully!
            	  </div>';
	  }
     
      if($_SESSION["isadmin"]){//checks if user is an admin
        echo '<div class="form-floating my-2">
        		<!--https://getbootstrap.com/docs/5.1/forms/select/-->
        		<!--select input field-->
                <select class="form-select form-select-lg" id="colors" name="colors" aria-label=".form-select-lg" required>
                	<!--options-->
                	<option value="" hidden>Select Color</option>
					<option value="dark">Dark</option>
       				<option value="red">Red</option>
                    <option value="blue">Blue</option>
        		</select>
                <label for="colors">Colors</label>
              </div>
              <!--submit button-->
              <button type="submit" onclick="changeColor()" class="mt-3 btn btn-dark">Update Color Scheme</button>';
      }  
    ?>
  </form>
</div>
<script src="../../JS/colorscheme.js"></script>