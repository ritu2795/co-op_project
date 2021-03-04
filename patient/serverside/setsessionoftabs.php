<?php
session_start();

$sessionvar = $_POST['session_value_tab'];
$_SESSION["tab_data"] = $sessionvar;
echo $_SESSION["tab_data"];
