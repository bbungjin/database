<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="./css/userStyle.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kupid 회원가입</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2610eb47c2.js" crossorigin="anonymous"></script>
        <style>
            a {
                text-decoration : none;
            }
            .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            }

            body {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                hsl(218, 41%, 35%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                hsl(218, 41%, 45%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%);
            }
            
            .input-form {
            max-width: 680px;

            margin-top: 80px;
            padding: 32px;

            background: #fff;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
            box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15)
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="input-form col-md-12 m-5">
                <a class="navbar-brand" href="./login.php"><img src="../images/logo.png" alt="Logo" width="150" class="d-inline-block align-text-top"></a>
                <hr class="mb-4">
                <h4 class="mb-3">회원가입</h4>
                <form method="POST" action="./func/regist.post.php">
                    <div class="col-md-12 mb-3">
                    <label for ="UserID" class="form-label">아이디(이메일)</label>
                    <input type="email" class ="form-control" aria-describedby="emailHelp" name="UserID" placeholder="아이디(이메일)를 입력하세요." required>
                    <div id="idHelp" class="form-text">이메일 형식(@를 포함한 문자)에 맞춰서 아이디를 작성해 주세요.</div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">비밀번호</label>
                    <input type="password" class ="form-control" name="UserPW" placeholder="비밀번호를 입력하세요." required>
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="aggrement" required>
                    <label class="custom-control-label" for="aggrement">개인정보 수집 및 이용에 동의합니다.</label>
                </div>
                <div class="mb-4"></div>
                <input type="submit" class="btn btn-success" value="회원가입"></input>
                </form>
            </div>
        </div>
    </body>
</html>