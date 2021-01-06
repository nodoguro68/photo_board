<?php 




?>

<?php 

$page_title = '投稿詳細ページ';

require_once 'templete/head.php';
require_once 'templete/header.php';

?>

    <main class="main">
        <div class="container">
            
            <div class="photo">
                <div class="photo-header">
                    <span class="photo-date"></span>
                    <span class="photo-account-name"></span>
                </div>
                <div class="photo-main">
                    <img src="../img/ginzanonsen.jpeg" alt="" class="photo-img">
                </div>
                <div class="photo-foot">
                    <span class="photo-comment"></span>
                </div>
            </div>
            

        </div>
    </main>

    <?php require_once 'templete/footer.php'; ?>
    
    <script src="../js/main.js"></script>
    <script src="../js/form.js"></script>
</body>
</html>