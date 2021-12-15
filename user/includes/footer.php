<?php
 require_once '../config.php';
?>

<footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                <i class="fa fa-heart"></i> by
                <a href="<?=APP_PATH?>" class="font-weight-bold" target="_blank"><?=APP_NAME?></a>
                for a better PROGRAMME.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <!-- <li class="nav-item">
                  <a href="https://www.creative-tim.com/" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li> -->
                <li class="nav-item">
                  <a href="http://localhost/www.astrofxc.com/aboutus.php" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost/www.astrofxc.com/courses.php" class="nav-link text-muted" target="_blank">Corses</a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost/www.astrofxc.com/privacy-policy.php" class="nav-link pe-0 text-muted" target="_blank">privacy</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>