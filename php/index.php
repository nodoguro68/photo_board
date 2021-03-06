<?php 

require_once 'config.php';

$posts = getPosts();

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
                    <?php if(!empty($posts)): ?>
                    <?php foreach($posts as $post): ?>
                        <div class="card">
                            <a href="photo_detail.php?post_id=<?php echo sanitize($post['id']); ?>" class="card-date">
                                <?php echo sanitize(explodeDatetime($post['created_at'])); ?>
                            </a>
                            <a href="photo_detail.php?post_id=<?php echo sanitize($post['id']); ?>" class="card-link">
                                <div class="card-head">
                                    <img src="../uploads/<?php echo sanitize($post['img_name']); ?>" alt="投稿画像" class="card-img">
                                </div>
                                <div class="card-foot">
                                    <span class="card-account"></span>
                                    <h3 class="card-title"><?php echo sanitize($post['comment']); ?></h3>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
    
                <div class="post-photo-link">
                    <a href="post_photo.php" class="post-photo-link-btn">＋</a>
                </div>

            </section>
            
        </div>
    </main>

    <?php require_once 'templete/footer.php'; ?>
    
    <script src="../js/main.js"></script>
</body>
</html>