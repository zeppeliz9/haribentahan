<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-danger shadow" >
  <div class="container" style="margin-top:-50px;">
    <a class="navbar-brand" href="index.php" style="font-weight:bold;"> <span>  <img src="assets/images/plm-logo.png" style="object-fit:cover; opacity:1; height:32px;" alt="PLM LOGO"></span>  Haribentahan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link mr-1" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-1" href="categories.php">Hari-bilihin</a>
                </li>
                <li class="nav-item mr-1">
                    <a class="nav-link" href="cart.php">My Cart</a>
                </li>

                <?php
                    if (isset($_SESSION['auth']))
                    {
                        ?>
                        
                        <li class="nav-item dropdown mr-1">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['auth_user']['name']; ?>
                                </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="my-orders.php">My Orders</a></li>
                            <li><a class="dropdown-item" href="user-order-history.php">Order History</a></li>
                            <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>    
                             </ul>
                        </li>
                        <?php
                    }
                    
                    else
                    {
                        ?>
                                <li class="nav-item mr-1">
                                    <a class="nav-link" href="register.php">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>  
                                </li>
                        <?php
                    }

                ?>


             
               
            </ul>
        </div>
    </div>
</nav>  