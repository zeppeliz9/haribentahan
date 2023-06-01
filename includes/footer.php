<!--All JS FILES ARE HERE-->
    <script src= "assets/js/jquery-3.7.0.min.js"></script>
    <script src = "assets/js/bootstrap.min.js"></script>
    <script src = "assets/js/custom.js"></script>
    <script src = "assets/js/owl.carousel.min.js"></script>
     <!--Alertify JS IN LOGIN-- https://code.jquery.com   integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous">-->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script> 
    alertify.set('notifier','position', 'top-right');
    <?php 
      if(isset($_SESSION['message'])) 
      { 
        ?>
        alertify.success('<?= $_SESSION['message']; ?>');
        <?php 
        unset($_SESSION['message']);
      } 
      ?>
  </script>

<script> //FOR SHOW PASSWORD!
        const togglePassword = document.querySelector("#togglePassword");
        const toggleCheckPassword = document.querySelector("#toggleCheckPassword");
        const toggleLoginPassword = document.querySelector("#toggleLoginPassword");
        const password = document.querySelector("#password");
        const checkPassword = document.querySelector("#checkPassword");
        
        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "type" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
        
        toggleCheckPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = checkPassword.getAttribute("type") === "password" ? "type" : "password";
            checkPassword.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

       

    </script>

  </body>
</html>     
