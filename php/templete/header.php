<header class="header">
    <div class="header-container">
        <div class="header-logo">
            <h1></h1>
        </div>

        <nav class="header-nav">
            <ul class="header-nav-menu">
                <li class="header-nav-menu-item"><a href="index.php" class="header-nav-menu-item-link">トップページ</a></li>

                <?php if(!empty($_SESSION['login_user'])) :?>
                    <li class="header-nav-menu-item"><a href="mypage.php" class="header-nav-menu-item-link">マイページ</a></li>
                    <li class="header-nav-menu-item"><a href="logout.php" class="header-nav-menu-item-link">ログアウト</a></li>
                <?php elseif(empty($_SESSION['login_user']) && $page_title === 'ログイン'): ?>
                    <li class="header-nav-menu-item"><a href="signup.php" class="header-nav-menu-item-link">ユーザー登録</a></li>
                <?php else: ?>
                    <li class="header-nav-menu-item"><a href="login.php" class="header-nav-menu-item-link">ログイン</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
