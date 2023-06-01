<?php 
include('functions/userfunctions.php');
include('includes/header.php' );
include('includes/slider.php' );
?>

<div class="py-0">
<div class="container">
     
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h3 style="margin-top:-40px; margin-bottom:10px;">Trending Products</h3>  
                    <div class="mb-2 mt-0" style="height: 5px; width: 150px; background-color: rgb(255,193,7); border-radius: 5px;"></div>
                    <div class="owl-carousel mt-0">
                        <?php
                            $trendingProducts = getAllTrending();
                            if(mysqli_num_rows($trendingProducts) > 0)
                            {
                                foreach($trendingProducts as $item)
                                {
                                    ?>
                                        <div class="item" style="margin-top:-20px;">
                                            <a style="color:white; border-style:groove; border-width:0.5px;" href="product-view.php?product=<?=$item['slug'];?>">
                                            <div class="card" style ="color:white; background-color:rgb(220,53,69); border-color:rgb(33,2,3); box-shadow:rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px; border-width:thin;">
                                                <div class="card-body">
                                                    <img src="uploads/<?=$item['image'];?>" alt="Product Image" width ="200px" height ="250px">
                                                    <h5 class = "text-center mt-3"><?=$item['name'];?></h5>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div> 
                </div>
            </div>
        </div>

    <div class="py-5">
        <div class="container">     
            <div class="row">
                <div class="col-md-12">
                    <h3 style="margin-top:-50px;">About Us</h3>    
                    <div class="mb-2" style="height: 5px; width: 150px; background-color: rgb(255,193,7); border-radius: 20px;"></div>
                    <p> <span style="font-weight:bold;"> Pamantasan ng Lungsod ng Maynila Multi-purpose Credit Cooperative</span>, affectionately referred to as the PLM COOP, offers a comprehensive solution for all your school uniform requirements. With its extensive range of clothing options, the PLM COOP caters to the diverse needs and preferences of the students. Whether you're looking for the traditional uniform or a modern twist, the cooperative has got you covered. The PLM COOP prides itself on providing high-quality garments that meet the school's standards, ensuring durability and comfort. With its convenient location within the university premises, the PLM COOP offers a hassle-free shopping experience, making it the go-to destination for students in search of their school uniforms.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5" style="background-color:rgb(255,193,7);">
        <div class="container">     
            <div class="row" style="margin-top: -50px;">
                <div class="col-md-3">
                    <h4>Haribentahan</h4>    
                    <div class="mb-2" style="height: 5px; width: 150px; background-color: rgb(220,53,69); border-radius: 20px;"></div>
                    <a href="index.php" style="color:black"><i class="fa fa-angle-right"></i> Home</a><br>
                    <a href="#" style="color:black"><i class="fa fa-angle-right"></i> About Us</a><br>
                    <a href="cart.php" style="color:black"><i class="fa fa-angle-right"></i> Cart</a><br>
                    <a href="categories.php" style="color:black"><i class="fa fa-angle-right"></i> Hari-bilihin</a><br>
                </div>
                <div class="col-md-3">
                    <h4>Address</h4>
                    <p>
                        Library Basement 
                        General Luna, corner Muralla St 
                        Intramuros, Manila 
                        1002 Metro Manila
                    </p>
                    <a style="color:black;" href="tel:+639774542571"><i class="fa fa-phone">+63 9774542571</i> <br>
                    <a style="color:black;" href="tel:+639064870036"><i class="fa fa-phone">+63 9064870036</i></a> <br>
                    <a style="color:black;" href="https://www.facebook.com/PLMUniform"><i class="fa fa-facebook-square"> PLM COOP's Facebook Page</i></a>
                </div> 
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d482.65048757613897!2d120.97582073610683!3d14.587454200000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTTCsDM1JzE0LjMiTiAxMjDCsDU4JzM1LjciRQ!5e0!3m2!1sen!2sph!4v1685178871362!5m2!1sen!2sph" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2 bg-danger">
        <div class="text-center">
            <p class="mb-0 text-white">  All rights reserved. Copyright @ <a href="https://www.facebook.com/dbls95" target="blank" class="text-white">BSCpE 2-1 - Group 4 (Software Design)</a> - <?=date('F Y')?></p>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>

<script>
    //For carousel, obviously
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{ //mobile
                items:1
            },
            600:{ //smaller device
                items:3
            },
            1000:{ //desktop
                items:4
            }
        }
    })
</script>