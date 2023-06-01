<footer class="footer pt-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-12">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-link text-muted">Programmers (reach them if problems arise):</li>
              <li class="nav-item">
                <a href="https://www.facebook.com/dbls95" class="nav-link text-muted">David Sentasas</a>
              </li>
              <li class="nav-item">
                <a href="https://www.facebook.com/profile.php?id=100009498356609" class="nav-link text-muted">Lane La Torre</a>
              </li>
              <li class="nav-item">
                <a href="https://www.facebook.com/allen.tutaness" class="nav-link text-muted">Christopher Tutanes</a>
              </li>
              <li class="nav-item">
                <a href="https://www.facebook.com/chad.cacal.5" class="nav-link text-muted">Chad Cacal</a>
              </li>
              <li class="nav-item">
                <a href="https://www.facebook.com/angel.cualbar.5" class="nav-link pe-0 text-muted">Mae Cualbar</a>
              </li>
              <li class="nav-item">
                <a href="https://www.facebook.com/smowii" class="nav-link pe-0 text-muted">Anthony Solis</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
</main>

<!--SOURCE FILES USED, JQUERY ALWAYS ON TOP-->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="assets/js/custom.js"></script>
  
  <!--Alertify JS IN LOGIN-->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script> 

    <?php 
      if(isset($_SESSION['message'])) 
      { 
        ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<?= $_SESSION['message']; ?>');
        <?php 
        unset($_SESSION['message']);
      } 
      ?>
  </script>
</body>
</html>