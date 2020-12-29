<?php 



?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規投稿ページ</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <header class="header">
        <div class="header-container">
            <div class="header-logo">
                <h1></h1>
            </div>

            <nav class="header-nav">
                <ul class="header-nav-menu">
                    <li class="header-nav-menu-item"><a href="index.php" class="header-nav-menu-item-link">トップページ</a></li>
                    <li class="header-nav-menu-item"><a href="" class="header-nav-menu-item-link">ログアウト</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">

            <h2 class="page-title">新規投稿</h2>
            
            <form method="POST" class="post-photo-form">
                <div class="form-group">
                    <input type="file" name="" id="" class="img">
                </div>
                <div class="form-group">
                    <textarea name="comment" id="" class="comment"></textarea>
                </div>
                <div class="form-group-btn">
                    <input type="submit" value="投稿" class="btn-submit">
                </div>
            </form>

        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <!-- <img src="" alt=""> -->
            </div>

            <nav class="footer-nav">
                <ul class="footer-nav-menu">
                    <li class="footer-nav-menu-item"><a href="" class="footer-nav-menu-item-link">利用規約</a></li>
                    <li class="footer-nav-menu-item"><a href="" class="footer-nav-menu-item-link">プライバシーポリシー</a></li>
                </ul>
            </nav>
        </div>
    </footer>
    
    <script src="../js/main.js"></script>
    <script src="../js/form.js"></script>
</body>
</html>