<html>
	<?php
  		try{
            //connect to db  
    		$connect = "mysql:host=localhost;dbname=stefan3_Web3340";
    		$user = "stefan3_Web3340";
    		$pass = "test";

    		$pdo = new PDO($connect, $user, $pass);
    		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //if the submit button was pressed
            if(isset($_POST["submit"])){
                //if no id was submitted
                if(empty($_POST["id"])){
                    //output list of all reviews followed by all inquiries
                    if($_POST["function"] == "All"){
                        $Rsql = "SELECT ReviewId, UserId, ItemId, Rating FROM Reviews";
                        $Isql = "SELECT InquiryId, UserId, Date FROM Inquiry";
                        $resultR = $pdo->query($Rsql);
                        $resultI = $pdo->query($Isql);
                        echo "Review Log<br/>";
                        while($row = $resultR->fetch()){
                            echo "ReviewId = ".$row['ReviewId'].", UserId = ".$row['UserId'].", ItemId = ".$row['ItemId'].", Rating = ".$row['Rating']."<br/>";
                        }
                        echo "Inquiry Log<br/>";
                        while($row = $resultI->fetch()){
                            echo "InquiryId = ".$row['InquiryId'].", UserId = ".$row['UserId'].", Date = ".$row['Date']."<br/>";
                        }
                    }
                    //output list of all reviews
                    else if($_POST["function"] == "Review"){
                        $sql = "SELECT ReviewId, UserId, ItemId, Rating FROM Reviews";
                        $result = $pdo->query($sql);
                        echo "Review Log<br/>";
                        while($row = $result->fetch()){
                            echo "ReviewId = ".$row['ReviewId'].", UserId = ".$row['UserId'].", ItemId = ".$row['ItemId'].", Rating = ".$row['Rating']."<br/>";
                        }
                    }
                    //output list of all inquiries
                    else if($_POST["function"] == "Iquiry"){
                        $sql = "SELECT InquiryId, UserId, Date FROM Inquiry";
                        $result = $pdo->query($sql);
                        echo "Inquiry Log<br/>";
                        while($row = $result->fetch()){
                            echo "InquiryId = ".$row['InquiryId'].", UserId = ".$row['UserId'].", Date = ".$row['Date']."<br/>";
                        }
                    }
                }
                //an id was submitted
                else{
                    //if the id is a user id
                    if($_POST["function2"]=="UserId"){
                        //search for all reviews/inquires posted by the user with this id
                        if($_POST["function"] == "All"){
                            $Rsql = "SELECT ReviewId, UserId, ItemId, Rating FROM Reviews WHERE UserId = ".$_POST["id"];
                            $Isql = "SELECT InquiryId, UserId, Date FROM Inquiry WHERE UserId = ".$_POST["id"];
                            $resultR = $pdo->query($Rsql);
                            $resultI = $pdo->query($Isql);
                            echo "Review Log <br/>";
                            while($row = $resultR->fetch()){
                                echo "ReviewId = ".$row['ReviewId'].", UserId = ".$row['UserId'].", ItemId = ".$row['ItemId'].", Rating = ".$row['Rating']."<br/>";
                            }
                            echo "Inquiry Log<br/>";
                            while($row = $resultI->fetch()){
                                echo "InquiryId = ".$row['InquiryId'].", UserId = ".$row['UserId'].", Date = ".$row['Date']."<br/>";
                            }
                        }
                        //search for all reviews posted by the user with this id
                        else if($_POST["function"] == "Review"){
                            $sql = "SELECT ReviewId, UserId, ItemId, Rating FROM Reviews WHERE UserId = ".$_POST["id"];
                            $result = $pdo->query($sql);
                            echo "Review Log<br/>";
                            while($row = $result->fetch()){
                                echo "ReviewId = ".$row['ReviewId'].", ItemId = ".$row['ItemId'].", Rating = ".$row['Rating']."<br/>";
                            }
                        }
                        //search for all inquires posted by the user with this id
                        else if($_POST["function"] == "Iquiry"){
                            $sql = "SELECT InquiryId, UserId, Date FROM Inquiry WHERE UserId = ".$_POST["id"];
                            $result = $pdo->query($sql);
                            echo "Inquiry Log<br/>";
                            while($row = $result->fetch()){
                                echo "InquiryId = ".$row['InquiryId'].", Date = ".$row['Date']."<br/>";
                            }
                        }
                    }
                    //if the id is a review id and the user selected review as the value in the drop down
                    else if($_POST["function2"]=="ReviewId"&&$_POST["function"] == "Review"){
                        $sql = "SELECT ReviewId, Description FROM Reviews WHERE ReviewId = ".$_POST["id"];
                        $result = $pdo->query($sql);
                        while($row = $result->fetch()){
                            echo "ReviewId = ".$row['ReviewId'].", Description = ".$row['Description']."<br/>";
                        }                         
                    }
                    //if the id is a inquiry id and the user selected inquiry as the value in the drop down
                    else if($_POST["function2"]=="InquiryId"&&$_POST["function"] == "Iquiry"){
                        $sql = "SELECT InquiryId, Description, Response FROM Inquiry WHERE InquiryId = ".$_POST["id"];
                        $result = $pdo->query($sql);
                        while($row = $result->fetch()){
                            echo "InquiryId = ".$row['InquiryId'].", Description = ".$row['Description'].", Response = ".$row['Response']."<br/>";
                        }
                    }
                }
                $pdo = null;
            }
            //if the response button has been clicked and both response text bars are not empty
            else if(isset($_POST["respond"])&&!empty($_POST["responseId"])&&!empty($_POST["responseText"])){
                $sql = "UPDATE Inquiry SET Response = ".$_POST["responseText"]."WHERE InquiryId = ".$_POST["responseId"].";";
                $result = $pdo->query($sql);
                $pdo = null;
            }
        }

        //error handeling
    	catch(PDOException $e){
        	die($e->getMessage());
    	}  
	?> 
	<head>
    	<title>Customer Feedback Board</title>
        <meta name="author" content="Juan Villalobos">
        <meta name="date posted" content="01/04/2022">
    </head>
	<body>    
    	<form action="cfboard.php" method="POST">
            <label for="function">Search For:</label>
        	<select name="function" id="function">
                <option value="All">All</option>
            	<option value="Review">Review</option>
                <option value="Inquiry">Inquiry</option>
            </select>
            <label for="function2">By:</label>
        	<select name="function2" id="function2">
                <option value="UserId">User ID</option>
            	<option value="ReviewId">Review ID</option>
                <option value="InquiryId">Inquiry ID</option>
            </select>
            <p>Id: <input type="text" name="id" value=""></p>
      		<input type="submit" name="submit" value="Submit">
            <p>Respond to Inquiry: <input type="text" name="responseId" value=""></p>
            <p>Response: <input type="text" name="responseText" value=""></p>
            <input type="submit" name="respond" value="Respond">
    	</form>
        <form action="admin.html" method="GET">
      			<input type="submit" name="AM" value="Back to Admin Manager">
    	</form>
    </body>     
</html>

