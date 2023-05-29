<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="./css/userStyle.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2610eb47c2.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <header>
        <?php include 'nav.php'; ?>
        </header>
        <h3 class="m-3">게시글 작성</h3>
        <hr class="border opacity-100">  
        <div class="m-5">
            <form method="POST" action="./func/board.post.php">
                <div class="mb-3">
                    <label for="title" class="form-label">제목</label>
                    <input type="text" class="form-control" name="title" placeholder="제목을 입력하세요." required>
                </div>
                <div class="mb-3">
                    <label for="BoardText" class="form-label">내용</label>
                    <textarea class="form-control" name="BoardText" placeholder="내용을 입력하세요." required></textarea>
                </div>
                <div class="col-12 text-center pt-3">
                    <input type="submit" class="btn btn-success" value="작성"></input>
                </div>
            </form>
        </div>
    </body>
</html>