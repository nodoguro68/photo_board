<?php 

require_once 'config.php';


?>

<?php 

$page_title = 'トップページ';

require_once 'templete/head.php';
require_once 'templete/header.php';

?>

    <main class="main">
        <div class="container">

            <section class="section">
                <div class="section-header">
                    <h2 class="page-title">投稿一覧</h2>
                </div>
                
                <div class="card-wrap">
                    <div class="card">
                        <a href="" class="card-date">
                            
                        </a>
                        <a href="photo_detail.php" class="card-link">
                            <div class="card-head">
                                <img src="../img/nabegataki.jpg" alt="" class="card-img">
                            </div>
                            <div class="card-foot">
                                <span class="card-account"></span>
                                <h3 class="card-title"></h3>
                            </div>
                        </a>
                    </div>
                </div>
    
                <div class="post-photo-link">
                    <a href="post_photo.php" class="post-photo-link-btn">＋</a>
                </div>

            </section>
            
        </div>
    </main>

    <?php require_once 'templete/footer.php'; ?>
    
    <script src="../js/main.js"></script>
    <script src="../js/form.js"></script>
</body>
</html>