<?php 
//This is to view all order history on the admin side
include('../Middleware/adminMiddleware.php');
include('includes/header.php' );
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:rgb(220,53,69); border:thin;" >
                    <h4 class="text-white">Order History</h4>
                    <p class="text-white mb-0">
                    The "Order History" page offers a convenient overview of all past orders, enabling you to track and manage the entire history of customer transactions. With detailed information on order dates, statuses, and customer details, efficiently analyze and monitor your business's sales performance and customer activity.
                    </p>
                </div>
                    <div class="card-body" id ="">
                    <table class="table table-bordered;" style="border:thin black;">
                        <thead style="background-color: rgb(255,193,7); border:thin black;">
                            <tr style="text-align:center; color:black; border:thin black">
                                <th style=" border: 1px solid black; border-collapse: collapse; text-align:center;">ID</th>
                                <th style=" border: 1px solid black; border-collapse: collapse; text-align:center;">USER</th>
                                <th style=" border: 1px solid black; border-collapse: collapse; text-align:center;">TRACKING NO.</th>
                                <th style=" border: 1px solid black; border-collapse: collapse; text-align:center;">PRICE</th>
                                <th style=" border: 1px solid black; border-collapse: collapse; text-align:center;">DATE</th>
                                <th style=" border: 1px solid black; border-collapse: collapse; text-align:center;">VIEW</th>
                                <th style=" border: 1px solid black; border-collapse: collapse; text-align:center;">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $orders = getOrderHistory();
                                    $completedOrdersSum=0;
                                    if(mysqli_num_rows($orders)>0)
                                    {
                                        foreach($orders as $item)
                                        {
                                            if($item['status'] != 1)
                                            {
                                        
                                        ?>
                                            <tr style="color:black;">
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;"><?=$item['id'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center; font-weight:bold;"><?=$item['name'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;"><?=$item['tracking_no'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center; font-weight:bold;"><?=$item['total_price'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;"><?=$item['created_at'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;">
                                                    <a href="view-pending-orders.php?t=<?=$item['tracking_no'];?>" class="btn text-white" style="background-color: rgb(220,53,69);">View Details</a>
                                                </td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; text-align:center;">
                                                <?php 
                                                if($item['status']== 1)
                                                {
                                                    ?> <span style="color:green; font-weight:bold;"><?php echo "ACCEPTED";?></span><?php
                                                } 
                                                else if($item['status']== 2)
                                                {
                                                    ?> <span style="color:gray;"><?php echo "COMPLETED";?></span><?php
                                                }
                                                else if($item['status']== 3)
                                                {
                                                    ?> <span style="color:red; font-weight:bold;"><?php echo "DECLINED";?></span><?php 
                                                }
                                                else
                                                {
                                                    echo "UNDER PROCESSING"; 
                                                }
                                                ?></td>
                                            </tr>
                                            <?php }?>
                                        <?php
                                            if ($item['status']== 2)
                                            {
                                            $completedOrdersSum += $item['total_price'];
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
                    <div class="card" style="float:right;">
                        <div class="card-header mt-2 py-0" style="background-color: rgb(255,193,7); font-weight:bold; color:black;">Total Received:</div> 
                            <h5 class="text-black mt-2" style="text-align:center; ">Php <?=$completedOrdersSum;?></h5>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>