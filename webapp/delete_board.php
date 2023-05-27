<?php
$con = mysqli_connect("localhost","root","12345678","termprojectdb");
require_once("../../inc/db.php");
// 연결 확인
if ($con->connect_error) {
    die("MySQL 연결 실패: " . $con->connect_error);
}

// 삭제할 게시글의 ID를 받아옴
$postId = $_POST['post_id'];

// MySQL에서 데이터 삭제
$sql = "DELETE FROM boardtbl WHERE ID = $postId";

if ($con->query($sql) === TRUE) {
    //알림 형식
    echo "<script>alert('게시글이 성공적으로 삭제되었습니다.');</script>";
    echo "history.back()";
} else {
    echo "<script>alert('게시글 삭제 실패: " . $con->error . "');</script>";
    echo "history.back()";
}/*  글 형식
    echo "게시글이 성공적으로 삭제되었습니다.";
} else {
    echo "게시글 삭제 실패: " . $con->error;
}*/
header("Location: ./boardManage.php");
exit; 
?>