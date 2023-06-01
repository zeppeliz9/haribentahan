<!--//When view details is clicked on my orders page.-->
<?php 
include('functions/userfunctions.php');
include('includes/header.php' );
include('authenticate.php');

if(isset($_GET['t']))
{
    $tracking_no = $_GET['t'];
    $orderData = checkTrackingNoValid($tracking_no);
    if (mysqli_num_rows($orderData) < 0)
    {
        ?>
        <h4>Something went wrong</h4>
        <?php
        die();
    }

}
else
{
    ?>
    <h4>Something went wrong</h4>
    <?php
    die(); 
}

$data = mysqli_fetch_array($orderData);

?>


<div class="py-3 bg-warning">
    <div class="container" style="margin-top:-55px;">
        <h6 class="text-white">
        <a href = "index.php" class ="text-white">     
        Home / 
        </a>
        <a href = "my-orders.php"class ="text-white">
        My Orders /
        </a>
        <a href = "#"class ="text-white">
        View Orders</h6>
        </a>
    </div>
</div>

<div class="py-5">
    <div class="container" style="margin-top:-50px;"> 
        <div class="">   
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border:solid; border-color:black;">
                        <div class="card-header bg-danger">
                            <span class="text-white" style="font-size:30px;"> View Order</span>
                                <a href="my-orders.php" class="btn btn-warning" style="float:right;"> <i class="fa fa-reply"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>    
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="font-weight-bold">Name</label>
                                            <div class="border p-1">
                                                <?=$data['name'];?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="font-weight-bold">Email</label>
                                            <div class="border p-1">
                                                <?=$data['email'];?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="font-weight-bold">Phone</label>
                                            <div class="border p-1">
                                                <?=$data['phone'];?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="font-weight-bold">Tracking No.</label>
                                            <div class="border p-1">
                                                <?=$data['tracking_no'];?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="font-weight-bold">Address</label>
                                            <div class="border p-1">
                                                <?=$data['address'];?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="font-weight-bold">Zip Code</label>
                                            <div class="border p-1">
                                                <?=$data['pincode'];?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>       
                                            <?php
                                                $userId = $_SESSION['auth_user']['user_id'];
                                                $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi, 
                                                products p WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.prod_id 
                                                AND o.tracking_no='$tracking_no' "; 
                                                $order_query_run = mysqli_query($con,$order_query);

                                                if(mysqli_num_rows($order_query_run) > 0)
                                                {
                                                    foreach($order_query_run as $item)
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <img src="uploads/<?=$item['image']; ?>" width="50px" height="50px" alt="<?=$item['name']; ?>">
                                                                <?=$item['name']; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?=$item['price']; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                x<?=$item['orderqty']; ?>
                                                            </td>
                                                        </tr>
                                                        <?php

                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>

                                    <hr>
                                    <h5>Total Price: <span class="float" style="float:right;font-weight:bold;"> <?=$data['total_price'];?></span></h5>
                                    <hr>
                                    <div class="border p-1 mb-3">
                                        <label for="" style="font-weight:bold;">Payment Mode: </label>
                                        <?=$data['payment_mode'] ?>
                                    </div>
                                    <div class="border p-1 mb-3">
                                        <label for="" style="font-weight:bold;">Status: </label>
                                        <?php 
                                            
                                            if($data['status'] == 0)
                                            {
                                                echo "Please wait for your order to be approved.";
                                            }
                                            else if ($data['status'] == 1)
                                            {
                                                echo "This order has been approved. Please proceed to PLM COOP and claim your product.";
                                            }
                                            else if ($data['status'] == 2)
                                            {
                                                echo "This order has been completed.";
                                            }
                                            else if ($data['status'] == 3)
                                            {
                                                echo "This order has been cancelled and declined due to stock shortage.";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>
