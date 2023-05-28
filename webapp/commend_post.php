<?php
session_start();
if (isset($_SESSION['UserID']) === false) {
    header("Location: ./login.php");
    exit();
}

require_once("../../../inc/db.php");

$login_user_id = $_SESSION['UserID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['UserID'])) {
        $UserID = $_SESSION['UserID'];
        $ID = isset($_POST['ID']) ? $_POST['ID'] : null;
        $contents = isset($_POST['content']) ? $_POST['content'] : null;
        $date = date('Y-m-d H:i:s');

        if (empty($ID)) {
            exit();
        }

        $query = "INSERT INTO commenttbl (date, contents, UserID, ID) VALUES (?, ?, ?, ?)";
        $params = array($date, $contents, $UserID, $ID);

        try {
            $result = db_insert($query, $params);

            if ($result !== false) {
            
                header("Location: ./view.php?id=" . $ID);
                exit();
            } else {
                echo "댓글 저장 중 오류가 발생했습니다.";
            }
        } catch (Exception $e) {
            echo "오류 발생: " . $e->getMessage();
        }
    } else {
        echo "로그인이 필요합니다.";
    }
} else {
    echo "잘못된 요청입니다.";
}
?>