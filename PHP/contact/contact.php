<div class="container">
	<h2 class="text-center text-white bg-dark py-3">Contact Us</h2>
<?php
  session_start();//starts session
  if(isset($_SESSION["userid"])){//checks if user is logged in
    echo '<!--https://getbootstrap.com/docs/5.1/examples/sign-in/-->
          <form class="d-flex flex-column align-items-center py-3" action="inquiry.php" method="POST">
           <h3 class="my-4">Leave an Inquiry</h3>
           <!--title input field-->
            <div class="form-floating mb-2 w-50">
              <input type="text" class="form-control" id="title" maxlength="100" name="title" required>
              <label for="title">Title</label>
            </div>
            <div class="form-floating w-50">
              <!--textarea for inquiry-->
              <textarea class="form-control" id="formControlTextarea1" maxlength="250" name="description" rows="5" required></textarea>
              <label for="formControlTextarea1">Description</label>
            </div>
            <!--submit button-->
            <button type="submit" class="mt-3 btn btn-dark">Submit</button>          
           </form>';
  }else{
        echo '<div class="card my-5 py-5 shadow">
                <div class="card-body p-4">
                  <!--Cannot leave inquiry if not logged in-->
                  <h5 class="card-title text-center">Please log in to leave us an inquiry</h5>
                </div>
              </div>';    
  }
  
?>
</div>