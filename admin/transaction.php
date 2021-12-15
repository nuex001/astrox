<?php

// include "..\config\config.php";
include "..\controller_user\dbcon.php";
 session_start();
 $sql = "SELECT * FROM billing ORDER BY `created_at` DESC";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  $datas = [];
    while($data = $result->fetch_assoc()){
     $datas[] = $data;
   }
 }
//  print_r ($datas);
//  die();
  if (!empty($_POST["status"])) {
    // print_r($_POST);
    $order_id = $_POST["id"];
    $sql = "UPDATE `billing` SET `status` = 'declined' WHERE `billing`.`id` =$order_id;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: transaction.php");
    }
  
  }

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
              <div class="name">Wellcome Admin</div>
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
            
            <?php include_once "includes\dp.php" ?>
            
            </div>

        </div>
        <div class="body-cont">
      <?php include_once "includes\side-bar.php" ?>
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
                 <?php    if(empty($data["status"])){  ?>
                    <tr class="B-tr">
                     <td><?=$data["method"]?></td>
                     <td class="date"><?=$data["Amount"]?></td>
                     <td><img src="../user/<?=$data["paymentSlip"]?>" alt="" data-src="../user/<?=$data["paymentSlip"]?>" id="show_btn"></td>
                     <td> 
                    <form action="" method="POST">
                      <input type="text" style="display:none" name="id" value="<?=$data["id"]?>">  
                      <input type="submit" value="approved" name="status">
                    </form>
                     <form action="" method="POST">
                       <input type="text" style="display:none" name="id" value="<?=$data["id"]?>">  
                       <input type="submit" value="declined" name="status">
                     </form>
                    </td>
                     <td class="date"><?=date("d/M/Y",strtotime($data["created_at"]))?></td>
                     <td class="action">
                         <a href=""><li class="fa fa-trash" id="delete" data-index="<?=$data["id"]?>"></li></a>
                     </td>
                 </tr>
                 <?php    } /**end of checking if it,s not pending */ ?>
                 <?php    } /**end of foreach */ ?>

              <?php }else{   ?>
                <tr>
                <td style="color: var(--headercolor);font-size: 14px;font-weight: 600;">Wellcome Admin Your Order Table is Currently Empty</td>
                 </tr>
              <?php }   ?> 
            </table>
        </div>
        </div>
        <div class="pop-up">
            <li class=" fa fa-times" id="popup_btn"></li>
            <img src="" alt="" id="display_box">
        </div>
        <!-- <a href="#" id="dm"><li class="fa fa-whatsapp" ></li></a> -->
    </div>
</body>
<script src="assets\dist/sweetalert2.all.min.js"></script> 
 <script src="dashboard.js"></script>
 <script src="transaction.js"></script>
</html>