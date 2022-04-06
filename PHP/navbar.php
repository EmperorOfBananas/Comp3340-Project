
<?php
	session_start();//starts session
	if(isset($_SESSION["userid"])){//checks if user is logged on
     	if($_GET["logoutComplete"]){//check if user is trying to logout out
        	session_destroy(); //destroy session
           	header("Refresh:1 url=../home/index.php");
          	exit();
        }
    }
?>
  <!--https://getbootstrap.com/docs/5.1/examples/headers/-->
  <!--header-->
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <!--company name-->
        <a href="../home/index.php" class="d-flex align-items-center me-lg-4 mb-2 mb-lg-0 text-dark text-decoration-none">
          <h1>E-commerce</h1>
        </a>
		<!--menu list-->
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li class="nav-item dropdown">
            <!--menu dropdown for category of products-->
            <a class="nav-link dropdown-toggle px-2 link-secondary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Products
            </a>
            <!--dropdown options-->
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="../products/index.php">Shop</a></li>
              <li><a class="dropdown-item" href="../products/index.php?books=1">Books</a></li>
              <li><a class="dropdown-item" href="../products/index.php?electronics=1">Electronics</a></li>
              <li><a class="dropdown-item" href="../products/index.php?home=1">Home</a></li>
              <li><a class="dropdown-item" href="../products/index.php?sport=1">Sports</a></li>
              <li><a class="dropdown-item" href="../products/index.php?toy=1">Toy</a></li>
            </ul>
          </li>
          <!--menu links-->
          <li><a href="../about/index.php" class="nav-link px-2 link-secondary">About Us</a></li>
          <li><a href="../contact/index.php" class="nav-link px-2 link-secondary">Contact Us</a></li>
        </ul>
		<!--search bar-->
        <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input onchange="querySearch(this.value)" type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </div>
		<?php
        session_start();//beings session
        if(isset($_SESSION["userid"])){//checks if user is logged in
          
          echo '<!--cart button-->
                <div class="me-3 text-end">
                   <a href="../cart/index.php" class="btn btn-dark">Cart</a>
                </div>
          		<!--https://getbootstrap.com/docs/5.1/examples/headers/-->
          		<!--dropdown for user features-->
          		<div class="dropdown text-end">
                  <!--profile image-->
                  <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                    <!--
                    	Artist: emre ergen, https://unsplash.com/@emree
                    	Date Retrieved: April 5, 2022
                    -->
                    <img src="https://images.unsplash.com/photo-1447384609959-c1a3e9a4736a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="profile picture" width="38" height="35" class="rounded-circle">
                  </a>
                  <!--User Features-->
                  <ul class="dropdown-menu text-small" aria-labelledby="dropdownProfile">
                    <li><a class="dropdown-item" href="../settings/index.php">User Settings</a></li>
                    <li><a class="dropdown-item" href="../inquiry/index.php">Inquiries</a></li>';
                  if($_SESSION["isadmin"]){//if user is an admin
                    if($_SESSION["userid"]==1){
                    echo '<li><a class="dropdown-item" href="../colorschemes/index.php">Color Scheme</a></li>'; 
                    }
                    echo '<li><a class="dropdown-item" href="../manageusers/index.php">Manage Users</a></li>
                    	  <li><a class="dropdown-item" href="../manageproducts/index.php">Manage Products</a></li>
                    	  <li><a class="dropdown-item" href="../inquiryresponse/index.php">Respond to Inquiries</a></li>';
                  }
                   echo '<li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="index.php?logoutComplete=1">Sign out</a></li>
                  </ul>
                </div>';
        }else{
          echo '<!--cart and login button-->
          		<div class="text-end">
                  <a href="../login/index.php" class="btn btn-outline-dark me-2">Login</a>
                  <a href="../cart/index.php" class="btn btn-dark">Cart</a>
                </div>';
        }
        ?>
      </div>
    </div>
  </header>
<script src="../../JS/navbar.js"></script>
<?php
    if($_GET["logoutComplete"]){//check if user is trying to logout out
       echo '<div class="alert alert-success text-center">Logout Successful!</div>';
    }
?>
