<?php
//This is for specific product view 
include('functions/userfunctions.php');
include('includes/header.php');

//Check if link with slug exists or not
if(isset($_GET['product']))
{
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products",$product_slug);
    $product = mysqli_fetch_array($product_data);

    if($product)
    {
        ?>
        <div class="py-3 bg-warning" >
            <div class="container" style="margin-top:-55px;">
                <h6 class="text-white">
                    <a class = "text-white" style="text-decoration: none;" href="categories.php"> 
                        Home /
                    </a>
                    <a class = "text-white" style="text-decoration: none;" href="categories.php"> 
                        Collections / 
                    </a>
                    <?=$product['name'];?></h6>
            </div>
        </div>

        <div class="bg-light py-4">
            <div class="container product_data mt-3" >
                <div class="row" style="margin-top:-50px;">
                    <div class="col-md-4">
                        <div class="sm p-3 mb-5 rounded" style ="color:white; border-style:solid; background-color:rgb(235,25,60); border-color:rgb(33,2,3); box-shadow:rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
                            <img src="uploads/<?=$product['image'];?>" alt="Product Image" class = "w-100">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class ="font-weight-bold"><?=$product['name'];?>
                            <span style = "float: right; margin:5px; color: green"><?php if ($product['trending']) {echo "Trending";}?></span>
                        </h4>
                        <hr>
                        <p><?=$product['small_description'];?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Php <span class = "text-success font-weight-bold"><?=$product['selling_price'];?></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h5>Php <s class = "text-danger"><?=$product['original_price'];?></s></h5>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-4" >
                                    <div class="input-group mb-3" style="width:130px">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" class="form-control text-center input-qty bg-white" value = "1" disabled>
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                            </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn px-4 addToCartBtn" style="background-color:rgb(255,193,7);" value = "<?=$product['id'];?>"><i class="fa fa-shopping-cart me-2"></i> Add to Cart</button>
                            </div>

                        </div>





                        <hr>
                        
                        <h6>Product Description: </h6>
                        <p><?=$product['description'];?></p>
                </div>
            </div>
        </div>
        <?php
    }
    else
    {
        echo "Product not found!";
    }
}

else //Can insert button that redirects back to categories page
{
    echo "Something went wrong!";
}
include('includes/footer.php');?>