<html>
	<?php
  		try{
            //connect to db  
    		$connect = "mysql:host=localhost;dbname=stefan3_Web3340";
    		$user = "stefan3_Web3340";
    		$pass = "test";

    		$pdo = new PDO($connect, $user, $pass);
    		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                //if the user wishes to delete an account
        	if($_POST["function"] == "Delete"&&!empty($_POST["id"])){
            	$sql = "SELECT AdminFlag FROM UserAdmin WHERE UserId = ".$_POST["id"].";";
                $result = $pdo->query($sql);
                if($result->fetch() != 0){
                $sql2 = "DELETE FROM UserAdmin WHERE UserId = ".$_POST["id"].".";
                $sql3 = "DELETE FROM Transactions WHERE UserId = ".$_POST["id"].".";
                $sql4 = "DELETE FROM Reviews WHERE UserId = ".$_POST["id"].".";
                $sql5 = "DELETE FROM Inquiry WHERE UserId = ".$_POST["id"].".";
                $result2 = $pdo->query($sql2);
                $result3 = $pdo->query($sql3);
                $result4 = $pdo->query($sql4);
                $result5 = $pdo->query($sql5);
                echo "Deletion successful";
                }
                else{
                    echo "Error: cannot delete an Admin account<br/>";
                }
                $pdo = null;
            }
            //if the user wishes to view the data concerning a specific individual
        	if($_POST["function"] == "View"){
                if(!empty($_POST["id"])){
                    $sql = "SELECT FROM UserAdmin WHERE UserId = ".$_POST["id"].".";
                    $sql2 = "SELECT FROM Transactions WHERE UserId = ".$_POST["id"].".";
                    $sql3 = "SELECT FROM Reviews WHERE UserId = ".$_POST["id"].".";
                    $sql4 = "SELECT FROM Inquiry WHERE UserId = ".$_POST["id"].".";
                    $result = $pdo->query($sql);
                    $result2 = $pdo->query($sql2);
                    $result3 = $pdo->query($sql3);
                    $result4 = $pdo->query($sql4);

                    echo "User Info <br/>";
                    while($row = $result->fetch()){
                        echo "UserId = ".$row['UserId'].", AdminFlag = ".$row['AdminFlag'].", FirstName = ".$row['FirstName'].", LastName = ".$row['LastName'].", Email = ".$row['Email'].", Password = ".$row['Password'].", Address = ".$row['Address'].", City = ".$row['City'].", PostalCode = ".$row['PostalCode']."<br/>";
                    }
                    echo "Transactions <br/>";
                    while($row = $result2->fetch()){
                        echo "TransactionId = ".$row['TransactionId'].", UserId = ".$row['UserId'].", TotalPrice = ".$row['TotalPrice'].", CompletedOrder = ".$row['CompletedOrder'].", Date = ".$row['Date'].", SaleId = ".$row['SaleId']."<br/>";
                    }
                    echo "Reviews <br/>";
                    while($row = $result3->fetch()){
                        echo "ReviewId = ".$row['ReviewId'].", UserId = ".$row['UserId'].", ItemId = ".$row['ItemId'].", Description = ".$row['Description'].", Rating = ".$row['Rating']."<br/>";
                    }
                    echo "Inquiries <br/>";
                    while($row = $result4->fetch()){
                        echo "IquiryId = ".$row['InquiryId'].", UserId = ".$row['UserId'].", Description = ".$row['Description'].", Date = ".$row['Date']."<br/>";
                    }
                    $pdo = null;
                }
                //else they will view the entire UserAdmin table
                else{
                    $sql = "SELECT * FROM UserAdmin";
                    //print the rows in result
                    $result = $pdo->query($sql);
                    echo "Account Registry<br/>";
                    while($row = $result->fetch()){
                        echo "UserId = ".$row['UserId'].", AdminFlag = ".$row['AdminFlag'].", FirstName = ".$row['FirstName'].", LastName = ".$row['LastName'].", Email = ".$row['Email'].", Password = ".$row['Password'].", Address = ".$row['Address'].", City = ".$row['City'].", PostalCode = ".$row['PostalCode']."<br/>";
                    }
                    $pdo = null;
                }
        	}
            
    	}
        //error handeling
    	catch(PDOException $e){
        	die($e->getMessage());
    	}  
	?> 
	<head>
    	<title>User Manager</title>
        <meta name="author" content="Juan Villalobos">
        <meta name="date posted" content="01/04/2022">
    </head>
	<body>
        
    	<form action="usermanager.php" method="POST">
        	<label for="function">Function:</label>
        	<select name="function" id="function">
                <option value="Delete">Delete</option>
            	<option value="View">View</option>
      		<p>User: <input type="text" name="id" value=""></p>
      		<input type="submit" name="submit" value="Submit">
      		<input type="reset" name="clear" value="Clear">
    	</form>
        <form action="admin.html" method="GET">
      			<input type="submit" name="AM" value="Back to Admin Manager">
    	</form>
    </body>     
</html>