<?php
session_start();
if (isset($_SESSION['UserID']) === false) {
    header("Location: ./login.php");
    exit();
}
require_once("../../../inc/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID = $_POST['ID'];

    $deleteQuery = "DELETE FROM boardtbl WHERE ID = :ID";
    $deleteResult = db_delete($deleteQuery, [':ID' => $ID]);

    if ($deleteResult !== false) {
        header("Location: ../boardManage.php");
        exit();
    } else {
        echo "게시물 삭제에 실패했습니다.";
    }
}
?>