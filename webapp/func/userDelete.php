<?php

require_once("../../../inc/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_POST['deleteUserID'];

    function deleteUser($userID) {
        $query = "DELETE FROM logintbl WHERE UserID = :userID";
        $param = array(':userID' => $userID);
        $result = db_update_delete($query, $param);
        return $result;
    }

    $deleteResult = deleteUser($userID);

    if($deleteResult) {
        echo "Update successful";
    } else {
        echo "Update failed";
    }
} else {
    //페이지 직접 방문시 뜨는 메세지
    echo "This page is meant to be accessed via a POST request.";  
}


?>