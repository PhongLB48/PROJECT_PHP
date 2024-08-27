<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();
$quaylai = "Đăng xuất thành công!";
echo "<script type='text/javascript'>alert('$quaylai');</script>";
echo "<script type='text/javascript'>window.location.href='login.php';</script>";
exit();
?>