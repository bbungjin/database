<?php
session_start();
if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
}   
    require_once("../../inc/db.php");

    $UserID = $_SESSION['UserID'];

$age_start = isset($_POST['age_start']) ? $_POST['age_start'] : 0;
$age_end = isset($_POST['age_end']) ? $_POST['age_end'] : 10000;
$Height_start = isset($_POST['Height_start']) ? $_POST['Height_start'] : 0;
$Height_end = isset($_POST['Height_end']) ? $_POST['Height_end'] : 100000;
$sex = isset($_POST['sex']) ? $_POST['sex'] : null;
$region = isset($_POST['region']) && $_POST['region'] == "상관 없음" ? null : $_POST['region'];
$mbti = isset($_POST['mbti']) && $_POST['mbti'] == "상관 없음" ? null : $_POST['mbti'];
$major = isset($_POST['major']) && $_POST['major'] == "상관 없음" ? null : $_POST['major'];
$weight_start = isset($_POST['weight_start']) ? $_POST['weight_start'] : 0;
$weight_end = isset($_POST['weight_end']) ? $_POST['weight_end'] : 100000;

//조건에 맞는 투플 검색 쿼리
$search_result = db_select("select * from usertbl where (age >= ? and age <= ?) 
and (height >= ? and height <= ?)
and (sex like ifnull(?, '%'))
and (region like ifnull(?, '%'))
and (mbti like ifnull(?, '%'))
and (major like ifnull(?, '%'))
and (weight >= ? and weight <= ?)", array($age_start, $age_end, $Height_start, $Height_end, $sex, $region, $mbti, $major, $weight_start, $weight_end));

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
                require_once("./func/accountManage.post.php");

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
                $num_of_pages = ceil(countUsers() / $results_per_page);
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
