<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/userStyle.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kupid 로그인</title>
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

            #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
            }

            #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
            }

        </style>
    </head>
    <body>
        <div class = "container">
                <div class = "col-12 col-md-8 col-lg-6 col-xl-6">
                    <div class ="card shadow-2-strong pb-3" style = "border-radius: 1rem;">
                        <div id ="container" class ="card-body p-5 text-center mt-5">
                            <a class="navbar-brand"><img src="../images/logo.png" alt="Logo" width="300" class="d-inline-block align-text-top"></a>
                                <form method="POST" action="./func/login.post.php">
                                    <div class = "mb-3">
                                        <label for ="UserID" class="form-label">아이디(이메일)</label>
                                            <input type="email" class ="form-control" aria-describedby="emailHelp" name="UserID" placeholder="아이디(이메일)를 입력하세요." required>
                                    </div>
                                    <div class ="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">비밀번호</label>
                                            <input type="password" class ="form-control" name="UserPW" placeholder="비밀번호를 입력하세요." required>    
                                    </div>
                                    <div class="d-grid gap-2">
                                        <input type="submit" class="btn btn-success" value="로그인"></input>
                                    </div>
                                    <p class ="mt-5">계정이 없습니까? <a href="regist.php">회원가입</a></p>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>    
</html>