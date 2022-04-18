 <?php
	  require_once("../databaseconnection.php");//database connection functionality
	  session_start();//starts session

      if($_SESSION["isadmin"]){//checks if user is an admin
        $openConnection=OpenCon();//open database connection
        $color=$_POST["colors"];//retrieve color
        $stmt=mysqli_prepare($openConnection,"UPDATE UserAdmin SET ColorScheme=? WHERE UserId=1");//set color scheme only for main admin
        mysqli_stmt_bind_param($stmt,"s",$color);//bind param
        mysqli_stmt_execute($stmt);       
        CloseCon($openConnection);//closes connection
       }
       header("Refresh:1; url=index.php?updated=1");//redirects
?>