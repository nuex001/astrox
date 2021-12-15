<?php 
// session_start();

if(isset($_POST['sign-out'])){
	$path = 'http://localhost/www.astrofxc.com/logine333.php';
	header("Location: $path");
	exit();
}


session_destroy();
$path = 'http://localhost/www.astrofxc.com/logine333.php';
header("Location: $path");
exit();
