<?php
require_once("../../inc/db.php");

function fetchUsers($page, $results_per_page) {
    $start_limit = ($page - 1) * $results_per_page;
    $query = "SELECT * FROM logintbl LIMIT $start_limit, $results_per_page";
    $users = db_select($query);
    return $users;
}

function updateUserAuthority($userID, $authority) {
    $query = "UPDATE logintbl SET Author = :authority WHERE UserID = :userID";
    $param = array(':authority' => $authority, ':userID' => $userID);
    $result = db_update_delete($query, $param);
    return $result;
}

function countUsers() {
    $query = "SELECT COUNT(*) as total FROM logintbl";
    $result = db_select($query);
    if ($result !== false && isset($result[0]['total'])) {
        return $result[0]['total'];
    } else {
        return 0;
    }
}

?>