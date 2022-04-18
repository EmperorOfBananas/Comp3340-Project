<!--https://getbootstrap.com/docs/5.1/examples/sign-in/-->
<div class="container">   
   <!--inquiries title-->
   <h2 class="text-center text-white bg-dark py-3">Your Inquiries</h2> 
   <div class="d-flex flex-column align-items-center">
   <?php
      session_start();//start session

      if(isset($_SESSION["userid"])){//check if user is logged in
        require_once("../databaseconnection.php");//database connection functionality
        $openConnection=OpenCon();//open database connection
        $userid=$_SESSION["userid"];//retrieve user id
        $result=queryResultSelect($openConnection,"SELECT * FROM Inquiry WHERE UserId=$userid");//retrieve inquiries for that user
        echo '<div class="form-floating my-2">
        		<!--https://getbootstrap.com/docs/5.1/forms/select/-->
        		<!--select input-->
                <select onchange="fillFields(this.value)" class="form-select form-select-lg" id="inquiries" name="inquiries" aria-label=".form-select-lg" required>
                	<!--options for select-->
                    <option value="" hidden>Select Inquiry</option>';
        if(mysqli_num_rows($result)>0){//checks if any rows were selected
         while($row=mysqli_fetch_assoc($result)){
           echo '<option value="'.$row["InquiryId"].'">'.$row["InquiryId"].'. '.$row["Title"].'</option>';
         }
        }
        echo '	</select>
                <label for="inquiries">Inquiries</label>
              </div>';
       CloseCon($openConnection);//closes connection
      }  
    ?>
     <!--title input field-->
    <div class="form-floating mb-2">
      <input type="text" class="form-control" id="title" maxlength="100" name="title" required>
      <label for="title">Title</label>
    </div>
    <div class="form-floating mb-2">
      <!--textarea for inquiry, description-->
      <textarea class="form-control" id="description" maxlength="250" name="description" rows="5" required></textarea>
      <label for="description">Description</label>
    </div>
    <div class="form-floating">
      <!--textarea for inquiry-->
      <textarea class="form-control" id="response" maxlength="400" name="response" rows="5" required></textarea>
      <label for="response">Response</label>
    </div>
  </div>
</div>
<script src="../../JS/inquiry.js"></script>