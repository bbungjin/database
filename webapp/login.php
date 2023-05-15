<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" type="text/css" href="./css/userStyle.css">
        <title>KUpid 로그인</title>
    </head>
    <body>
        <div id ="container">
            <h1 class = "style-1">KUpid</h1></div>
            <form method="POST" action="./func/login.post.php">
            <p>
                아이디(이메일) : 
                <input type="text" name="UserID" />
            <p>
            <p>
                비밀번호 : 
                <input type="password" name="UserPW" />
            <p>               
            <p><input type="submit" value="로그인"></p>
            </form>
    </body>
</html>