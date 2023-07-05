<?php
session_start();
echo "Logging you out. Please wait...";
session_destroy();
unset($_SESSION["username"]);
header('Location: login.php');
?>
