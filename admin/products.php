<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: rgb(220,53,69);" >
                    <h4 style="color:white;">Products</h4>
                    <p class="text-white mb-0">
                    The "View All Products" page on your dashboard provides a comprehensive display of all the products available in your inventory, allowing you to easily navigate and manage your entire product catalog from a centralized location. With a user-friendly interface and intuitive filtering options, efficiently oversee and make informed decisions regarding your product offerings.
                    </p>
                </div>
                    <div class="card-body" id = "products_table">
                        <table class="table table-bordered" style="border:1px solid;">
                            <thead style="border:1px solid; color:black; background-color: rgb(255,193,7);  text-align:center ">
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>IMAGE</th>
                                    <th>STATUS</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>   
                            </thead>
                            <tbody style="border:1px solid; color:black; text-align:center;">
                                <?php
                                
                                    $products = getAll("products");
                                    if(mysqli_num_rows($products) > 0)
                                    {
                                        foreach($products as $item)
                                        {
                                            ?>

                                                <tr>
                                                    <td  style="border:1px solid;"><?= $item['id']; ?></td>
                                                    <td style="border:1px solid; font-weight:bold;"><?= $item['name']; ?></td>
                                                    <td style="border:1px solid;">
                                                        <img src = "../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt ="<?= $item['name']; ?>">
                                                    </td>
                                                    <td style="border:1px solid;"><?= $item['status'] == '0' ? "Public":"Hidden"?>
                                                    </td>

                                                    <td style="border:1px solid;">
                                                        <a href = "edit-product.php?id=<?= $item['id'];?>" class="btn" style="font-size:12px; color:black; background-color: rgb(255,193,7);">Edit</a>
                                                       
                                                    </td>
                                                    <td style="border:1px solid;">
                                                            <button type="button" class="btn delete_product_btn" style="font-size:12px; color:white; background-color: rgb(220,53,69);" value="<?=$item['id'];?>">Delete</button> 
                                                    </td>    
                                                </tr>
                                            <?php
                                        }
                                    } 

                                    else
                                    {
                                        echo "No records found.";
                                    }
                                ?>

                               
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>