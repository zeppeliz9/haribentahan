<?php 
//This is to view all PENDING orders on the admin side
include('../Middleware/adminMiddleware.php');
include('includes/header.php' );
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:rgb(220,53,69);">
                    <h4 class="text-white">Pending Orders</h4>
                    <p class="text-white mb-0">
                    The "Pending Orders" page offers a consolidated view of all incoming orders awaiting processing, empowering you to stay on top of customer demands and streamline order fulfillment. With clear order details, status indicators, and actionable options, efficiently manage and prioritize pending orders to ensure timely delivery and customer satisfaction.
                    </p>
                </div>
                    <div class="card-body" id ="">
                    <table class="table table-bordered" style="border:thin black;">
                        <thead style="background-color:rgb(255,193,7);">
                            <tr style="color:black;">
                                <th  style=" border: 1px solid black; border-collapse: collapse; text-align:center;">ID</th>
                                <th  style=" border: 1px solid black; border-collapse: collapse; text-align:center;">USER</th>
                                <th  style=" border: 1px solid black; border-collapse: collapse; text-align:center;">TRACKING NO.</th>
                                <th  style=" border: 1px solid black; border-collapse: collapse; text-align:center;">PRICE</th>
                                <th  style=" border: 1px solid black; border-collapse: collapse; text-align:center;">DATE</th>
                                <th  style=" border: 1px solid black; border-collapse: collapse; text-align:center;">VIEW</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $orders = getAllOrders();
                                    if(mysqli_num_rows($orders)>0)
                                    {
                                        foreach($orders as $item)
                                        {
                                        ?>
                                            <tr style="color:black;">
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;"><?=$item['id'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center; font-weight:bold;"><?=$item['name'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;"><?=$item['tracking_no'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center; font-weight:bold;"><?=$item['total_price'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;"><?=$item['created_at'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;">
                                                    <a href="view-order.php?t=<?=$item['tracking_no'];?>" class="btn" style="color:white; background-color:rgb(220,53,69);">View Details</a>
                                                </td>
                                            </tr>
                                        <?php

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