<?php
session_start();
/*if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
} */  
require_once("../../inc/db.php");

$UserID = $_SESSION['UserID'];


$queryCount = "SELECT COUNT(*) AS total FROM boardtbl";
$totalPosts = db_select($queryCount)[0]['total'];
$postsPerPage = 10;
$totalPages = ceil($totalPosts / $postsPerPage);


$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['boarddelete'])) {
    $ID = $_POST['ID'];

    $deleteQuery = "DELETE FROM boardtbl WHERE ID = :ID";
    $deleteResult = db_update_delete($deleteQuery, [':ID' => $ID]);

    if ($deleteResult !== false) {
        header("Location: ./boardAdmin.php");
        exit();
    } else {
        echo "게시물 삭제에 실패했습니다.";
    }
}


$offset = ($currentPage - 1) * $postsPerPage;


$query = "SELECT * FROM boardtbl ORDER BY ID DESC LIMIT $offset, $postsPerPage";
$result = db_select($query);
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
    <script>
$(document).ready(function(){
    $('#warningModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('#ID').val(id)
    })
});
</script>

    <style>
    .pagination .page-link {
        background-color: #fff;
        border-color: #198754;
    }

    .pagination .page-link:hover {
        background-color: #157347;
        border-color: #fff;
    }

    .pagination .page-item.active .page-link {
        background-color: #198754;
        border-color: #157347;
    }

    .post-table td {
        padding: 10px;
        text-align: left;
    }

    .post-table th {
        font-weight: bold;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    a {
        color: #198754;
    }

    .page-link {
        color: #198754;
    }
    </style>
</head>
<body>
    <header>
        <?php include 'navAdmin.php'; ?>
    </header>

    <h3 class="m-3">작성된 게시물</h3>
    <hr class="border opacity-100">

   


   
    <div class="container mt-3">
        <table class="table table-striped">
            <thead>
        
            <th style="width: 100px;">작성자</th>
            <th style="width: 400px;">제목</th>
            <th style="width: 150px;">날짜</th>
                </tr>
            </thead>
            <tbody>
            <?php
        foreach ($result as $row) {
            $id = $row['ID'];
            $UserID = $row['UserID'];
            $title = $row['title'];
            $date = $row['date'];


            echo '<tr>';
                echo "<td class='title'><a href=\"view.php?id=$id\">$title</a></td>";
                echo "<td>$date</td>";
                echo '<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#warningModal" data-id="' . $id . '">삭제</button></td>';
                echo '</tr>';
        }
        ?>
            </tbody>
        </table>
        <!--<div class="container mt-3">
            <a class="btn btn-primary" href="board.php" style="background-color: #198754;">글쓰기</a>
        </div>-->
    </div>
    
<div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">주의</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                정말 삭제하시겠습니까? <br>
                한 번 삭제된 게시물은 복구되지 않습니다.
            </div>
            <div class="modal-footer">
                <form method="POST" action="">
                    <input type="hidden" id="ID" name="ID" value="">
                    <button type="submit" class="btn btn-secondary" name="boarddelete">확인</button>
                </form>
            </div>
        </div>
    </div>
</div>


    
    <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php if ($currentPage > 1) : ?>
            <li class="page-item">
            <a class="page-link" href="?page=1" aria-label="First">
            ≪
            </a>
        </li>
        <li class="page-item">
                <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" aria-label="Previous">
                    <
                </a>
            </li>
        <?php endif; ?>
        
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <li class="page-item <?php echo ($currentPage == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
        
        <?php if ($currentPage < $totalPages) : ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                    >
                </a>
            </li>
        <?php endif; ?>
        
         <li class="page-item">
            <a class="page-link" href="?page=<?php echo $totalPages; ?>" aria-label="Last">
                ≫
            </a>
        </li>
    </ul>
</nav>
</body>
</html>