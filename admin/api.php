<?php

include "..\config\config.php";
include "..\controller_user\dbcon.php";
 session_start();
if (!empty($_GET["orderid"])) {
    $id = $_GET["orderid"];
    $sql = "DELETE FROM `billing` WHERE `billing`.`id` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "successfull";
    }else{
        echo "error";
    }
}
// for users
 if (!empty($_GET["userid"])) {
    $id = $_GET["userid"];
    $sql = "DELETE FROM `user` WHERE `user`.`id` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "successfull";
    }else{
        echo "error";
    }
}
// for adding users
 if (!empty($_GET["addid"])) {
    $id = $_GET["addid"];
    $password_ext = hash("sha256", uniqid());
    $password = strtoupper(substr($password_ext,0,10));
    $sql = "SELECT * FROM `user` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $fetch = mysqli_fetch_assoc($result);
        $username = $fetch["name"];
        // $useremail = $fetch["email"];
        $subject = APP_NAME;
       $to =$fetch["email"];
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
           <title>'.APP_NAME.'</title>
       </head>
       <body>
       <div class="row">
                                   <div class="col-12">
                                       <table class="body-wrap" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
                                           <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                               <td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                                               <td class="container" width="600" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                                                   <div class="content" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                                       <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 7px; background-color: #fff; color: #495057; margin: 0; box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.03);" bgcolor="#fff">
                                                           <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                               <td class="content-wrap" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                                                   <table width="100%" cellpadding="0" cellspacing="0" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                       <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                           <td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                           <img src="<?=APP_LOGO?>" alt="">
                                                                           </td>
                                                                       </tr>
                                                                       <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                           <td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                               Your log in details </br>
                                                                               </br><strong style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 10px 0px;"><span style="background-color: transparent;color: #ffffff;padding: 5px 8px; font-size: 12px; border-radius: 4px"></span></strong>
                                                                           </td>
                                                                       </tr>
                                                                       <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                           <td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                               </br><strong style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 10px 0px;"><span style="background-color: #f46a6a;color: #ffffff;padding: 5px 8px; font-size: 12px; border-radius: 4px">USERNAME => '.$username.'</span></strong>
                                                                           </td>
                                                                       </tr>
                                                                       <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                           <td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                              <strong style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 10px 0px;"><span style="background-color: #f46a6a;color: #ffffff;padding: 5px 8px; font-size: 12px; border-radius: 4px">PASSWORD => '.$password.'</span></strong>
                                                                           </td>
                                                                       </tr>
                                                                       <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                           <td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                               We have successfully approved you as one of our users log in with the details.
                                                                           </td>
                                                                       </tr>
                                                                       <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                           <td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                               <a href="<?=APP_URL?>logine333.php" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #34c38f; margin: 0; border-color: #34c38f; border-style: solid; border-width: 8px 16px;">Log in</a>
                                                                           </td>
                                                                       </tr>
                                                                       <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                           <td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                               Thanks for choosing <b><?=APP_NAME?></b>.
                                                                           </td>
                                                                       </tr>
                                                                       <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                           <td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                               <b><?=APP_NAME?></b>
                                                                               <p>Support Team</p>
                                                                           </td>
                                                                       </tr>
               
                                                                       <tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                           <td class="content-block" style="text-align: center;font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;" valign="top">
                                                                               © <?=date("Y")?> <?=APP_NAME?>
                                                                           </td>
                                                                       </tr>
                                                                   </table>
                                                               </td>
                                                           </tr>
                                                       </table>
                                                   </div>
                                               </td>
                                           </tr>
                                       </table>
                                       <!-- end table -->
                                   </div>
                               </div>
       </body>
       </html>
       
       
   ';
//  sending mail  
if (mail($to,$subject,$body,$headers)) {
    $sql = "UPDATE `user` SET `password` = '$password' WHERE `user`.`id` = $id;";
    $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "successfull";
  }
}else{
    echo "error";
}
// die();  
}
    }

                  


  


?>