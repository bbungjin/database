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
        <h3 class= "m-3" >결과 상세</h3>
        <hr class="border opacity-100">    

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
                        <td>name palce</td>
                        <td>age place</td>
                        <td>height palce</td>
                        <td>weight palce</td>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MBTI place</td>
                        <td>residense place</td>
                        <td>phone number palce</td>
                    </tr>
                </tbody>
            </table>

            <div class="col-md-12 pt-3">
                <label for="inputIntro" class="form-label fw-bolder fs-5">자기소개</label>
                <textarea type="text" class="form-control" id="inputIntro" rows="5" disabled>자기소개 자리</textarea>
            </div>
        </div>



    </body>
</html>