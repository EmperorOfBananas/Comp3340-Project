<?php
  //opens database connection
  function OpenCon(){
      $dbhost = 'localhost';//host
      $dbuser = "databaseusername";//database username
      $dbpass = "password";//database password
      $db = "database";//database name
      $connection = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);//creates database connection

      return $connection;//returns database connection
  }

  //closes database connection
  function CloseCon($connection){
      $connection -> close();//closes database connection
  }

  //performs select operation
  function queryResultSelect($openConnection,$query){
    $stmt=mysqli_stmt_init($openConnection);//initializes database connection
    $stmt=mysqli_prepare($openConnection,$query);//prepares sql statement to be performed
    mysqli_stmt_execute($stmt);//performs the select statement operation

    return mysqli_stmt_get_result($stmt);//returns results
  }
?>