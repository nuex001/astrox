<?php

include "..\config\config.php";
include "..\controller_user\dbcon.php";
 session_start();

  if (!empty($_POST["submit"])) {
    //  print_r($_POST); 
     $error = [];
     $emailerror;
     $id = $_SESSION["id"];
     $useremail =  $_SESSION["email"];
     $currency = mysqli_real_escape_string($conn, $_POST['currency']);
     $ammount = mysqli_real_escape_string($conn, $_POST['ammount']);
    //  $slip = mysqli_real_escape_string($conn, $_POST['images']);
     if (empty($currency)) {
        $error["currency"] ='currency empty'; 
     }
     if (empty($ammount)) {
        $error["ammount"] ='ammount empty'; 
     }
       // for empty image input
  if (!empty($_FILES)) {
    $file= $_FILES['images'];
  $size =  $file["size"];
  $type= $file["type"];
  $tmp_location = $file["tmp_name"];
  /**checking if they is any error or if it is empty */
  if ($file["error"] > 0) {
      $error['image']="error occured in the image input";
      $error['empty']="empty border";

  } else{
      $target_dir ="assets/order-images/";
      $file_ext = explode('/', $type);
      $image_ext = strtolower(end($file_ext));
      $image = hash("sha256", uniqid());
      $image_name = substr($image,0,15);
      $image_path = $target_dir .$image_name.".".$image_ext;
      if (move_uploaded_file($tmp_location, $image_path)) {
          // return $image_path;
      }else{
          $error['image']="error occured in the image input";
      }
  }
 
} else{/**end ofimage validation */
    $error['image']="error occured in the image input";
    }/** end of validating else */
    
    if (empty($error)) { /**begining of sending email */
        $subject = APP_NAME;
        $to =$useremail;
        $headers = "MIME-Version:1.0" . "\r\n";
        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From:'. EMAIL . "\r\n";
        $body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="email.css">
        </head>
        <body>
           <div class="container" style=" width: 100%;height: 100vh;display: flex;align-items: center;justify-content: center;">
               <div class="box" style="width: 30%;height: 200px;padding: 10px 10px;background-color: #121212;border-radius: 10px;display: block;">
                  <h4 style=" text-transform: uppercase;font-family:monospace;color:#2CB979;">'.APP_NAME.'</h4>
                  <img src="'.APP_LOGO.'" alt="">
                   <div class="child" style=" width: 100%;height: auto;padding:10px 10px;margin: 10px auto;text-align: center;display: flex;justify-content: center;align-items: center;color: green;">
                       <h4 style=" text-transform: uppercase;font-family:monospace;">Order made successfully</h4>
                    </div>
                   <div class="child" style=" width: 100%;height: auto;padding:10px 10px;margin: 0px auto;text-align: center;display: flex;justify-content: center;align-items: center;color: #fff;">
                   <h5 style=" text-transform: uppercase;font-family:monospace;">we recieved your orders and we are currently reviewing it,
                       we will get back to you soon
                   </h5>
                   </div>
               </div>
           </div>
        </body>
        </html>
        ';
    //  sending mail  
        if (mail($to,$subject,$body,$headers)) {
        $Success = "email sent successfully";
        // echo $Success;
        $sql = "INSERT INTO `billing` (`id`, `user_id`, `method`, `Amount`, `paymentSlip`, `status`, `created_at`) 
        VALUES (NULL, '$id', '$currency', '$ammount', '$image_path', '', current_timestamp());";
        $inserted_data = mysqli_query($conn, $sql);
        if ($inserted_data) {
            // echo "inserted";
        }else{
            $emailerror="error occured in email transaction";
        }
        // die();
        }else{
            $emailerror="error occured in email transaction";
        //    echo "error";
        }
    }/**end of sending email */
     
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=APP_NAME?></title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="/assests/fa/css/font-awesome.css">
    <link rel="stylesheet" href="assets\fa\css\font-awesome.css">
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
                 <span></span>  
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
            <h1>payment address</h1>
           
            <div class="child">'
            <!-- 1' -->
            <div class="box">
                <h3>Bitcion</h3>
                <input style="opacity:0; width:0px;Height:0px" readonly type="text" value="neuekeekekke1"  id="addreess">
              <button data-index="1">copy</button>
            </div>
                <!-- 2' -->
            <div class="box">
                <h3>litcum</h3>
                <input style="opacity:0; width:0px;Height:0px" readonly type="text" value="neuekeekekke2"  id="addreess">
              <button data-index="2">copy</button>
            </div>
                <!-- 3' -->
            <div class="box">
                <h3>minecoin</h3>
                <input style="opacity:0; width:0px;Height:0px" readonly type="text" value="neuekeekekke3"  id="addreess">
              <button data-index="3">copy</button>
            </div>
                <!-- 4' -->
            <div class="box">
                <h3>paypal</h3>
                <input style="opacity:0; width:0px;Height:0px" readonly type="text" value="neuekeekekke4"  id="addreess">
              <button data-index="4">copy</button>
            </div>
            </div>
            <h1>payment</h1>
            <form action="" method="POST" enctype="multipart/form-data">
            <?php if(!empty($_POST["submit"])){ ?>
                        <?php if (!empty($error)) { ?>
                            <span style="color:crimson;">please fill in all the required details</span>
                        <?php  }else {  ?>
                            <?php if (!empty($emailerror)) { ?>
                        <span style="color:crimson;">An error occured Try agian Later</span>
                        <?php }else { ?>
                            <span style="color:green;">Transaction successfull</span>
                            <?php }  ?>
                            <?php }  ?>
                        <?php  }  ?>
                <select name="currency" id="">
                    <option value="">currency</option>
                    <option value="Bitcion">Bitcoin</option>
                    <option value="Bitcion">Bitcoin</option>
                    <option value="Bitcion">Bitcoin</option>
                </select>
                <input type="text" placeholder="Ammount" name="ammount">
                <input type="file" accept="\*images" name="images" id="images">
                <input type="submit" value="submit_order" name="submit">
            </form>
        </div>
        </div>
    </div>
</body>
 <script src="dashboard.js"></script>
</html>
    