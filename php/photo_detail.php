<?php 

require_once 'config.php';

$post = getPostDetail($_GET['post_id'],$_SESSION['login_user']['id']);


?>

<?php 

$page_title = '投稿詳細ページ';

require_once 'templete/head.php';
require_once 'templete/header.php';

?>

    <main class="main">
        <div class="container">

            <a href="index.php">＞戻る</a>
            
            <div class="photo">
                <div class="photo-header">
                    <span class="photo-date"><?php echo sanitize($post['created_at']); ?></span>
                    <span class="photo-account-name"></span>
                </div>
                <div class="photo-main">
                    <img src="../uploads/<?php echo sanitize($post['img_name']); ?>" alt="" class="photo-img">
                </div>
                <div class="photo-foot">
                    <span class="photo-comment"><?php echo sanitize($post['comment']); ?></span>
                </div>
            </div>
            

        </div>
    </main>

    <?php require_once 'templete/footer.php'; ?>
    
    <script src="../js/main.js"></script>
    <script src="../js/form.js"></script>
</body>
</html>