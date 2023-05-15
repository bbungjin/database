<?php
require_once("../../../inc/db.php");

$UserID = isset($_POST['UserID']) ? $_POST['UserID'] : null;
$UserPW = isset($_POST['UserPW']) ? $_POST['UserPW'] : null;

// 파라미터 체크
if ($UserID == null || $UserPW == null){    
    header("Location: ../login.php");
    exit();
}

// 회원 데이터
$member_data = db_select("select * from logintbl where UserID = ?", array($UserID));

// 회원 데이터가 없다면
if ($member_data == null || count($member_data) == 0){
    header("Location: ../login.php");
    exit();
}

// 비밀번호 일치 여부 검증
$is_match_password = password_verify($UserPW, $member_data[0]['UserPW']);

// 비밀번호 불일치
if ($is_match_password === false){
    header("Location: ../login.php");
    exit();
}

session_start();
$_SESSION['member_id'] = $member_data[0]['member_id'];

// 목록으로 이동
header("Location: ../main.php");



?>