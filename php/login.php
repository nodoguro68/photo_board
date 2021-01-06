<?php 

require_once 'config.php';

if (!empty($_POST)) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    validationEmpty('email');
    validationEmpty('pass');

    if(empty($err_msg)){

        // Eメール
        validationMaxLen($email,'email',255);
        validationEmail($email);
        
        // パスワード
        validationPass($pass);
        validationMaxLen($pass,'pass',255);
        validationMinLen($pass,'pass');

        if(empty($err_msg)){

            $dbh = dbConnect();

            $result = login($email,$pass);

            if($result){

                header('Location: mypage.php');

            } else {
                $err_msg['email'] = 'メールアドレスかパスワードのどちらかが間違っています';
            }

        }
    }
}


?>

<?php 

$page_title = 'ログイン';

require_once 'templete/head.php';
require_once 'templete/header.php';

?>

    <main class="main">
        <div class="container">
            
            <!-- フォーム -->
            <form method="POST" class="form">
                <div class="form-header">
                    <h2 class="form-title">ログイン</h2>
                </div>
                <div class="form-main">
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
                    <div class="form-group-btn">
                        <input type="submit" value="ログイン" class="btn-submit">
                    </div>
                </div>
            </form>

        </div>
    </main>

    <?php require_once 'templete/footer.php';?>
    
    <script src="../js/main.js"></script>
    <script src="../js/form.js"></script>
</body>
</html>