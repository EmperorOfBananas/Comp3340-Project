<?php
  require_once("../databaseconnection.php"); //database connection functionality
  session_start();//start session
  
  if(isset($_GET["itemid"])){//checks if itemid is set
    $openConnection=OpenCon();//opens connection
    $itemid=intval($_GET["itemid"]);//retrieve item id
    echo '<div class="container">
    		<!--reviews title-->
    	 	<h2 class="text-center text-white bg-dark py-3">Reviews</h2>';
	//retrieves average rating
    $result=queryResultSelect($openConnection, "SELECT FLOOR(AVG(Reviews.Rating)) AS rating FROM Reviews WHERE ItemId=$itemid");
    if(mysqli_num_rows($result)>0){//checks if rows were selected
      $row=mysqli_fetch_assoc($result);//retrive row average 
      $rating=$row["rating"];//retrieve average rating
       echo '<!--Average rating-->
       		<div class="d-flex flex-row justify-content-center align-items-center py-2">';
      	if($rating==1){//average rating of 1
          echo '<span><i class="fa-solid fa-star text-dark"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></span>';
        }else if($rating==2){//average rating of 2
          echo '<span><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></span>';          
        }else if($rating==3){//average rating of 3
          echo '<span><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></span>';             
        }else if($rating==4){//average rating of 4
          echo '<span><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-regular fa-star"></i></span>';             
        }else if($rating==5){//average rating of 5
           echo '<span><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i></span>';            
        }else{//no ratings yet
          echo '<span><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></span>';
        }
      //retrieves reviews for item
      $result=queryResultSelect($openConnection, "SELECT Reviews.Rating, Reviews.Description, UserAdmin.FirstName FROM Reviews INNER JOIN UserAdmin ON Reviews.UserId=UserAdmin.UserId WHERE ItemId=$itemid");
      echo '<!--number of reviews-->
      		<span class="ms-2">'.mysqli_num_rows($result).' review(s)</span></div>';
      if(isset($_SESSION["userid"])){
        echo '<!--https://getbootstrap.com/docs/5.1/forms/form-control/-->
              <!--form, post method-->
              <form class="d-flex flex-column align-items-center" action="addreview.php?itemid='.$itemid.'" method="POST">
              	<h3>Leave a Review</h3>
                <div class="form-floating w-25 my-2">
                  <!--select rating-->
                  <select class="form-control" id="formControlSelect1" name="rating" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  <label for="formControlSelect1">Rating</label>
                </div>
                <div class="form-floating w-50">
                  <!--textarea for review-->
                  <textarea class="form-control" id="formControlTextarea1" name="description" rows="5" required></textarea>
                  <label for="formControlTextarea1">Review</label>
                </div>
                <!--submit button-->
                <button type="submit" class="mt-3 btn btn-dark">Submit</button>
              </form>';
      }
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){//retrieve row records
          $rating=$row["Rating"];//retrieve row rating
          echo '<!--https://getbootstrap.com/docs/5.1/components/card/-->
                <div class="card p-3">
                  <div class="card-body">
                  	<!--name of reviewer-->
                    <h5 class="card-title mb-3">'.$row["FirstName"].'</h5>';

          if($rating==1){//user gave rating of 1
            echo '<h6 class="card-subtitle mb-4 text-muted"><i class="fa-solid fa-star text-dark"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></h6>';
          }else if($rating==2){//user gave rating of 2
            echo '<h6 class="card-subtitle mb-4 text-muted"><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></h6>';          
          }else if($rating==3){//user gave rating of 3
            echo '<h6 class="card-subtitle mb-4 text-muted"><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></h6>';             
          }else if($rating==4){//user gave rating of 4
            echo '<h6 class="card-subtitle mb-4 text-muted"><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-regular fa-star"></i></h6>';             
          }else{//user gave rating of 5
             echo '<h6 class="card-subtitle mb-4 text-muted"><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i><i class="fa-solid fa-star text-dark"></i></h6>';            
          }
          echo '        <!--review description--> 
          				<p class="card-text">'.$row["Description"].'</p>
                  </div>
                </div>';
        }
      }else{
        echo '<div class="card my-4">
                <div class="card-body p-4">
                  <!--this product has no reviews-->
                  <h5 class="card-title text-center">No reviews</h5>
                </div>
              </div>';
      }
    }
    echo "</div>";
    CloseCon($openConnection);//colses connection
  }

?>