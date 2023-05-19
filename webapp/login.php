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
    </head>
    <body>
    <form method="POST" action="./func/login.post.php">
        <div id ="container" class ="mt-5">
        <a class="navbar-brand"><img src="../images/logo.png" alt="Logo" width="300" class="d-inline-block align-text-top"></a>
                <div class = "mb-3">
                    <label for ="UserID" class="form-label">아이디(이메일)</label>
                        <input type="email" class ="form-control" aria-describedby="emailHelp" name="UserID" placeholder="아이디(이메일)를 입력하세요." required>
                </div>
                <div class ="mb-3">
                    <label for="exampleInputPassword1" class="form-label">비밀번호</label>
                        <input type="password" class ="form-control" name="UserPW" placeholder="비밀번호를 입력하세요." required>    
                            <a href="regist.php" class="text-right" >회원가입</a>
                </div>
                <input type="submit" class="btn btn-primary" value="로그인"></input>
            </form>
        </div>
    </body>
</html>