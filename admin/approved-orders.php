<?php 
//This is to view all APPROVED orders on the admin side
include('../Middleware/adminMiddleware.php');
include('includes/header.php' );
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:rgb(220,53,69);"> 
                    <h4 class="text-white">Approved Orders</h4>
                    <p class="text-white mb-0">
                        All approved orders are located here. This is the main landing page for the admin dashboard so transaction
                        becomes easier and much more convenient. Once orders are completed, click the "DETAILS" button and change the 
                        status of the order to "COMPLETED". Completed orders are found in the "Pending Orders" tab, inside "Order History".
                    </p>
                </div>
                    <div class="card-body" id ="">
                    <table class="table table-bordered" style="border:thin black;">
                        <thead style="background-color: rgb(255,193,7);">
                            <tr style="text-align:center; color:black;">
                                <th>ID</th>
                                <th>USER</th>
                                <th>TRACKING NO.</th>
                                <th>PRICE</th>
                                <th>DATE</th>
                                <th>VIEW</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $orders = getOrderHistory();
                                    if(mysqli_num_rows($orders)>0)
                                    {
                                        foreach($orders as $item)
                                        {
                                        ?>
                                            <tr style="color:black;">
                                                <?php
                                                if ($item['status'] == 1)
                                                { ?>

                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;"><?=$item['id'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center; color:black; font-weight:bold;"><?=$item['name'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;"><?=$item['tracking_no'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center; color:black; font-weight:bold;"><?=$item['total_price'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;"><?=$item['created_at'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;">
                                                    <a href="view-approved-order.php?t=<?=$item['tracking_no'];?>" class="btn btn-sm text-white" style="background-color: rgb(220,53,69);"> Details</a>
                                                </td>
                                                <?php }
                                                ?>
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