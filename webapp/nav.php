<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
            <a class="navbar-brand" href="main.php"><img src="../images/logo.png" alt="Logo" width="80" class="d-inline-block align-text-top"></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./idealSearch.php">이상형 찾기</a>
                </li>
            </ul>
            <ul class="navbar-nav">    
                <li class="nav-item">
                    <a class="nav-link" href="./freeBoard.php">자유게시판</a>
                </li>
            </ul>    
            <ul class="navbar-nav">    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        마이페이지
                    </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./myPage.php">마이페이지</a></li>
                    <li><a class="dropdown-item" href="boardManage.php">게시판 관리</a></li>
                    <li><a class="dropdown-item" href="?logout=true">로그아웃</a></li>
                    <?php
                        if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
                            // 세션 파기
                            session_destroy();
                        
                            // 로그인 페이지로 리다이렉트
                            header("Location: ./login.php");
                            exit();
                        }
                    ?>
                </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>