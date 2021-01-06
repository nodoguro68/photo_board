<?php 




?>

<?php 

$page_title = '新規投稿ページ';

require_once 'templete/head.php';
require_once 'templete/header.php';

?>

    <main class="main">
        <div class="container">

            <form method="POST" class="post-photo-form">
                <div class="form-header">
                    <h2 class="form-title">新規投稿</h2>
                </div>
                <div class="form-main">
                    <div class="form-group">
                        <input type="file" name="" id="" class="img">
                    </div>
                    <div class="form-group">
                        <textarea name="comment" id="" class="comment" placeholder="コメントを入力"></textarea>
                    </div>
                    <div class="counter-area">
                        <span class="count">0</span>/200
                    </div>
                    <div class="form-group-btn">
                        <input type="submit" value="投稿" class="btn-submit">
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