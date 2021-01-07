<?php 

require_once 'config.php';

$post = getPostDetail($_GET['post_id'],$_SESSION['login_user']['id']);
if(empty($post)){
    header('Location: photo_detail.php');
}

?>

<?php 

$page_title = '投稿編集ページ';

require_once 'templete/head.php';
require_once 'templete/header.php';
?>

    <main class="main">
        <div class="container">

            <form method="POST" class="post-photo-form" enctype="multipart/form-data">
                <div class="form-header">
                    <h2 class="form-title">編集</h2>
                </div>
                <div class="form-main">
                    <div class="form-group">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                        <input type="file" name="photo" class="img">
                        <span class="err-msg"><?php echo err('photo'); ?></span>
                    </div>
                    <div class="form-group">
                        <textarea name="comment" id="" class="comment" placeholder="コメントを入力"><?php echo post('comment'); ?></textarea>
                        <span class="err-msg"><?php echo err('comment'); ?></span>
                    </div>
                    <div class="counter-area">
                        <span class="count">0</span>/200
                    </div>
                    <div class="form-group-btn">
                        <input type="submit" name="post" value="投稿" class="btn-submit">
                    </div>
                </div>
            </form>

        </div>
    </main>

<?php require_once 'templete/footer.php'; ?>
    
    <script src="../js/main.js"></script>
    <script src="../js/form.js"></script>
</body>
</html>