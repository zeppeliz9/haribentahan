<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:rgb(220,53,69);">
                    <h4 style="background-color:rgb(220,53,69); color:white;">Add a Product</h4>
                    <p class="text-white mb-0">
                    The "Add Products" page on your admin dashboard streamlines the process of expanding your product inventory by providing a simple and intuitive interface for effortlessly adding new products. With convenient form fields and options to include essential details such as name, description, pricing, and images, efficiently introduce and showcase your latest offerings to your customers.
                    </p>
                </div>
                <div class="card-body">
                    <!--enctype is used for uploading image!-->
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            
                            <!--DROPDOWN BOX-->
                            <div class ="col-md-12">
                                <label for=" " style="color:black;">Select a Category</label>
                                <select required name = "category_id" class="form-select mb-2">
                                    <option selected>Choose a Category</option>
                                        <?php 
                                        $categories = getAll("categories");
                                            if(mysqli_num_rows($categories) > 0)
                                            {
                                                foreach($categories as $item)
                                                {
                                                ?>
                                                    <option style="color:black; font-weight:bold;"value ="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "No category available";
                                            }
                                        ?>

                                </select>
                            </div>
                            
                            <div class="col-md-6" mb-2>
                                <label class="mb-0" style="color:black;">Name</label>
                                <input type="text" required name = "name" placeholder = "Enter product name" class="form-control mb-2">
                            </div>
                            <div class="col-md-6" mb-2>
                                <label class="mb-0" style="color:black;">Slug (Tag)</label>
                                <input type="text" required name = "slug" placeholder = "Enter slug or tag" class="form-control mb-2">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="mb-0" style="color:black;">Small Description</label>
                                <textarea rows ="3" required name="small_description" placeholder="Enter small description" class="form-control mb-2"> </textarea>
                            </div>

                            <div class="col-md-12 mb-2">
                                <label class="mb-0" style="color:black;">Description</label>
                                <textarea rows ="3" name="description" placeholder="Enter description" class="form-control mb-2"> </textarea>
                            </div>

                            <div class="col-md-6" mb-2>
                                <label class="mb-0" style="color:black;">Original Price</label>
                                <input type="text" required name = "original_price" placeholder = "Enter original price" class="form-control mb-2">
                            </div>
                            <div class="col-md-6" mb-2>
                                <label class="mb-0" style="color:black;">Selling Price</label>
                                <input type="text" required name = "selling_price" placeholder = "Enter selling price" class="form-control mb-2">
                            </div>

                            <div class="col-md-12 mb-2">
                                <label class="mb-0" style="color:black;">Upload Image</label>
                                <input type="file" required name = "image" placeholder = "Enter image" class="form-control mb-2">
                            </div>

                            <div class="row">
                                <div class="col-md-6" mb-2>
                                    <label class="mb-0" style="color:black;">Quantity</label>
                                    <input type="number" name = "qty" placeholder = "Enter quantity" class="form-control mb-2">
                                </div>
                                <div class="col-md-3" mb-2>
                                    <label class="mb-0" style="color:black;">Private</label> <br>
                                    <input type="checkbox" name = "status">
                                </div>
                                <div class="col-md-3" mb-2>
                                    <label class="mb-0" style="color:black;">Popular</label> <br>
                                    <input type="checkbox" name = "popular">
                                </div>
                            </div>

                            <div class="col-md-12 mb-2">
                                <label class="mb-0" style="color:black;">Meta Title</label>
                                <input type="text" name = "meta_title" placeholder = "Enter meta title" class="form-control mb-2">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="mb-0" style="color:black;">Meta Description</label>
                                <textarea rows ="3" name = "meta_description" placeholder = "Enter meta description" class="form-control mb-2"> </textarea>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="mb-0" style="color:black;">Meta Keywords</label>
                                <textarea rows ="3" name = "meta_keywords" placeholder = "Enter meta keywords" class="form-control mb-2"> </textarea>
                            </div>

                            <div class="col-md-12 mb-2">
                                <button type="submit" class="btn btn-warning" style="float:right;" name="add_product_btn">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>