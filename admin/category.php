<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: rgb(220,53,69);">
                    <h4 style="color:white;">Categories</h4>
                    
                    <p class="text-white mb-0">
                        View, edit and delete your specific categories in this page. Click the "EDIT" button to change product name, slug,
                        description, quantity, price, and more. Click the "DELETE" button to remove a specific category from the catalog.
                    </p>
                </div>
                    <div class="card-body" id ="category_table">
                        <table class="table table-bordered" style="border:1px solid;">
                            <thead>
                                <tr style="background-color: rgb(255,193,7);color:black; border:1px solid black;">
                                    <th style="text-align:center">ID</th>
                                    <th style="text-align:center">NAME</th>
                                    <th style="text-align:center">IMAGE</th>
                                    <th style="text-align:center">STATUS</th>
                                    <th style="text-align:center">ACTION</th>
                                </tr>   
                            </thead>
                            <tbody style="border:1px solid; color:black;">
                                <?php
                                
                                    $category = getAll("categories");
                                    if(mysqli_num_rows($category) > 0)
                                    {
                                        foreach($category as $item)
                                        {
                                            ?>

                                                <tr>
                                                    <td style="border:1px solid; text-align:center;"><?= $item['id']; ?></td>
                                                    <td style="text-align:center; font-weight:bold; color:black;"><?= $item['name']; ?></td>
                                                    <td style="border:1px solid; text-align:center;">
                                                        <img style="display: block; margin-left: auto; margin-right: auto;"  src = "../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt ="<?= $item['name']; ?>">
                                                    </td>
                                                    <td  style="border:1px solid; text-align:center;"><?= $item['status'] == '0' ? "Public":"Hidden"?>
                                                    </td>

                                                    <td style="border:1px solid; text-align:center;">
                                                       <a href = "edit-category.php?id=<?= $item['id'];?>" class="btn" style="background-color: rgb(255,193,7); color:black; font-size:12px;">Edit</a>
                                                        <!--REMOVED A PORTION, SEE PALETTE-->
                                                        <button type="button" class="btn btn-sm btn-danger delete_category_btn" style="background-color: rgb(220,53,69); color:white;font-size:14px;" value="<?=$item['id'];?>">Delete</button> 
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