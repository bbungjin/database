<?php
session_start();
require_once("../../inc/db.php");

// 로그인 여부 확인
if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
}   

$UserID = $_SESSION['UserID'];


$UserInfo = db_select("select * from usertbl where UserID = ?", array($UserID));   //세션 UserID로 usertbl에서 유저 정보 불러오기
$UserInfo_count = db_select("select count(UserID) cnt from usertbl where UserID = ?", array($UserID)); //usertbl의 UserID 개수 불러오기

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
        <script src="./js/disabling.js"></script>
    </head>
<body>
    <header>
      <?php include 'nav.php'; ?>
    </header>
    <h3 class= "m-3" >마이페이지</h3>
    <hr class="border opacity-100">    
    <div class = "userInfo m-5">
        <form class="row g-3 needs-validation" id = "inputMyInfo" method = "POST" action = "./func/myPage.post.php">
            <div class="col-md-6">
                <label for="inputName" class="form-label">이름</label>
                <input type="text" class="form-control" id="inputName" name = "Name" value = "<?php echo (($UserInfo_count[0]['cnt'] == 1) ? ($UserInfo[0]['Name']) : null);  ?>" required disabled> 
            </div>
            <div class="col-md-6">
                <label for="inputAge" class="form-label">나이</label>
                <input type="text" class="form-control" id="inputAge" name = "age" placeholder="숫자만 입력하세요." value = "<?php echo (($UserInfo_count[0]['cnt'] == 1) ? ($UserInfo[0]['age']) : null);  ?>"  required >
                <div class="invalid-feedback" id = "ageError">
                 나이를 입력해 주세요.
                </div>
            </div>
            <fieldset class="row mb-1 pt-2">
                <legend class="col-form-label col-sm-1">성별</legend>
                <div class="col-sm-5 pt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="gridRadios1" value ="M" <?php echo (($UserInfo_count[0]['cnt'] == 1 && $UserInfo[0]['sex'] == 'M') ? "checked" : null);  ?>>
                        <label class="form-check-label" for="gridRadios1">
                        남자
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="F" <?php echo (($UserInfo_count[0]['cnt'] == 1 && $UserInfo[0]['sex'] == 'F') ? "checked" : null);  ?> >
                        <label class="form-check-label" for="gridRadios2">
                        여자
                        </label>
                    </div>
                </div>
            </fieldset>
            <div class="col-md-6">
                <label for="inputHeight" class="form-label">키</label>
                <input type="text" class="form-control" id="inputHeight" name = "Height" placeholder="숫자만 입력하세요." value = "<?php echo (($UserInfo_count[0]['cnt'] == 1) ? ($UserInfo[0]['Height']) : null);  ?>" required>
            </div>
            <div class="col-md-6">
                <label for="inputWeight" class="form-label">몸무게</label>
                <input type="text" class="form-control" id="inputWeight" name = "weight" placeholder="숫자만 입력하세요." value = "<?php echo (($UserInfo_count[0]['cnt'] == 1) ? ($UserInfo[0]['weight']) : null);  ?>" required>
            </div>
            <div class="col-md-6">
                <label for="inputSchoolNum" class="form-label">학번</label>
                <input type="text" class="form-control" id="inputSchoolNum" name = "schoolnum" placeholder="학번을 입력하세요." value = "<?php echo (($UserInfo_count[0]['cnt'] == 1) ? ($UserInfo[0]['schoolnum']) : null);  ?>" required>
            </div>
            <div class="col-md-6">
                <label for="inputPhoneNum" class="form-label">전화번호</label>
                <input type="text" class="form-control" id="inputPhoneNum" name = "phonenumber" placeholder="공백이나 기호를 사용하지 않고 숫자만 입력하세요." value = "<?php echo (($UserInfo_count[0]['cnt'] == 1) ? ($UserInfo[0]['phonenumber']) : null);  ?>" required>
            </div>
            <div class="col-md-6">
                <label for="inputMBTI" class="form-label">MBTI</label>
                <select id="inputMBTI" name = "mbti" class="form-select" >
                <option selected><?php echo (($UserInfo_count[0]['cnt'] == 1) ? ($UserInfo[0]['mbti']) : null);  ?></option>
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
                <label for="inputResidence"  class="form-label">거주지</label>
                <select id="inputResidence" name = "region" class="form-select">
                <option selected><?php echo (($UserInfo_count[0]['cnt'] == 1) ? ($UserInfo[0]['region']) : null);  ?></option>    
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
                <option selected><?php echo (($UserInfo_count[0]['cnt'] == 1) ? ($UserInfo[0]['major']) : null)  ?></option> 
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
            <div class="col-md-12">
                <label for="inputIntro" class="form-label">자기소개</label>
                <textarea type="text" class="form-control" id="inputIntro" name = "SelfInfo" rows="5"><?php echo (($UserInfo_count[0]['cnt'] == 1) ? ($UserInfo[0]['SelfInfo']) : null)  ?></textarea>
            </div>
            <!-- <div class="col-12">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
                </div> 
            </div> -->
            <div class="col-12 text-center pt-2">
                <button type="button" class="btn btn-secondary" id="editButton">수정</button>
                <button type="submit" class="btn btn-primary">확인</button>
                <button type="button" class="btn btn-primary" onclick="history.back()">취소</button>
            </div>
        </form>
    </div>
</body>
</html>