<?php
session_start();
require_once "connect/user.php";

$id = $_SESSION['id'];

$user = new user();
$statut = $user->getStatutById($id);
$statutKey = $statut['statut'];
echo json_encode($statutKey);
?>