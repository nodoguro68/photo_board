<?php 



?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <header class="header">
        <div class="header-container">
            <div class="header-logo">
                <h1><a href="index.php">ロゴ</a></h1>
            </div>

            <nav class="header-nav">
                <ul class="header-nav-menu">
                    <li class="header-nav-menu-item"><a href="index.php" class="header-nav-menu-item-link">トップページ</a></li>
                    <li class="header-nav-menu-item"><a href="login.php" class="header-nav-menu-item-link">ログイン</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">

            <!-- フォーム -->
            <form method="POST" class="form">
                <div class="form-header">
                    <h2 class="form-title">ユーザー登録</h2>
                </div>
                <div class="form-main">
                    <div class="form-group">
                        <label class="form-label">メールアドレス</label>
                        <input type="text" name="email" class="form-input">
                        <span class="err-msg"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label">パスワード<span class="note">*半角英数字8文字以上で入力してください</span></label>
                        <input type="password" name="pass" class="form-input">
                        <span class="err-msg"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label">パスワード（再入力）</label>
                        <input type="password" name="pass_re" class="form-input">
                        <span class="err-msg"></span>
                    </div>
                    <div class="form-group-btn">
                        <input type="submit" value="登録" class="btn-submit">
                    </div>
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