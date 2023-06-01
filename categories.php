<?php
//ERRORS IN CAT COULD COME FROM ECHO ELSE PART!!! 
include('functions/userfunctions.php');
include('includes/header.php');

?>
<div class="py-0 bg-warning" style="margin-top:-40px;">
    <div class="container">
        <h6 class="text-white"><a href="index.php" style="color:white;">Home</a> / Hari-bilihin</h6>
    </div>
    <hr>
</div>
<div class="py-0" style="margin-top:-50px;">
        <div class="container">     
            <div class="row">
                <div class="col-md-12 mt-0">
                    <h1><b>COOP-Certified Choices</b></h1>
                    <hr style="border: 3px solid rgb(255,193,7); border-radius: 2px;">
                    <p>Your needs have been categorized for easier browsing. Choose among the following categories below to find your desired product.</p>
                    <hr>
                    <div class="row">
                        <?php 
                        $categories =  getAllActive("categories");
                        if(mysqli_num_rows($categories) > 0)
                        {
                            foreach($categories as $item)
                            {
                                ?>
                                    <div class="col-md-3">
                                        <a href="products.php?category=<?=$item['slug'];?>">
                                        <div class="card"  style= "box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                                            <div class="card-body" style ="border-style:solid; border-width:thin; background-color:rgb(235,25,60); border-color:rgb(33,2,3); box-shadow:rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
                                                <img src="uploads/<?=$item['image'];?>" alt="Category Image" width ="200px" height ="250px">
                                                <h4 class = "text-center mt-3" style="color:white; font-weight:bold;"><?=$item['name'];?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            //echo "No data available";
                            echo mysqli_num_rows($categories);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php');?>