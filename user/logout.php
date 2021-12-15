<?php 
include "..\config\config.php";

session_start();
session_destroy();
session_unset();
header("Location:".APP_URL."");
exit();

?>