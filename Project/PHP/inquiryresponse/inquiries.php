<!--https://getbootstrap.com/docs/5.1/examples/sign-in/-->
<div class="container">   
   <!--inquiry title-->
   <h2 class="text-center text-white bg-dark py-3">Respond to Inquiries</h2> 
  <!--form, method post-->
   <form class="d-flex flex-column align-items-center" action="updateinquiry.php" method="POST">
   <?php
      session_start();//start session
      if($_GET["updated"]){//checks if inquiry was updated
          echo '<div class="alert alert-success text-center">Inquiry Updated</div>';
      }
      if($_SESSION["isadmin"]){//checks if admin is logged in
        require_once("../databaseconnection.php");//database connection functionality
        $openConnection=OpenCon();//open database connection
        $result=queryResultSelect($openConnection,"SELECT * FROM Inquiry");//retrieve inquiries
        echo '<div class="form-floating my-2">
        		<!--https://getbootstrap.com/docs/5.1/forms/select/-->
        		<!--select input-->
                <select onchange="fillFields(this.value)" class="form-select form-select-lg" id="inquiries" name="inquiries" aria-label=".form-select-lg" required>';
        if(mysqli_num_rows($result)>0){//checks if any rows were selected
           echo '<!--options-->
           		 <option hidden value="">Select Inquiry</option>';
         while($row=mysqli_fetch_assoc($result)){
           echo '<option value="'.$row["InquiryId"].'">'.$row["InquiryId"].'. '.$row["Title"].'</option>';
         }
        }
        echo '	</select>
                <label for="inquiries">Inquiry</label>
              </div>';
       CloseCon($openConnection);
      }  
    ?>
    <div class="form-floating mb-2">
      <!--title input-->
      <input type="text" class="form-control" id="title" maxlength="100" name="title" required>
      <label for="title">Title</label>
    </div>
    <div class="form-floating mb-2">
      <!--textarea for inquiry, description-->
      <textarea class="form-control" id="description" maxlength="250" name="description" rows="5" required></textarea>
      <label for="description">Description</label>
    </div>
    <div class="form-floating">
      <!--textarea for inquiry, reponse-->
      <textarea class="form-control" id="response" maxlength="400" name="response" rows="5" required></textarea>
      <label for="response">Response</label>
    </div>
     <!--submit button-->
     <button type="submit" class="mt-3 btn btn-dark">Submit</button>    
  </form>
</div>
<script src="../../JS/inquiry.js"></script>