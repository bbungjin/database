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
   
    <h3 class= "m-3" >마이페이지</h3>
    <hr class="border opacity-100">    
    
    <div class = "userInfo m-5">
        <form class="row g-3 needs-validation" id = "inputMyInfo">
            <div class="col-md-6">
                <label for="inputName" class="form-label">이름</label>
                <input type="text" class="form-control" id="inputName" required>
            </div>
            <div class="col-md-6">
                <label for="inputAge" class="form-label">나이</label>
                <input type="text" class="form-control" id="inputAge" placeholder="숫자만 입력하세요." required >
                <div class="invalid-feedback" id = "ageError">
                 나이를 입력해 주세요.
                </div>
            </div>
            <fieldset class="row mb-1 pt-2">
                <legend class="col-form-label col-sm-1">성별</legend>
                <div class="col-sm-10 pt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                        <label class="form-check-label" for="gridRadios1">
                        남자
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                        여자
                        </label>
                    </div>
                </div>
            </fieldset>
            <div class="col-md-6">
                <label for="inputHeight" class="form-label">키</label>
                <input type="text" class="form-control" id="inputHeight" placeholder="숫자만 입력하세요." required>
            </div>
            <div class="col-md-6">
                <label for="inputWeight" class="form-label">몸무게</label>
                <input type="text" class="form-control" id="inputWeight" placeholder="숫자만 입력하세요." required>
            </div>
            <div class="col-md-6">
                <label for="inputSchoolNum" class="form-label">학번</label>
                <input type="text" class="form-control" id="inputSchoolNum" placeholder="학번을 입력하세요." required>
            </div>
            <div class="col-md-6">
                <label for="inputPhoneNum" class="form-label">전화번호</label>
                <input type="text" class="form-control" id="inputPhoneNum" placeholder="공백이나 기호를 사용하지 않고 숫자만 입력하세요." required>
            </div>
            <div class="col-md-6">
                <label for="inputMBTI" class="form-label">MBTI</label>
                <select id="inputMBTI" class="form-select">
                <option selected>ISTJ</option>
                <option selected>ISFJ</option>
                <option selected>INFJ</option>
                <option selected>INTJ</option>
                <option selected>ISTP</option>
                <option selected>ISFP</option>
                <option selected>INFP</option>
                <option selected>INTP</option>
                <option selected>ESTP</option>
                <option selected>ESFP</option>
                <option selected>ENFP</option>
                <option selected>ENTP</option>
                <option selected>ESTJ</option>
                <option selected>ESFJ</option>
                <option selected>ENFJ</option>
                <option selected>ENTJ</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputResidence" class="form-label">거주지</label>
                <select id="inputResidence" class="form-select">
                <option selected>서울특별시</option>
                <option selected>부산광역시</option>
                <option selected>대구광역시</option>
                <option selected>인천광역시</option>
                <option selected>광주광역시</option>
                <option selected>대전광역시</option>
                <option selected>울산광역시</option>
                <option selected>세종특별자치시</option>
                <option selected>경기도</option>
                <option selected>강원도</option>
                <option selected>충청북도</option>
                <option selected>충청남도</option>
                <option selected>전라북도</option>
                <option selected>전라남도</option>
                <option selected>경상북도</option>
                <option selected>제주특별자치도</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="inputIntro" class="form-label">자기소개</label>
                <textarea type="text" class="form-control" id="inputIntro" rows="5"></textarea>
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
                <button type="submit" class="btn btn-primary">확인</button>
                <button type="button" class="btn btn-primary" onclick="history.back()">취소</button>
            </div>
        </form>
    </div>
</body>
</html>

