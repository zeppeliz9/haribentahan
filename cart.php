<?php 
//VIEW PREVIOUS ORDERS
include('functions/userfunctions.php');
include('includes/header.php' );

include('authenticate.php');
?>
<div class="py-0 bg-warning mt-0">
    <div class="container"  style="margin-top:-40px;">
        <h6 class="text-white">
        <a href = "index.php" class ="text-white">     
        Home / 
        </a>
        <a href = "cart.php" class ="text-white">
        Cart</h6>
        <hr>
        </a>
    </div>
</div>

<div class="py-1">
    <div class="container" style="margin-top:-55px;"> 
        <div class="py-0">   
            <div class="row">
                <div class="col-md-12 mb-2">
                <h3 style="font-weight:bold;">My Cart</h3>
                <hr style="border: 3px solid rgb(255,193,7); border-radius: 2px;">
                    <p>Below are the list of products that you have chosen to add to your cart. Click the plus or minus symbol to
                        adjust the selected product's quantiy. Click the remove button to remove the product from your cart. Click the
                        "Proceed to Checkout" button to finalize your purchase.</p>
                    <hr>
                    <div class="my-cart">
                    <?php 
                        $items = getCartItems();

                        if(mysqli_num_rows($items) > 0){
                                    ?>
                            <div class="row align-items-center">
                                <div class="col-md-5" style="margin-top:10px; margin-bottom:10px;">
                                    <h6>Product</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Remove</h6>
                                </div>
                            </div>

                                <div id="">
                                    <?php
                                        foreach($items as $citem)
                                        {   
                                            ?>
                                            <div class="card product_data mb-3" style="border-width:thin; height:fit-content;">
                                                <div class="row align-items-center">
                                                    <div class="col-md-2">
                                                        <img src="uploads/<?= $citem['image']?>" alt="Image" width="80px">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h5> <?= $citem['name']?></h5>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h5>Php <?= $citem['selling_price']?></h5>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="hidden" class="prodId" value="<?=$citem['prod_id']?>">
                                                        <div class="input-group mb-3" style="width:130px">
                                                            <button class="input-group-text decrement-btn updateQty">-</button>
                                                            <input type="text" class="form-control text-center input-qty bg-white" value="<?=$citem['prod_qty']?>">
                                                            <button class="input-group-text increment-btn updateQty">+</button>
                                                        </div>
                                                    </div>
                                                        <div class="col-md-2">
                                                            <button class="btn btn-danger btn-sm deleteItem " value="<?=$citem['cid']?>">
                                                            <i class="fa fa-trash mr-2 "></i>Remove</button>
                                                        </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        
                                    ?>
                                </div>

                                <div class="float-end">
                                    <a href="checkout.php" class="btn btn-outline-danger" style = "float: right; ">Proceed to Checkout</a>
                                </div>
                                
                        <?php
                        } else { ?>
                            <div class="card card-body shadow text-center" style = "background-color:rgb(162,214,249);box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                                <h4 class="py-3">Your cart is empty. Click "Hari-bilihin" to start shopping!</h4>
                            </div>
                            <?php
                        }
                    ?>
                    </div>           
                </div>  
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php');?>