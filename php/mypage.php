<?php 

require_once 'config.php';


?>

<?php 

$page_title = 'マイページ';

require_once 'templete/head.php';
require_once 'templete/header.php';

?>
    <main class="main">
        <div class="container">

            <section class="section">
                <div class="section-header">
                    <h2 class="page-title">マイページ</h2>
                    <div class="section-inner">
                        <form method="POST" class="sort-form">
                            <div class="form-group">
                                <select name="sort" id="" class="select">
                                    <option value="">日付の新しい順</option>
                                    <option value="">日付の古い順</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                
                
                <div class="card-wrap">
                    <div class="card">
                        <a href="" class="card-date">

                        </a>
                        <a href="" class="card-link">
                            <div class="card-head">
                                <img src="../img/arashiyama.jpg" alt="" class="card-img">
                            </div>
                            <div class="card-foot">
                                <span class="card-comment"></span>
                            </div>
                        </a>
                    </div>
                </div>
            
                <div class="post-photo-link">
                    <a href="post_photo.php" class="post-photo-link-btn"></a>
                </div>
            
            </section> 
            
        </div>
    </main>
    
<?php require_once 'templete/footer.php'; ?>
    
    <script src="../js/main.js"></script>
    <script src="../js/form.js"></script>
</body>
</html>