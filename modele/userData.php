<?php
session_start();
require_once('connect/user.php');
$id = $_SESSION['id'];

$user = new user();
$dataArray = $user->getAllDataById($id);

echo json_encode($dataArray);
?>


