<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php'); 

?>

<div class="container" style="border border-style: solid; border-width: medium;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"  style="background-color:rgb(220,53,69); color:white;">
                    <h4 class="text-white">Add a Category</h4>
                    <p class="text-white mb-0">
                        Create your own category here. Enter the required information into their respective fields
                        and click save to successfully add a catergory. Tick the "Private" button to hide the category.
                        A "slug" is a tag added to the end of a link to locate a specific product. 
                    </p>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="col-md-6" style= "color:white;">
                                <label style="color:black;">Name</label>
                                <input type="text" name = "name" placeholder = "Enter desired category" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label style="color:black;">Slug (Tag)</label>
                                <input type="text" name = "slug" placeholder = "Enter slug" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3 mt-3">
                                <label style="color:black;">Description</label>
                                <textarea rows ="3" name="description" placeholder="Enter description" class="form-control"> </textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label style="color:black;">Upload Image</label>
                                <input type="file" name = "image" placeholder = "Enter image" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label style="color:black;">Meta Title</label>
                                <input type="text" name = "meta_title" placeholder = "Enter meta title" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label style="color:black;">Meta Description</label>
                                <textarea rows ="3" name = "meta_description" class="form-control"> </textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label style="color:black;">Meta Keywords</label>
                                <textarea rows ="3" name = "meta_keywords" class="form-control"> </textarea>
                            </div>
                            <div class="col-md-6" style="text-align:center;">
                                <input type="checkbox" name = "status">
                                <label style="color:black;">Private  </label>
                            </div>
                            <div class="col-md-6" style="text-align:center;">
                                <input type="checkbox" name = "popular">
                                <label style="color:black;">Popular  </label>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning" name="add_category_btn" style="float:right;">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>