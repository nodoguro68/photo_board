<?php

require_once 'config.php';

if (!empty($_POST)) {

    $token = filter_input(INPUT_POST,'csrf_token');
    if(!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']){
        exit('不正なリクエスト');
    }

    unset($_SESSION['csrf_token']);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_re = $_POST['pass_re'];


    validationEmpty('username');
    validationEmpty('email');
    validationEmpty('pass');
    validationEmpty('pass_re');

    if(empty($err_msg)){

        // アカウント名
        validationMaxLen($email,'username',255);

        // Eメール
        validationMaxLen($email,'email',255);
        validationEmail($email);
        
        // パスワード
        validationPass($pass);
        validationMaxLen($pass,'pass',255);
        validationMinLen($pass,'pass');
        validationPassConf($pass,$pass_re);

        if(empty($err_msg)){

            $dbh = dbConnect();

            $stmt = createUser($username,$email,$pass);

            if($stmt){

                $_SESSION['login_user'] = $dbh->lastInsertId();
    
                header('Location: mypage.php');
            } else{
                $err_msg = ERR_CREATE_USER;
            }
        }
    }
}

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
                    <label class="form-label">アカウント名</label>
                    <input type="text" name="username" value="<?php echo post('username'); ?>" class="form-input" autofocus>
                    <span class="err-msg"><?php echo err('username'); ?></span>
                </div>
                <div class="form-group">
                    <label class="form-label">メールアドレス</label>
                    <input type="text" name="email" value="<?php echo post('email'); ?>" class="form-input" autofocus>
                    <span class="err-msg"><?php echo err('email'); ?></span>
                </div>
                <div class="form-group">
                    <label class="form-label">パスワード<span class="note">*半角英数字8文字以上で入力してください</span></label>
                    <input type="password" name="pass" value="<?php echo post('pass'); ?>" class="form-input">
                    <span class="err-msg"><?php echo err('pass'); ?></span>
                </div>
                <div class="form-group">
                    <label class="form-label">パスワード（再入力）</label>
                    <input type="password" name="pass_re" value="<?php echo post('pass_re'); ?>" class="form-input">
                    <span class="err-msg"><?php echo err('pass_re'); ?></span>
                </div>
                <input type="hidden" name="csrf_token" value="<?php echo sanitize(setToken()) ?>">
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