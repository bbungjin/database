<?php
require_once("../../../inc/db.php");

$UserID = isset($_POST['UserID']) ? $_POST['UserID'] : null;
$UserPW = isset($_POST['UserPW']) ? $_POST['UserPW'] : null;

// 파라미터 체크
if ($UserID == null || $UserPW == null){    
    header("Location: ../regist.php");
    exit();
}

// 회원 가입이 되어 있는지 검사
$member_count = db_select("select count(UserID) cnt from logintbl where UserID = ?" , array($UserID));
if ($member_count && $member_count[0]['cnt'] == 1){    
    header("Location: ../regist.php");
    exit();
}

// 비밀번호 암호화
$bcrypt_pw = password_hash($UserPW, PASSWORD_BCRYPT);

// 데이터 저장
db_insert("insert into logintbl (UserID, UserPW) values (:UserID, :UserPW )",
    array(
        "UserID" => $UserID,
        "UserPW" => $bcrypt_pw
    )
);


// 로그인 페이지로 이동
header("Location: ../main.php");

?>