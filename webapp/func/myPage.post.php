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
    header("Location: ../myPage.php"); //이미 데베상에 존재하는 학번이면 myPage로 다시 이동 or 학번 중복 입력 알람
    exit();
}



// 데이터 저장 
db_insert("insert into usertbl values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($Name, $age, $Height, $SelfInfo, $sex, $region, $mbti, $schoolnum, $major, $phonenumber , $UserID, $weight));



// 로그인 페이지로 이동
header("Location: ../myPage.php");
?>

<!-- myPage를 입력 페이지와 이미 입력한 정보 확인할 수 있는 페이지 두개로 나눌지 아니면 다른 방법을 찾을지
문제 1. 어떻게 데베상의 정보를 끌어와서 마이페이지에 보여줄 것인가?
문제 2. 최초 회원 정보 입력 후 넘어가는 페이지를 내가 입력한 정보 확인할 수 있는 페이지라 했을 때 어떻게 구현할 것인가.
문제 3. 이미 회원 정보를 입력한 회원이 후에 다시 마이페이지를 들어갔을 때의 마이페이지 화면 ... 
문제 4. 마이페이지 회원 정보 수정가능 하다 했을 때 어떤 로직으로 수정하게 할건지 ... 


문제 4 -> update usertbl set  Name = ? where UserID = ? 
회원이 특정 정보를 수정하려고 한다 -> 수정 버튼을 누른다 -> 이미 입력된 정보는 그대로 보이고 변경 가능하도록 입력 칸이 활성화 된다.
->
-->