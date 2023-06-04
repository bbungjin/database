<?php
session_start();
if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
}   
    require_once("../../inc/db.php");

    if (isset($_GET['UserID'])) {
        $UserID = $_GET['UserID'];
    } else {
        // 'userid' 매개변수가 설정되지 않은 경우 에러 메시지 출력
        die("Error: No user ID provided.");
    }

    $user_info = db_select("select * from usertbl where UserID = ?", array($UserID));
    $user_image = db_select("select imagepath from profileimagetbl where UserID = ?", array($UserID));

?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <style>
            .user-image-wrapper {
     width: 200px;
    height: 200px;
    overflow: hidden;
    border-radius: 50%;
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.2);
}

.user-profile-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-results {
    color: #999;
    font-size: 16px;
}

        </style>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kupid</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2610eb47c2.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
        <?php include 'nav.php'; ?>
        </header>
        <h3 class= "m-3" >결과 상세</h3>
        <hr class="border opacity-100">
        <?php
if (count($user_image) > 0) {
    $absolute_path = str_replace('\\', '/', $user_image[0]['imagepath']);
    $webPath = 'http://' . $_SERVER['HTTP_HOST'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', $absolute_path);
    echo '<div class="user-image-wrapper">';
    echo '<img class="user-profile-image" src="'.$webPath.'"/>'; // 이미지 불러오기
    echo '</div>';
} else {
    echo '<div class="no-results">';
    echo "프로필 이미지가 없습니다.";
    echo '</div>';
}
?>

        <div class ="table-group m-5">
            <table class="table table">
                <thead class = "table-light">
                    <tr>
                    <th scope="col">이름</th>
                    <th scope="col">나이</th>
                    <th scope="col">키</th>
                    <th scope="col">몸무게</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $user_info[0]['Name'] ?></td>
                        <td><?php echo $user_info[0]['age'] ?></td>
                        <td><?php echo $user_info[0]['Height'] ?></td>
                        <td><?php echo $user_info[0]['weight'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class ="table-group m-5">
            <table class="table table">
                <thead class = "table-light">
                    <tr>
                    <th scope="col">MBTI</th>
                    <th scope="col">거주지</th>
                    <th scope="col">전화번호</th>
                    <th scope="col">전공</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $user_info[0]['mbti'] ?></td>
                        <td><?php echo $user_info[0]['region'] ?></td>
                        <td><?php echo $user_info[0]['phonenumber'] ?></td>
                        <td><?php echo $user_info[0]['major'] ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="col-md-12 pt-3">
                <label for="inputIntro" class="form-label fw-bolder fs-5">자기소개</label>
                <textarea type="text" class="form-control" id="inputIntro" rows="5" disabled><?php echo $user_info[0]['SelfInfo'] ?></textarea>
            </div>
        </div>


    </body>
</html>


<!-- Summary 페이지에서 특정 행을 선택 하면 그 행의 회원 정보를 Specific에서 보여주기
if 행 선택 == post(그 행에 속한 회원의 정보)
-->