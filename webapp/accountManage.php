<?php
session_start();
if (isset($_SESSION['UserID']) === false){
    header("Location: ./login.php");
    exit();
}   
    require_once("../../inc/db.php");

    $UserID = $_SESSION['UserID'];
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
        function changeAuthority(authority, userID) {
            // AJAX 요청을 통해 백엔드에 권한 변경 요청 전달
            $.ajax({
                type: "POST",
                url: "./func/updateAuthority.php",
                data: {
                    authority: authority,
                    userID: userID
                },
                success: function (response) {
                    location.reload();
                },
                error: function(xhr, status, error) {

                }
                
            });
        }

        let deleteUserID; // 선택한 사용자 ID를 저장하기 위한 변수

        function setUserID(userID) {
            deleteUserID = userID; // 선택한 사용자 ID를 변수에 저장
        }



        function deleteUser(deleteUserID) {
            // AJAX 요청을 통해 백엔드에 유저 삭제 요청 전달
            $.ajax({
                type: "POST",
                url: "./func/userDelete.php",
                data: {
                    deleteUserID
                },
                success: function (response) {
                    location.reload();
                },
                error: function (xhr, status, error) {
                    // 오류 처리 (필요한 경우 구현)
                }
            });
        }

        
    </script>
    <link rel="stylesheet" href="./css/paging.css">
</head>
<body>
    <header>
        <?php include 'navAdmin.php'; ?>
    </header>

    <h3 class="m-3">계정 관리</h3>
    <hr class="border opacity-100">
    
    <div class="table-group m-5">
        <table class="table table">
            <thead class="table-light">
                <tr>
                    <th scope="col">아이디</th>
                    <th scope="col">비밀번호</th>
                    <th scope="col">권한</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("./func/accountManage.post.php");

                // 페이지 번호와 페이지당 결과 수를 설정합니다.
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $results_per_page = 10;

                // 사용자 데이터 가져오기
                $users = fetchUsers($page, $results_per_page);

                // 사용자 데이터를 테이블에 출력
                if (!empty($users)) {
                    foreach ($users as $user) {
                        $userID = $user['UserID'];
                        $userPW = $user['UserPW'];
                        $author = $user['Author']; // $user 작동함.  $author에 저장. $author도 작동함.

                        echo "<tr>";
                        echo "<td>$userID</td>";
                        echo "<td>$userPW</td>";
                        echo "<td>";
                        echo "<select class='form-select' onchange = 'changeAuthority(this.value, \"$userID\")' name = 'authorityChange'>";
                        echo "<option value='U' " . ($author == "U" ? "selected" : "") . ">사용자</option>";
                        echo "<option value='A' " . ($author == "A" ? "selected" : "") . ">관리자</option>";
                        echo "</select>";
                        echo "</td>";
                        echo "<td data-bs-toggle='modal' data-bs-target='#warningModal' onclick='setUserID(\"$userID\")'>삭제</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>데이터가 없습니다.</td></tr>";
                }

                // 데이터베이스 연결 종료
                $pdo = null;
                ?>
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
                    echo "<a class='page-link' href='accountManage.php?page=$currentPage'>$currentPage</a>";
                    echo "</li>";
                }
                ?>
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
                    한번 삭제된 계정은 복구되지 않습니다.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="deleteUser(deleteUserID)">확인</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>