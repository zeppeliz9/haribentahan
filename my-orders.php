<?php
//View all orders on the user side 
include('functions/userfunctions.php');
include('includes/header.php' );
include('authenticate.php');
?>


<div class="py-3 bg-warning" style="margin-top:-55px;">
    <div class="container">
        <h6 class="text-white">
        <a href = "index.php" class ="text-white">     
        Home / 
        </a>
        <a href = "my-orders.php"class ="text-white">
        My Orders</h6>
        </a>
    </div>
</div>

<div class="py-5">
    <div class="container"> 
        <div class="">   
            <div class="row">
                <div class="col-md-12">
                    <h3 style="margin-top:-70px; font-weight:bold;">My Orders</h3>
                    <hr>
                    <p>Check your existing orders' status, tracking numbers, details, and more. Click the "View Details" button to see the appropriate information regarding your specific order.</p>
                    <hr>
                    <table class="table table-bordered">
                        <thead style="background-color: rgb(255,193,7);">
                            <tr  style="text-align:center; color:black;">
                                <th style=" border: 1px solid black; border-collapse: collapse;">ID</th>
                                <th style=" border: 1px solid black; border-collapse: collapse;">Tracking No.</th>
                                <th style=" border: 1px solid black; border-collapse: collapse;">Price</th>
                                <th style=" border: 1px solid black; border-collapse: collapse;">Date</th>
                                <th style=" border: 1px solid black; border-collapse: collapse;">View</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $orders = getOrders();
                                    if(mysqli_num_rows($orders)>0)
                                    {


                                        foreach($orders as $item)
                                        {

                                            
                                            if($item['status'] != 2 && $item['status'] != 3)
                                            {
                                                ?>
                                                <tr style="text-align:center; color: black;">
                                                    <td style=" border: 1px solid black; border-collapse: collapse;"><?=$item['id'];?></td>
                                                    <td style=" border: 1px solid black; border-collapse: collapse;"><?=$item['tracking_no'];?></td>
                                                    <td style=" border: 1px solid black; border-collapse: collapse; font-weight:bold;"><?=$item['total_price'];?></td>
                                                    <td style=" border: 1px solid black; border-collapse: collapse;"><?=$item['created_at'];?></td>
                                                    <td style=" border: 1px solid black; border-collapse: collapse;">
                                                        <a href="view-order.php?t=<?=$item['tracking_no'];?>" class="btn" style="background-color:rgb(220,53,69); color:white;">View Details</a>
                                                    </td>
                                                </tr>
                                            <?php
    
                                            }
    
                                            }
                                      

                                    }


                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="5" style="text-align:center;">No Orders Yet!</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            
                    </table>
                    
                </div> 
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>