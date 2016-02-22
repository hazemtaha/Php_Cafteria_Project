<?php
session_start();
setcookie("login","",time()-3600,"/");
unset($_SESSION['u_id']);
header("location: ../index.php");
?>