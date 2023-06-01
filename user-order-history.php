<?php 
//This is to view all order history on the admin side
include('functions/userfunctions.php');
include('includes/header.php' );

$userId = $_SESSION['auth_user']['user_id'];

?>

<div class="py-3 bg-warning" style="margin-top:-55px;">
    <div class="container">
        <h6 class="text-white">
        <a href = "index.php" class ="text-white">     
        Home / 
        </a>
        <a href = "my-orders.php"class ="text-white">
        Order History</h6>
        </a>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h4 class="text-black" style="font-weight:bold; margin-top:-30px;">Order History</h4>
        <hr>
        <p class="text-black mb-0">
                    The "Order History" page offers a convenient overview of all your past orders, enabling you to track and manage your purchases.
                    </p>
                    <hr>
            <div class="card">
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
                                    if(mysqli_num_rows($orders)>0)
                                    {
                                        foreach($orders as $item)
                                        {
                                            if($item['user_id'] == $userId)
                                            {
                                                if($item['status'] != 1 && $item['status'] != 0)
                                                {
                                                    ?>
                                            <tr style="color:black; text-align:center;">
                                                <td style=" border: 1px solid black; border-collapse: collapse;"><?=$item['id'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; font-weight:bold;"><?=$item['name'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse;"><?=$item['tracking_no'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse; font-weight:bold;"><?=$item['total_price'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse;"><?=$item['created_at'];?></td>
                                                <td style=" border: 1px solid black; border-collapse: collapse;">
                                                    <a href="view-order.php?t=<?=$item['tracking_no'];?>" class="btn text-white" style="background-color: rgb(220,53,69);">View Details</a>
                                                </td>
                                                <td style=" border: 1px solid black; border-collapse: collapse;">
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