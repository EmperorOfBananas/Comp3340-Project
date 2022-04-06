 <?php
	  require_once("../databaseconnection.php");//database connection functionality
	  session_start();

      if($_SESSION["isadmin"]){
        $openConnection=OpenCon();//open database connection
        $color=$_POST["colors"];
        $stmt=mysqli_prepare($openConnection,"UPDATE UserAdmin SET ColorScheme=? WHERE UserId=1");
        mysqli_stmt_bind_param($stmt,"s",$color);
        mysqli_stmt_execute($stmt);       
        CloseCon($openConnection);
       }
       header("Refresh:1; url=index.php?updated=1");
?>