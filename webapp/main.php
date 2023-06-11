<?php
session_start();
if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
}   
    require_once("../../inc/db.php");

    $UserID = $_SESSION['UserID'];
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
        <style>          
            .container-counter {

            }

            .d-grid {
                margin-top : 100px;
            }

            .counter {
                background-color:#f5f5f5;
                padding: 20px 0;
                border-radius: 5px;
            }

            .count-title {
                font-size: 40px;
                font-weight: normal;
                margin-top: 10px;
                margin-bottom: 0;
                text-align: center;
                color : #036b29;
            }

            .count-text {
                font-size: 13px;
                font-weight: normal;
                margin-top: 10px;
                margin-bottom: 0;
                text-align: center;
            }

            .fa-2x {
                margin: 0 auto;
                float: none;
                display: table;
                color: #21ba30;
            }
            
            .text-bright {
                color: #fff;
            }

        </style>
                <!-- #4ad1e5 -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kupid</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="./js/counter.js"></script>
        <script src="https://kit.fontawesome.com/2610eb47c2.js" crossorigin="anonymous"></script>
    </head>
<body>
    <header>
      <?php include 'nav.php'; ?>
    </header>
    <div>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
            <div class="text-bright p-5" style="text-align: center; background-color: rgba(3, 107, 41, 0.5);">
                <div class="hidden-xs">
                    <h2 style="font-size: 48px;">새로운 인연을 이어주는,<br>이상형 찾기 플랫폼 KUpid</h2>
                    <h5 class="sub-title under-button" style="font-size: 26px;">내 이상형에 맞는 학우들을 찾으세요.</h5>
                </div>
            </div>
        <div class="container-counter m-5">
            <div class="row">
                <br/>
                <div class="col text-center m-5">
                    <h1>가입자 현황</h1>
                    <p>현재 저희 서비스에 가입한 이용자들의 수 입니다.</p>
                </div>
            </div>
            <!-- 남성 회원 수 불러오기 -->
            <?php
            require_once("../../inc/db.php"); 
            $male = 'M';
            $male_query = "select count(U.userID) cnt from logintbl L inner join usertbl U on L.userID = U.userID where U.sex = ?";
            $male_data = db_select($male_query, array($male)); // 여기까지 쿼리 문 저장& 쿼리 실행해서 변수에 저장
            ?>
            <?php
            foreach($male_data as $male_port){  
            ?> 
            <div class="row text-center">
                <div class="col">
                    <div class="counter">
                        <i class="fa-solid fa-person fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to=<?= $male_port['cnt'] ?> data-speed="1500"></h2> 
                        <p class="count-text">남자 이용자</p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- 여성 회원 수 불러오기 -->
                <?php
                require_once("../../inc/db.php");
                $female = 'F';
                $female_query = "select count(U.userID) cnt from logintbl L inner join usertbl U on L.userID = U.userID where U.sex = ?";
                $female_data = db_select($female_query, array($female));
                ?>
                <?php
                foreach($female_data as $female_port){
                ?>
                <div class="col">
                    <div class="counter">
                        <i class="fa-solid fa-person-dress fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to=<?= $female_port['cnt']?> data-speed="1500"></h2>
                        <p class="count-text ">여성 이용자</p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- 전체 회원 수 불러오기 -->
                <?php
                require_once("../../inc/db.php");
                $usernum_query = "select count(UserID) cnt from logintbl";
                $usernum_data = db_select($usernum_query, array());
                ?>
                <?php
                foreach($usernum_data as $usernum_port){
                ?>
                <div class="col">
                    <div class="counter">
                    <i class="fa-solid fa-people-roof fa-2x"></i>
                    <h2 class="timer count-title count-number" data-to=<?= $usernum_port['cnt']?> data-speed="1500"></h2>
                    <p class="count-text ">전체 이용자</p>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>  
        </div>      
        <div class ="p-3" container style="background-color: #f6f6f8;">
            <div class="d-grid gap-2 col-6 mx-auto">
                <div class="col text-center m-5">
                        <h1>KUpid의 기능</h1>
                        <p>KUpid는 회원들이 자유롭게 이상형에 맞는 학우들을 찾을 수 있도록<br> 다양한 조건별 검색 기능을 제공합니다.</p>
                </div>
                <a class="btn btn-success" href="idealSearch.php" role="button">이상형 찾으러 가기</a>
                <a class="btn btn-success" href="./freeBoard.php" role="button">게시판에 글 쓰러 가기</a>
            </div>
        </div>
        <div class ="p-3" container style="background-color: #303437;">            
            <div class="d-grid gap-2 col-6 mx-auto">
                <div class="col text-center m-5 text-bright">
                    <h1>마이페이지</h1>
                    <p>다른 학우들이 당신을 찾을 수 있도록 마이페이지에서 정보를 입력해주세요.</p>
                </div>
                <a class="btn btn-outline-light" href="myPage.php" role="button">마이페이지에서 내 정보 입력하기</a>
            </div>
        </div>    
    </div>
</body>
</html>