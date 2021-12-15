<?php
include "..\config\config.php";
?>

<div class="dp">
              <li class="fa fa-user" id="user-btn"></li>
                <div class="dp-box">
                    <a href="dashborad.php" class="box">
                        <li class="fa fa-dashboard"></li>dashboard
                    </a>
                    <a href="<?=APP_URL?>" class="box">
                        <li class="fa fa-home"></li> Home
                    </a>
                    <a href="logout.php" class="box">
                        <li class="fa fa-power-off"></li> Logout
                    </a>
                </div>
            </div>