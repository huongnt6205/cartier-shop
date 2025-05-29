<?php
@include 'config/dbconfig.php';

session_start();
session_unset();
session_destroy();
header('Location: /cartier-shop/index.php');
exit();
?>
