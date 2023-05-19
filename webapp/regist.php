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
    </head>
    <body>
      
        <a class="navbar-brand" href="./login.php"><img src="../images/logo.png" alt="Logo" width="300" class="d-inline-block align-text-top"></a>
        <h3 class= "m-3" >회원가입</h3>
        <hr class="border opacity-100">  
        <div class="m-5">
            <form method="POST" action="./func/regist.post.php">
                    <div class = "mb-3">
                        <label for ="ID" class="form-label">아이디(이메일)</label>
                        <input type="email" class ="form-control" aria-describedby="emailHelp" name="UserID" placeholder="아이디(이메일)를 입력하세요." required>
                        <div id="idHelp" class="form-text">이메일 형식(@를 포함한 문자)에 맞춰서 아이디를 작성해 주세요.</div>
                    </div>
                    <div class ="mb-3">
                        <label for="exampleInputPassword1" class="form-label">비밀번호</label>
                            <input type="password" class ="form-control" name="UserPW" placeholder="비밀번호를 입력하세요." required>  
                    </div>
                    <div class="col-12 text-center pt-3">
                    <input type="submit" class="btn btn-primary" value="회원가입"></input>
                    </div>
        </div>    
    </form>
    </body>
</html>