<?php
session_start();
if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
}   


require_once("../../../inc/db.php");

$login_user_id = $_SESSION['UserID'];

$name = isset($_POST['Name']) ? $_POST['Name'] : null;
$date = isset($_POST['date']) ? $_POST['date'] : null;
$ID = isset($_POST['ID']) ? $_POST['ID'] : null;
$title = isset($_POST['title']) ? $_POST['title'] : null;
$board_text = isset($_POST['BoradText']) ? $_POST['BoradText'] : null;


$stmt = db_prepare("insert into boradtbl values(?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssi", $ID, $name, $date, $title, $board_text, $login_user_id);
$stmt->execute();

header("Location: ../freeborad.php");