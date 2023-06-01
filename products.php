<?php
//This is for category cards to be clickable 
include('functions/userfunctions.php');
include('includes/header.php');

//Check if link with slug exists or not
if(isset($_GET['category']))
{
    $category_slug = $_GET['category']; //Get slug of specific category for reference
    $category_data = getSlugActive("categories",$category_slug);
    $category = mysqli_fetch_array($category_data);
    
    if ($category) //Check if category query works
    {

    $cid = $category['id'];
    ?>

    <div class="py-3 bg-warning">
        <div class="container" style="margin-top:-55px;">
            <h6 class="text-white">
                <a class = "text-white" style="text-decoration: none;" href="categories.php"> 
                    Home /
                </a>
                <a class = "text-white" style="text-decoration: none;" href="categories.php"> 
                    Collections / 
                </a>
                <?=$category['name'];?></h6>
        </div>
    </div>
    <div class="py-3">
        <div class="container" style="margin-top:-40px;">     
            <div class="row">
                <div class="col-md-12">
                    <h2><b><?=$category['name'];?></b></h2>
                    <hr style="border: 3px solid rgb(255,193,7); border-radius: 2px;">
                    <p>Below you can find the various products under your specific chosen category. Feel free to buy them with your heart's desire!</p>
                    <hr>
                    <div class="row">
                        
                        <?php 
                        $products =  getProdByCategory($cid);
                        if(mysqli_num_rows($products) > 0)
                        {
                            foreach($products as $item)
                            {
                                ?>
                                    <div class="col-md-3">
                                        <a href="product-view.php?product=<?=$item['slug'];?>">
                                        <div class="card mb-4" style ="color:white; border-style:solid; background-color:rgb(235,25,60); border-color:rgb(33,2,3); box-shadow:rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px; border-width:thin;">
                                            <div class="card-body">
                                                <img src="uploads/<?=$item['image'];?>" alt="Product Image" width ="200px" height ="250px">
                                                <h4 class = "text-center mt-3"><?=$item['name'];?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No data available";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    }

    else //Can insert button that redirects back to categories page
    {
        echo "Something went wrong!";
    }

}
else //Can insert button that redirects back to categories page
{
    echo "Something went wrong!";
}
include('includes/footer.php');?>