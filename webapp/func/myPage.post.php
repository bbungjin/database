<?php
session_start();
if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
}   


require_once("../../../inc/db.php");

$UserID = $_SESSION['UserID'];

$Name = isset($_POST['Name']) ? $_POST['Name'] : null;
$age = isset($_POST['age']) ? $_POST['age'] : null;
$Height = isset($_POST['Height']) ? $_POST['Height'] : null;
$SelfInfo = isset($_POST['SelfInfo']) ? $_POST['SelfInfo'] : null;
$sex = isset($_POST['sex']) ? $_POST['sex'] : null;
$region = isset($_POST['region']) ? $_POST['region'] : null;
$mbti = isset($_POST['mbti']) ? $_POST['mbti'] : null;
$schoolnum = isset($_POST['schoolnum']) ? $_POST['schoolnum'] : null;
$major = isset($_POST['major']) ? $_POST['major'] : null;
$phonenumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : null;
$weight = isset($_POST['weight']) ? $_POST['weight'] : null;

$major = "컴퓨터공학과";


// 이미 학번이 입력되어 있는지 체크 (학번이 기본키라 중복 입력되면 안됨)
$schoolnum_count = db_select("select count(Name) cnt from usertbl where schoolnum = ?" , array($schoolnum));
if ($schoolnum_count && $schoolnum_count[0]['cnt'] == 1){    
    header("Location: ../myPage.php"); //이미 데베상에 존재하는 학번이면 myPage로 다시 이동동
    exit();
}



// 데이터 저장
db_insert("insert into usertbl values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($Name, $age, $Height, $SelfInfo, $sex, $region, $mbti, $schoolnum, $major, $phonenumber , $UserID, $weight));



// 로그인 페이지로 이동
header("Location: ../myPage.php");
?>