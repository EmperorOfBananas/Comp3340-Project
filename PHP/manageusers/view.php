<?php
    require_once("../databaseconnection.php");//database connection functionality
    session_start();

	if($_SESSION["isadmin"]){	
      $openConnection=OpenCon();//opens database connection
      $operation=$_POST["operation"];
      $userid=$_POST["users"];
      if($operation=="View"){
        if($userid=="ViewAll"){
          $result=queryResultSelect($openConnection,"SELECT * FROM UserAdmin");
          $result2=queryResultSelect($openConnection,"SELECT * FROM Transactions");
          $result3=queryResultSelect($openConnection,"SELECT * FROM Reviews");
          $result4=queryResultSelect($openConnection,"SELECT * FROM Inquiry");//retrieve record user with that email
        }else{
          $result=queryResultSelect($openConnection,"SELECT * FROM UserAdmin WHERE UserId=$userid");
          $result2=queryResultSelect($openConnection,"SELECT * FROM Transactions WHERE UserId=$userid");
          $result3=queryResultSelect($openConnection,"SELECT * FROM Reviews WHERE UserId=$userid");
          $result4=queryResultSelect($openConnection,"SELECT * FROM Inquiry WHERE UserId=$userid");//retrieve record user with that email
        }
    	if(mysqli_num_rows($result)>0){//check if row was selected
          	echo '<h5 class="text-center text-white bg-dark py-3">User</h5>
            	  <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">City</th>
                        <th scope="col">Address</th>
                        <th scope="col">Postal Code</th>
                      </tr>
                     </thead>';
     		while($row=mysqli_fetch_assoc($result)){//retrieve record
              echo '<tr>
                        <td>'.$row["UserId"].'</td>
              			<td>'.$row["FirstName"].'</td>
                        <td>'.$row["LastName"].'</td>
                        <td>'.$row["Email"].'</td>
                        <td>'.$row["City"].'</td>
                        <td>'.$row["Address"].'</td>
                        <td>'.$row["PostalCode"].'</td>
              		</tr>';
            }    
           echo "</table>
           		 </div>";
        }
        
    	if(mysqli_num_rows($result2)>0){//check if row was selected
           	echo '<h5 class="text-center text-white bg-dark py-3">Transactions</h5>
                  <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Transaction #</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Date</th>
                      </tr>
                     </thead>';         
     		while($row=mysqli_fetch_assoc($result2)){//retrieve record
              echo '<tr>
              			<td>'.$row["TransactionId"].'</td>
                        <td>'.$row["TotalPrice"].'</td>
                        <td>'.$row["Date"].'</td>
              		</tr>';              
            }
          echo "</table>
          		</div>";
        }
        
    	if(mysqli_num_rows($result3)>0){//check if row was selected
          	echo '<h5 class="text-center text-white bg-dark py-3">Reviews</h5>
                  <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Review #</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Item ID</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Description</th>
                      </tr>
                     </thead>';
     		while($row=mysqli_fetch_assoc($result3)){//retrieve record
              echo '<tr>
              			<td>'.$row["ReviewId"].'</td>
                        <td>'.$row["UserId"].'</td>
                        <td>'.$row["ItemId"].'</td>
                        <td>'.$row["Rating"].'</td>
                        <td>'.$row["Description"].'</td>
              		</tr>';                     
            }
          echo "</table>
          		</div>";
        }
        
     	if(mysqli_num_rows($result4)>0){//check if row was selected
          	echo '<h5 class="text-center text-white bg-dark py-3">Inquiries</h5>
            	  <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Inquiry #</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                      </tr>
                     </thead>';          
     		while($row=mysqli_fetch_assoc($result4)){//retrieve record
              echo '<tr>
              			<td>'.$row["InquiryId"].'</td>
                        <td>'.$row["UserId"].'</td>
                        <td>'.$row["Title"].'</td>
                        <td>'.$row["Description"].'</td>
              		</tr>';                  
            }
          echo "</table>
          		</div>";
        }       
      }
      CloseCon($openConnection);
    }
?>