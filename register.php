<?php 
    session_start();

    if(isset($_SESSION['auth']))
    {

        $_SESSION['message'] = "You're already logged in, Haribon!";
        header('Location: index.php');
        exit();
    }

    include('includes/header.php');?>
    <div class="py-5">
        <div class="container" style="margin-top:-88px;">
            <div class="row justify-content-center">
                <div class="col-md-6">
                <?php 
                if(isset($_SESSION['message']))
                { 
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Some fields are wrong!</strong> <?= $_SESSION['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php 
                    unset($_SESSION['message']);
                }
                ?>
                    <div class="card mt-0" style="border: solid 2px;">
                        <div class="card-header" style="color:black; border: solid 3px;background-color: rgb(220,53,69);">
                            <h4 class="text-center mb-0" style="font-weight:bold; color:white;">Registration Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="functions/authcode.php" method="POST">
                            <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter full name, e.g. Juan Dela Cruz">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">PLM Email address</label>
                                    <input type="email" name="email" class="form-control"  placeholder="Enter your PLM email address"> 
                                </div>
                                <div class="mb-3">
                                    <label class = "form-label">Phone</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Enter phone number, e.g. 9972912321"> 
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Choose a strong password">  <i class="bi bi-eye-slash" id="togglePassword"></i>
                                        <span style="font-size:12px;"> Show password </span>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="checkPassword">Confirm Password</label>
                                    <input type="password" name="checkPassword" class="form-control" id="checkPassword" placeholder="Confirm your Password"> <i class="bi bi-eye-slash" id="toggleCheckPassword"></i>
                                        <span style="font-size:12px;"> Show password </span>
                                </div>

                                <button type="submit" name="register_btn" class="btn" style="float:right; background-color:rgb(220,53,69); color:black; background-color:rgb(255,193,7);">Submit</button>
                            </form>
                        </div>
                    </div>
                <div>       
            </div>
        </div>
    </div>


<?php include('includes/footer.php');?>
