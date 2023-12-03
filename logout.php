<?php 
session_start();

require_once("function/helper.php");

$_SESSION = [];
session_unset();
session_destroy();

header("Location: " . BASE_URL);
?>
