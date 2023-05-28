<?php/*
session_start();
if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
}   
    $con = require_once("../../inc/db.php");

    $UserID = $_SESSION['UserID'];*/
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
    </head>
    <body>
        <header>
        <?php include 'nav.php'; ?>
        </header>

        <h3 class= "m-3" >내가 작성한 게시글</h3>
        <hr class="border opacity-100">   

        <div class ="table-group m-5">
            <table class="table table">
                <thead class = "table-light">
                    <tr>
                    <th scope="col">아이디</th>
                    <th scope="col">이름</th>
                    <th scope="col">제목</th>
                    <th scope="col">날짜</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con = mysqli_connect("localhost","root","1234","termprojectdb");
                    require_once("../../inc/db.php");
                    //$con = db_get_pdo();
                    $query = "Select * from boardtbl";// where userid = '$UserID'"; 
                    $result = $con->query($query);

                    /*while($rows = mysqli_fetch_array($ret))
                    {
                        echo "<tr>";
                        echo "<td>",$rows['id'],"</td>";
                        echo "<td>",$rows['userid'],"</td>";
                        echo "<td>",$rows['title'],"</td>";
                        echo "<td>",$rows['date']."</td>";
                        $delete_link = '
                            <form action="process_delete.php" method="post">
                                <input type="hidden" name="id" value="'.$_GET['id'].'">
                                <input type="submit" value="delete">
                            </form>
                        ';
                        echo "</tr>";
                    }*/
                    if ($result->num_rows > 0) {
                        // 게시물 목록 출력
                        while ($rows = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>",$rows['ID'],"</td>";
                            echo "<td>",$rows['UserID'],"</td>";
                            echo "<td>",$rows['title'],"</td>";
                            echo "<td>",$rows['date']."</td>";
                            // 삭제 버튼 생성
                            
                            echo "<td><form action='delete_board.php' method='post'>";
                            echo "<input type='hidden' name='post_id' value='" . $rows["ID"] . "'>";
                            echo "<input type='submit' value='삭제'>";
                            echo "</form></td>";
                            echo "</tr>";
                        }
                    } /*else {
                        echo "등록된 게시물이 없습니다.";
                    }*/
                    ?>
                </tbody>
            </table>
            
                <font size='20px'>등록된 게시물이 없습니다.</font>
        </div>

        

        <div class = "nav justify-content-center" >
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">잠깐!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        정말 삭제하시겠습니까? <br>
                        한번 삭제된 게시물은 복구되지 않습니다.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary">확인</button>
                    </div>
                </div>
            </div>
        </div>

    </body>    
</h