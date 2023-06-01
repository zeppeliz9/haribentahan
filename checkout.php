<?php 
include('functions/userfunctions.php');
include('includes/header.php' );
include('authenticate.php');
?>


<div class="py-3 bg-warning" >
    <div class="container" style="margin-top:-55px;" >
        <h6 class="text-white">
        <a href = "index.php" class ="text-white">     
        Home / 
        </a>
        <a href = "checkout.php"class ="text-white">
        Checkout</h6>
        </a>
    </div>
</div>

<div class="py-3">
    <div class="container" style="margin-top:-30px;" > 
    <h4 style="margin-top:-15px; font-weight:bold;">Checkout</h4>
    <hr>
    <p>Input important basic details for easier contact with PLM COOP. The information you enter
        will be used to contact you in case of changes within the order. Confirm your order and click the Place Order button below.
    </p> 
    <hr>
    <br>
        <div class="card" style="margin-top:-10px;">
            <div class="card-body" style="color:black; border-style:solid; position: absolute; border: 3px solid black; border-radius: 2px;">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5 style="font-weight:bold;">BASIC DETAILS</h5>
                            <hr style="font-weight:bold; border: 3px solid rgb(220,53,69); border-radius: 2px;">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">Name</label>
                                    <input type="text" name="name" required placeholder="Enter full name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" name="email" required placeholder="Enter valid email address" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">Phone</label>
                                    <input type="text" name="phone" required placeholder="Enter valid phone number" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">ZIP Code</label>
                                    <input type="text" name="pincode" required placeholder="Enter ZIP code" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="font-weight-bold">Address</label>
                                    <textarea name="address" required class="form-control"  rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <h5 style="font-weight:bold;">ORDER DETAILS</h5>
                                <hr style="border: 3px solid rgb(220,53,69); border-radius: 2px;">
                                <?php $items = getCartItems();
                                $totalPrice = 0;
                                    foreach($items as $citem)
                                    {   
                                        ?>
                                        <div class="mb-1 border" >
                                            <div class="row align-items-center">
                                                <div class="col-md-2" style = "margin: 15px;"> <!--mb-3 ml-3 mt-3-->
                                                    <img src="uploads/<?= $citem['image']?>" alt="Image" width="60px">
                                                </div>
                                                <div class="col-md-4">
                                                    <h5 style="color:black;"> <?= $citem['name']?></h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 style="color:black;"> <?= $citem['selling_price']?></h5>
                                                </div>
                                                <div class="col-md-1">
                                                    <label style="color:black;">x<?= $citem['prod_qty'] ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $totalPrice += $citem['selling_price']*$citem['prod_qty'];
                                    }?>
                                    <hr style="border: 3px solid rgb(220,53,69); border-radius: 2px;">
                                <h5 style="font-weight:bold;">TOTAL PRICE: <span style ="color: black; float: right; font-weight: bolder; "><?=$totalPrice?></span></h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="Pick-Up">
                                <button name="placeOrderBtn" type="sumbit" class="btn w-100 placeOrderBtn" style="background-color:rgb(255,193,7); color:black;">Place Order</button>
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>