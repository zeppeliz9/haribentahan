<?php
//Confirms basic log-in stuff 
    session_start();

    if(isset($_SESSION['auth']))
    {

        $_SESSION['message'] = "You're already logged in, Haribon!";
        header('Location: index.php');
        exit();
    }

    include('includes/header.php');?>
    <div class="py-5">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                <?php 
                if(isset($_SESSION['message']))
                { 
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Haribon!</strong> <?= $_SESSION['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php 
                    unset($_SESSION['message']);
                }
                ?>
                    <div class="card" style="color:black; border: solid 3px;">
                        <div class="card-header"; style="background-color: rgb(220,53,69);color:black; border: solid 3px;">
                            <h4 style="text-align:center; font-weight:bold;  color:white; ">Login Form</h4>
                        </div>
                        <div class="card-body" >
                            <form action="functions/authcode.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control"  placeholder="Enter a valid email address"> 
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="login" placeholder="Choose a strong password"> <i class="bi bi-eye-slash" id="toggleLoginPassword"></i>
                                    <span style="font-size:12px;"> Show password </span>
                                </div>
     
                                <button type="submit" name="login_btn" class="btn" style="float:right; background-color:rgb(255,193,7);">Log In</button>
                            </form>
                        </div>
                    </div>
                <div>       
            </div>
        </div>
    </div>
    
        <script>
            const loginPassword = document.querySelector("#login");
            const toggleLoginPassword = document.querySelector("#toggleLoginPassword");
            toggleLoginPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = loginPassword.getAttribute("type") === "password" ? "type" : "password";
            loginPassword.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
        </script>

<?php include('includes/footer.php');?>