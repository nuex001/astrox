<?php

include "..\config\config.php";
include "..\controller_user\dbcon.php";
 session_start();
 $id = $_SESSION["id"];
 $useremail =  $_SESSION["email"];
  
 $sql = "SELECT * FROM billing WHERE `user_id` = $id";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  $datas = [];
    while($data = $result->fetch_assoc()){
     $datas[] = $data;
   }
 }
//  print_r ($datas);
//  die();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User DashBoard</title>
    <link rel="stylesheet" href="transaction.css">
    <link rel="stylesheet" href="/assests/fa/css/font-awesome.css">
    <link rel="stylesheet" href="assets\fa\css\font-awesome.css">
    <link rel="stylesheet" href="assets\dist\sweetalert2.css">

</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="menu">
                <li class="fa fa-bars" id="bars" onclick="menufunction()"></li>
                <a href="#"><img src="assets/img/logo_01.png" alt=""></a>
            </div>
          <div class="user-info">
              <div class="name">Wellcome <?=$_SESSION["userName"]?></div>
              <div class="notification">
                 <span>1</span>  
                <li class="fa fa-bell"  id="notification-btn"></li>
                <div class="nofification-cont">
                    <h1>NOTIFICATION</h1>
                    <a href="#" class="box">
                        <img src="/assests/images/sidekix-media-KiUg-4xmTwo-unsplash.jpg" alt="">
                        <div class="text">
                            <h2>New Creation Has Created
                                <date>10/20th/20</date>
                            </h2>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </a>
                </div>
            </div>
              <div class="dp">
              <li class="fa fa-user" id="user-btn"></li>
                <div class="dp-box">
                    <a href="dashborad.php" class="box">
                        <li class="fa fa-dashboard"></li> dashboard
                    </a>
                    <a href="<?=APP_URL?>" class="box">
                        <li class="fa fa-home"></li> Home
                    </a>
                    <a href="logout.php" class="box">
                        <li class="fa fa-power-off"></li> Logout
                    </a>
                </div>
            </div>
            
            </div>

        </div>
        <div class="body-cont">
        <?php  include_once ".\includes\side-bar.php" ?>
        <div class="body">
        <h1>transactions</h1>
            <table>
              <tr>
                <th>currency</th>
                <th  class="no">ammount</th>
                <th>payment_slip</th>
                <th>status</th>
                <th>created_at</th>
                <th class="action"></th>
              </tr>
              <!-- body starts -->
              <?php if(!empty($datas)){   ?>

                 <?php foreach ($datas as $data) { ?>
                 <?php    if(!empty($data["status"])){  ?>
                    <tr class="B-tr">
                     <td><?=$data["method"]?></td>
                     <td class="date"><?=$data["Amount"]?></td>
                     <td><img src="<?=$data["paymentSlip"]?>" alt=""></td>
                     <?php if($data["status"] != "approved"){  ?>
                        <td class="bad"style="color:crimson;"> <li class="fa fa-times"><?=$data["status"]?></li></td>
                     <?php }else{ ?>
                     <td class="good"style="color:green;"> <li class="fa fa-check"><?=$data["status"]?></li></td>
                     <?php  } ?>
                     <td class="date"><?=date("d/M/Y",strtotime($data["created_at"]))?></td>
                     <td class="action">
                     <a href=""><li class="fa fa-trash" id="delete" data-index="<?=$data["id"]?>" data-user="<?=$id?>"></li></a>
                     </td>
                 </tr>
                 <?php    } /**end of checking if it,s not pending */ ?>
                 <?php    } /**end of foreach */ ?>

              <?php }else{   ?>
                <tr>
                <td style="color: var(--headercolor);font-size: 14px;font-weight: 600;">Wellcome <?=$_SESSION["userName"]?> Your Order Table is Currently Empty</td>
                 </tr>
              <?php }   ?>
                
              <!-- body ends -->
               
            </table>
        </div>
        </div>
        <a href="#" id="dm"><li class="fa fa-whatsapp" ></li></a>
    </div>
</body>
<script src="assets\dist/sweetalert2.all.min.js"></script> 
 <script src="dashboard.js"></script>
 <script src="transaction.js"></script>
</html>
<!-- [1] => Array ( [id] => 3 [user_id] => 9 [method] => Bitcion [Amount] => 
24343 [paymentSlip] => assetsorder-images/c6caae28f59789a.png [status] => pending [created_at] => 2021-12-13 10:32:22 )  -->