<!--//When view details is clicked on my orders page.-->
<?php 
include('../Middleware/adminMiddleware.php');
include('includes/header.php' );

if(isset($_GET['t'])) //Will check if tracking no is valid
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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card" style="border:solid; border-color:black;">
                        <div class="card-header" style="background-color:rgb(220,53,69);">
                            <span class="text-white" style="font-size:30px;"> View Approved Orders</span>
                                <a href="approved-orders.php" class="btn" style="float:right; background-color:rgb(255,193,7);color:black;"> <i class="fa fa-reply"></i> Back</a>
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
                                                $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi, 
                                                products p WHERE oi.order_id=o.id AND p.id=oi.prod_id 
                                                AND o.tracking_no='$tracking_no' ";
                                                $order_query_run = mysqli_query($con,$order_query);
                                                if(mysqli_num_rows($order_query_run) > 0)
                                                {
                                                    foreach($order_query_run as $item)
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <img src="../uploads/<?=$item['image']; ?>" width="50px" height="50px" alt="<?=$item['name']; ?>">
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
                                    <label class="fw-bold" style="font-weight:bold;">Payment Mode: </label>
                                    <div class="border p-1 mb-3">
                                        <?=$data['payment_mode'] ?>
                                    </div>
                                    <label style="font-weight:bold;">Status: </label>
                                    <div class="mb-3">
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="tracking_no" value="<?=$data['tracking_no']?>">
                                            <select name="order_status" id="" class="form-select">
                                                <option value="0" <?=$data['status'] == 0?"selected":""?>>Waiting for Approval</option>
                                                <option value="1" <?=$data['status'] == 1?"selected":""?>>Accept</option>
                                                <option value="2" <?=$data['status'] == 2?"selected":""?>>Complete </option>
                                                <option value="3" <?=$data['status'] == 3?"selected":""?>>Decline</option>
                                            </select>
                                            <button type="submit" name="update_approved_order_btn" class="btn mt-3" style="background-color:rgb(220,53,69); color:white;">Update Order Status</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--</div>--> 
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
