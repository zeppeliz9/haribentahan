<?php
  //Takes the slug of dashboard using substring and slash to use for active pointing
  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); 
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" style="background-color:rgb(220,53,69);border: 1px solid black; border-collapse: collapse;" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="approved-orders.php" target="_blank">
        <h4><span class="ms-1 font-weight-bold text-white text-center">Haribentahan</span><h4>
      </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">

      <li class="nav-item">
          <a class="nav-link text-white <?=$page == "approved-orders.php"?'active bg-gradient-warning':''; ?>" href="approved-orders.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">check</i>
            </div>
            <span class="nav-link-text ms-1"   style="font-weight:bold;">Approved Orders</span>
          </a>
        </li>

      <li class="nav-item">
          <a class="nav-link text-white <?=$page == "orders.php"?'active bg-gradient-warning':'';?>" href="orders.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">shopping_cart_checkout</i>
            </div>
            <span class="nav-link-text ms-1"  style="font-weight:bold;">Pending Orders</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white <?=$page == "order-history.php"?'active bg-gradient-warning':''; ?>" href="order-history.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">menu</i>
            </div>
            <span class="nav-link-text ms-1"  style="font-weight:bold;">Order History</span>
          </a>
        </li>

        <hr class="horizontal light mt-0 mb-2">

        <li class="nav-item">
          <a class="nav-link text-white <?=$page == "category.php"?'active bg-gradient-warning':'';?>" href="category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">apps</i>
            </div>
            <span class="nav-link-text ms-1"  style="font-weight:bold;">All Categories</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white <?=$page == "add-category.php"?'active bg-gradient-warning':''; ?>" href="add-category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1" style="font-weight:bold;">Add a Category</span>
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link text-white <?=$page == "products.php"?'active bg-gradient-warning':''; ?>" href="products.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">storefront</i>
            </div>
            <span class="nav-link-text ms-1"  style="font-weight:bold;">All Products</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white <?=$page == "add-product.php"?'active bg-gradient-warning':''; ?>" href="add-product.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">sell</i>
            </div>
            <span class="nav-link-text ms-1"  style="font-weight:bold;">Add Products</span>
          </a>
        </li>

      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-warning mt-4 w-100" 
        href="../logout.php">
        Log Out</a>
      </div>
    </div>
  </aside>