<?php
session_start();
if (isset($_SESSION['UserID']) === false) {
    header("Location: ./login.php");
    exit();
}

require_once("../../../inc/db.php");

$login_user_id = $_SESSION['UserID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? $_POST['title'] : null;
    $BoardText = isset($_POST['BoardText']) ? $_POST['BoardText'] : null;
    $date = date('Y-m-d');
    $UserID = $login_user_id;

    $query = "INSERT INTO boardtbl (date, title, BoardText, UserID) VALUES (?, ?, ?, ?)";
    $params = array($date, $title, $BoardText, $UserID);

    $result = db_insert($query, $params);

    if ($result !== false) {
       
        header("Location: ../freeBoard.php");
        exit();
    } else {
       
        echo "게시글 작성 중 오류가 발생했습니다.";
    }
}