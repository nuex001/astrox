<?php 
include "..\config\config.php";
include "..\controller_user\dbcon.php";

if (!empty($_GET["orderid"])) {
    $id = $_GET["orderid"];
    $userid = $_GET["userid"];
    // print_r ($_GET);
    $sql = "DELETE FROM `billing` WHERE `billing`.`id` = $id AND `user_id` = $userid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "successfull";
    }else{
        echo "error";
    }
}


?>