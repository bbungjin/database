<?php
session_start();


if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
}   
    require_once("../../inc/db.php");

    $UserID = $_SESSION['UserID'];

    $search_result = $_SESSION['search_result'];
    $search_result_count = $_SESSION['search_result_count'];

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
        <link rel = "stylesheet" href = "./css/paging.css">
    </head>
    <body>
        <header>
        <?php include 'nav.php'; ?>
        </header>

        <h3 class= "m-3" >결과 요약</h3>
        <hr class="border opacity-100">    

        <div class ="table-group m-5">
            <table class="table table-hover">
                <thead class = "table-light">
                    <tr>
                    <th scope="col">이름</th>
                    <th scope="col">나이</th>
                    <th scope="col">키</th>
                    <th scope="col">몸무게</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                

                // 페이지 번호와 페이지당 결과 수를 설정합니다.
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $results_per_page = 10;
                ?>
                    <?php foreach ($search_result as $row) { ?>
                    <tr onClick="location.href= './idealSpecific.php?UserID=<?php echo $row['UserID']; ?>'">
                        <td><?php echo $row['Name']; ?> </td>
                        <td><?php echo $row['age']; ?> </td>
                        <td><?php echo $row['Height']; ?> </td>
                        <td><?php echo $row['weight']; ?> </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="nav justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php

                // 페이지 링크 출력
                $num_of_pages = ceil($search_result_count[0]['cnt'] / $results_per_page);
                for ($currentPage = 1; $currentPage <= $num_of_pages; $currentPage++) {
                    echo "<li class='page-item" . ($currentPage == $page ? " active" : "") . "'>";
                    echo "<a class='page-link' href='idealSummary.php?page=$currentPage'>$currentPage</a>";
                    echo "</li>";
                }
                ?>
            </ul>
        </nav>
    </div>
        

    </body>
</html>
