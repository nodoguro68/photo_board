<?php 




?>

<?php 

$page_title = 'ユーザー登録';

require_once 'templete/head.php';
require_once 'templete/header.php';

?>

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
                        <input type="text" name="email" value="<?php if(!empty($_POST['email'])) echo sanitize($_POST['email']); ?>" class="form-input" autofocus>
                        <span class="err-msg"><?php if(!empty($err_msg['email'])) echo sanitize($err_msg['email']); ?></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label">パスワード<span class="note">*半角英数字8文字以上で入力してください</span></label>
                        <input type="password" name="pass" value="<?php if(!empty($_POST['pass'])) echo sanitize($_POST['pass']); ?>" class="form-input">
                        <span class="err-msg"><?php if(!empty($err_msg['pass'])) echo sanitize($err_msg['pass']); ?></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label">パスワード（再入力）</label>
                        <input type="password" name="pass_re" value="<?php if(!empty($_POST['pass_re'])) echo sanitize($_POST['pass_re']); ?>" class="form-input">
                        <span class="err-msg"><?php if(!empty($err_msg['pass_re'])) echo sanitize($err_msg['pass_re']); ?></span>
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