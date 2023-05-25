<?php

require_once("../../../inc/db.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authority = $_POST['authority'];
    $userID = $_POST['userID'];

    // 여기서 updateUserAuthority 함수 호출
    function updateUserAuthority($authority, $userID) {
        $query = "UPDATE logintbl SET Author = :authority WHERE UserID = :userID";
        $param = array(':authority' => $authority, ':userID' => $userID);
        $result = db_update_delete($query, $param);
        return $result;
    }
} else {
    echo "This page is meant to be accessed via a POST request.";
}

$updateResult = updateUserAuthority($authority, $userID);

if($updateResult) {
    echo "Update successful";
} else {
    echo "Update failed";
}


?>