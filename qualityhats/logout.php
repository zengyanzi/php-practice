<?php
require_once "session.php";
unset($_SESSION['customer']);
var_dump($_SESSION);
header("Location: index.php");
 ?>