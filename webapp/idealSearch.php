<?php/*
session_start();
if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
}   
    require_once("../../inc/db.php");

    $UserID = $_SESSION['UserID'];*/
?>


<!DOCTYPE html>
<html lang="ko">
    <head>
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

        <h3 class= "m-3" >선호 입력하기</h3>
        <hr class="border opacity-100">    

        <div class = "userInfo m-5">
            <form class="row g-3 needs-validation" id = "inputMyInfo" method = "POST" action = "./idealSummary.php"> <!-- form 아래 내용을 idealSummary로 보내준다 -->
                <fieldset class="row mb-1 pt-2">
                    <legend class="col-form-label col-sm-1">성별</legend>
                    <div class="col-sm-10 pt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="gridRadios1" value="M" >
                            <label class="form-check-label" for="gridRadios1">
                            남자
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="F">
                            <label class="form-check-label" for="gridRadios2">
                            여자 
                            </label>
                        </div>
                    </div>
                </fieldset>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">나이</label>                  
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="minAge" name = "age_start" placeholder="숫자만 입력하세요." required>
                        </div>
                        <label for="minAge" class="col-sm-2 col-form-label">부터</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="maxAge" name = "age_end" placeholder="숫자만 입력하세요." required>
                        </div>
                        <label for="maxAge" class="col-sm-2 col-form-label">까지</label>
                    </div>
                    </div>   
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">몸무게</label>                  
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="minWeight" name = "weight_start" placeholder="숫자만 입력하세요." required>
                        </div>
                        <label for="minWeight" class="col-sm-2 col-form-label">부터</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="maxWeight" name = "weight_end" placeholder="숫자만 입력하세요." required>
                        </div>
                        <label for="maxWeight" class="col-sm-2 col-form-label">까지</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">키</label>                  
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="minHeight" name = "Height_start" placeholder="숫자만 입력하세요." required>
                        </div>
                        <label for="minHeight" class="col-sm-2 col-form-label">부터</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="maxHeight" name = "Height_end" placeholder="숫자만 입력하세요." required>
                        </div>
                        <label for="maxHeight" class="col-sm-2 col-form-label">까지</label>
                    </div>
                </div> 
                <div class="col-md-6">
                    <label for="inputMBTI" class="form-label">MBTI</label>
                    <select id="inputMBTI" class="form-select" name = "mbti">
                    <option>상관 없음</option>
                    <option>ISTJ</option>
                    <option>ISFJ</option>
                    <option>INFJ</option>
                    <option>INTJ</option>
                    <option>ISTP</option>
                    <option>ISFP</option>
                    <option>INFP</option>
                    <option>INTP</option>
                    <option>ESTP</option>
                    <option>ESFP</option>
                    <option>ENFP</option>
                    <option>ENTP</option>
                    <option>ESTJ</option>
                    <option>ESFJ</option>
                    <option>ENFJ</option>
                    <option>ENTJ</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputResidence" class="form-label">거주지</label>
                    <select id="inputResidence" class="form-select" name = "region">
                    <option>상관 없음</option>
                    <option>서울특별시</option>
                    <option>부산광역시</option>
                    <option>대구광역시</option>
                    <option>인천광역시</option>
                    <option>광주광역시</option>
                    <option>대전광역시</option>
                    <option>울산광역시</option>
                    <option>세종특별자치시</option>
                    <option>경기도</option>
                    <option>강원도</option>
                    <option>충청북도</option>
                    <option>충청남도</option>
                    <option>전라북도</option>
                    <option>전라남도</option>
                    <option>경상북도</option>
                    <option>제주특별자치도</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputMajor" class="form-label">전공</label>
                    <select id="inputMajor" name = "major" class="form-select">
                    <option>상관 없음</option>
                    <option>산업디자인학과</option>
                    <option>실내디자인학과</option>
                    <option>패션디자인학과</option>
                    <option>시각영상디자인학과</option>
                    <option>미디어콘텐츠학과</option>
                    <option>조형예술학과</option>
                    <option>경영학과</option>
                    <option>경제통상학과</option>
                    <option>경찰학과</option>
                    <option>소방방재융합학과</option>
                    <option>문헌정보학과</option>
                    <option>유아교육과</option>
                    <option>사회복지학과</option>
                    <option>신문방송학과</option>
                    <option>동화한국어문화학과</option>
                    <option>영어문화학과</option>
                    <option>메카트로닉스공학과</option>
                    <option>컴퓨터공학과</option>
                    <option>녹색기술융합학과</option>
                    <option>응용화학과</option>
                    <option>간호학과</option>
                    <option>바이오의약학과</option>
                    <option>생명공학과</option>
                    <option>식품학과</option>
                    <option>뷰티화장품학과</option>
                    <option>스포츠건강학과</option>
                    <option>골프산업학과</option>
                    </select>
                </div>
                <div class="col-12 text-center pt-2">
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#warningModal">확인</button>
                    <button type="button" class="btn btn-primary" onclick="history.back()">취소</button>
                </div>
            </form>
        </div>
    
            <!-- Modal -->
        <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">잠깐!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        이상형 찾기 기능을 이용하시려면 <br>
                        먼저 마이페이지에서 정보를 입력해주세요.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">확인</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>