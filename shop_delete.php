<?php

session_start();

include("funcs.php");
loginCheck();

require_once "./dbc.php";
shopDelete($_POST["id"]);

header("Location: top-page.php");
exit;

?>

