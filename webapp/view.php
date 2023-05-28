<?php
session_start();
if (isset($_SESSION['UserID']) === false) {
    header("Location: ./login.php");
    exit();
}

require_once("../../inc/db.php");

$UserID = $_SESSION['UserID'];

if (isset($_GET['id'])) {
    $ID = $_GET['id'];
} else {
    echo "게시글 ID가 제공되지 않았습니다.";
    exit();
}

$query = "SELECT * FROM boardtbl WHERE ID = :ID";
$result = db_select($query, [':ID' => $ID]);

if (!$result) {
    echo "게시글을 불러오는 중 오류가 발생했습니다.";
    exit();
}

$post = reset($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['UserID'])) {
        $UserID = $_SESSION['UserID'];
        $commentID = isset($_POST['ID']) ? $_POST['ID'] : null;
        $contents = isset($_POST['content']) ? $_POST['content'] : null;
        $date = date('Y-m-d H:i:s');

        if (empty($commentID)) {
            echo "댓글 작성 실패: 게시글 ID가 제공되지 않았습니다.";
            exit();
        }

        $query = "INSERT INTO commenttbl (date, contents, UserID, BoardID) VALUES (?, ?, ?, ?)";
        $params = array($date, $contents, $UserID, $ID);

        try {
            $result = db_insert($query, $params);

            if ($result !== false) {
                // 댓글 작성 완료 후, 현재 페이지 다시 로드
                header("Location: ./view.php?id=" . $ID);
                exit();
            } else {
                echo "댓글 저장 중 오류가 발생했습니다.";
                exit();
            }
        } catch (Exception $e) {
            echo "오류 발생: " . $e->getMessage();
            exit();
        }
    } else {
        echo "로그인이 필요합니다.";
        exit();
    }
}

if (isset($_GET['delete'])) {
    $commentID = $_GET['delete'];

    $deleteQuery = "DELETE FROM commenttbl WHERE UserID = :UserID AND ID = :ID AND BoardID = :BoardID";
    $deleteResult = db_delete($deleteQuery, [':UserID' => $UserID, ':ID' => $commentID, ':BoardID' => $ID]);

    if ($deleteResult !== false) {
        // 댓글 삭제 후, 현재 페이지 다시 로드
        header("Location: ./view.php?id=" . $ID);
        exit();
    } else {
        echo "댓글 삭제 중 오류가 발생했습니다.";
        exit();
    }
}
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
    <style>
        .post-container {
            margin-top: 30px;
        }

        .post-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .post-info {
            font-size: 14px;
            color: #888;
            margin-bottom: 20px;
        }

        .post-content {
            font-size: 16px;
            line-height: 1.6;
            background-color: #f8f9fa; 
            padding: 100px; 
            
            margin-bottom: 80px; 
        }

        .comment-form textarea {
            width: 100%;
            height: 100px;
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 10px;
        }

        .comment-form button {
            background-color: #198754;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px; 
            margin-bottom: 80px; 
            border: none;
            cursor: pointer;
        }

        .comments hr {
            border: 2px solid ;
        }

        .comments p {
            margin-bottom: 10px;
        }

        .comment-delete {
            color: green;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <?php include 'nav.php'; ?>
    </header>


    <h3 class="m-3">자유 게시판</h3>
    <hr class="border opacity-100">

    <div class="container mt-5 post-container">
        <h4 class="post-title"><?php echo $post['title']; ?></h4>
        <hr class="border opacity-100">
        <div class="post-info">
            <p>작성자: <?php echo $post['UserID']; ?></p>
            <p>날짜: <?php echo $post['date']; ?></p>
        </div>
        <p class="post-content"><?php echo $post['BoardText']; ?></p>
    </div>

    <div class="container mt-3">
        <div class="comments">
            <h4 class="comment-title">댓글</h4>
            <?php
            $commentQuery = "SELECT * FROM commenttbl WHERE ID = :ID";
            $comments = db_select($commentQuery, [':ID' => $ID]);

            if ($comments === false) {
                $comments = [];
            }

            foreach (array_reverse($comments) as $comment) {
                echo "<p>작성자: {$comment['UserID']}</p>";
                echo "<p>날짜: {$comment['date']}</p>";
                echo "<p>{$comment['contents']}</p>";
            
                if ($comment['UserID'] === $UserID) {
                    echo "<p class='comment-delete' onclick='deleteComment({$comment['ID']})'>댓글 삭제</p>";
                }
                echo "<hr>";
            }
            ?>
        </div>

        <div class="comment-form mt-3">
        <form method="post" action="">
            <input type="hidden" name="ID" value="<?php echo $post['ID']; ?>">
            <textarea name="content" placeholder="댓글을 입력하세요"></textarea>
            <button type="submit">댓글 작성</button>
            </form>
        </div>
    </div>

    <script>
        function deleteComment(commentID) {
            if (confirm("댓글을 삭제하시겠습니까?")) {
                window.location.href = "./view.php?id=<?php echo $ID; ?>&delete=" + commentID;
            }
        }
    </script>
</body>

</html>