<?php

// include "..\config\config.php";
include "..\controller_user\dbcon.php";
 session_start();
 $sql = "SELECT * FROM user ORDER BY `created_at` DESC";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  $datas = [];
    while($data = $result->fetch_assoc()){
     $datas[] = $data;
   }
 }
//  print_r( $datas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User DashBoard</title>
    <link rel="stylesheet" href="callbacks.css">
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
              <div class="name">Wellcome Emmanuel</div>
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
            <h1>Callbacks</h1>
            <table>
              <tr>
                <th>name</th>
                <th  class="no">course</th>
                <th  class="no">phone no</th>
                <th>email address</th>
                <th>country</th>
                <th>created_at</th>
                <th>slection</th>
                <th>message</th>
                <th class="action"></th>
              </tr>
              <!-- body starts -->
              <?php if(!empty($datas)){  ?>
                <?php foreach ($datas as $data) { ?>
                  <?php if(empty($data["password"])){ ?>
                    <tr class="B-tr">
                     <td><?=$data["name"]?></td>
                     <td class="no"><?=$data["course"]?></td>
                     <td class="no"><?=$data["phoneNum"]?></td>
                     <td><?=$data["email"]?></td>
                     <td> <?=$data["country"]?></td>
                     <td class="date"><?=date("d/M/Y",strtotime($data["created_at"]))?></td>
                     <td><?=$data["radio_selection"]?></td>
                     <td><?=$data["message"]?></td>
                     <td class="action">
                         <a href="#"><li class="fa fa-plus" id="add" data-index="<?=$data["id"]?>"></li></a>
                         <a href=""><li class="fa fa-trash" id="delete" data-index="<?=$data["id"]?>"></li></a>
                     </td>
                 </tr>
                  <?php } ?>
                <?php    }  ?>
              <?php }else { ?>
              <tr>
                <td style="color: var(--headercolor);font-size: 14px;font-weight: 600;">Wellcome Admin Your Order Table is Currently Empty</td>
                 </tr>
              <?php } ?>
                 <!-- <tr class="B-tr">
                     <td>emma</td>
                     <td class="no">+625216712</td>
                     <td>edeemmanuelchizurmoke@gmail.com</td>
                     <td> nigeria</td>
                     <td class="date">03/10/20</td>
                     <td>email</td>
                     <td>no pqijqoqojojojow</td>
                     <td class="action">
                         <a href="#"><li class="fa fa-plus"></li></a>
                     </td>
                 </tr>
                 <tr class="B-tr">
                     <td>emma</td>
                     <td class="no">+625216712</td>
                     <td>edeemmanuelchizurmoke@gmail.com</td>
                     <td> nigeria</td>
                     <td class="date">03/10/20</td>
                      <td>email</td>
                     <td>no pqijqoqojojojow</td>
                     <td class="action">
                         <a href="#"><li class="fa fa-plus"></li></a>
                     </td>
                 </tr> -->
              <!-- body ends -->
                
            </table>
        </div>
        </div>
        <a href="#" id="dm"><li class="fa fa-whatsapp" ></li></a>
    </div>
</body>
<script src="assets\dist/sweetalert2.all.min.js"></script>
 <script src="users.js"></script>
 <script src="dashboard.js"></script>
</html>
<!-- [id] => 9 [name] => emmanuel [course] => [email] => eded@hdwbwdnwk [phoneNum] => 19u98 [country] => [message] => ijdjdjoq
 [radio_selection] => email [password] => secret [created_at] => 2021-12-13 09:57:22.916551 [auth] => user -->