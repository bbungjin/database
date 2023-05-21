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

    <h3 class="m-3">게시물 작성</h3>
    <hr class="border opacity-100">    
    
    <div class="userInfo m-5">
        <form method="POST" action="./func/게시판.post.php">
            <div class="col-md-6">
                <label for="inputName" class="form-label">제목</label>
                <input type="text" class="form-control" id="inputName" required>
            </div>
            <div class="col-md-12">
                <label for="inputContent" class="form-label">내용</label>
                <textarea type="text" class="form-control" id="inputContent" rows="5"></textarea>
            </div>
            <div class="col-md-12 text-center pt-2">


       <?php 
                if (isset($_SESSION['UserID'])) {
                    echo '<input type="hidden" name="User_ID" value="' . $_SESSION['UserID'] . '">';
                    echo '<input type="hidden" name="date" value="' . date('Y-m-d H:i:s') . '">';
                    echo '<input type="hidden" name="Id" value="' . uniqid() . '">';
                    echo '<input type="text" name="name" class="form-control" id="name" required>';
                    echo '<input type="text" name="title" class="form-control" id="title" required>';
                    echo '<input type="text" name="BoardText" class="form-control" id="BoardText" required>';
                    echo '<button type="submit" class="btn btn-primary">작성</button>';
                    echo '<button type="button" class="btn btn-primary" onclick="history.back()">취소</button>';
                } else {
                    echo '<p>로그인 후 이용할 수 있습니다.</p>';
}
?>
            </div>
        </form>
    </div>
</body>
</html>
