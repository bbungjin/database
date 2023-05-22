<?php

require_once("../../../inc/db.php");

function deleteUser($userID) {
    $query = "DELETE FROM logintbl WHERE UserID = :userID";
    $param = array(':userID' => $userID);
    $result = db_update_delete($query, $param);
    return $result;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteUserID"])) {
    $deleteUserID = $_POST["deleteUserID"];
    $deleteResult = deleteUser($deleteUserID);

    // 삭제 결과를 반환
    echo $deleteResult ? "success" : "error";
}

?>