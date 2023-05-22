<?php

require_once("../../../inc/db.php");

function updateUserAuthority($authority, $userID) {
    $query = "UPDATE logintbl SET Author = :authority WHERE UserID = :userID";
    $param = array(':authority' => $authority, ':userID' => $userID);
    $result = db_update_delete($query, $param);
    return $result;
}

?>