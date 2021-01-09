<?php 

require_once 'config.php';
checkLogin();


if(!empty($_POST) && !empty($_FILES)){

    $photo_file = $_FILES['photo'];
    $photo_file_name = $_FILES['photo']['name'];
    $photo_tmp_path = $_FILES['photo']['tmp_name'];
    $photo_file_err = $_FILES['photo']['error'];
    $photo_file_size = $_FILES['photo']['size'];
    $upload_dir = '/Applications/MAMP/htdocs/photo_board/uploads/';
    $save_file_name = date('YmdHis').$photo_file_name;
    $save_path = $upload_dir.$save_file_name;
    
    $comment = $_POST['comment'];

    validationFileSize($photo_file_size,$photo_file_err);
    validationFileExt($photo_file_name);
    
    validationMaxLen($comment,'comment',200);
    
    if(empty($err_msg)){
        
        uploadFile($photo_tmp_path,$save_path,$save_file_name);
        createPost($_SESSION['user_id'],$save_file_name,$save_path,$comment);

        header('Location: index.php');
    }

}

?>

<?php 

$page_title = '新規投稿ページ';

require_once 'templete/head.php';
require_once 'templete/header.php';
?>

    <main class="main">
        <div class="container">

            <form method="POST" class="post-photo-form" enctype="multipart/form-data">
                <div class="form-header">
                    <h2 class="form-title">新規投稿</h2>
                </div>
                <div class="form-main">
                    <div class="form-group-img">
                        <label class="form-label">画像を選択</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                        <input type="file" name="photo" class="img-file" id="imgFile">
                        <img src="" class="preview" id="preview" alt="プレビュー画像">
                        <span class="err-msg"><?php echo err('photo'); ?></span>
                    </div>
                    <div class="form-group">
                        <textarea name="comment" id="comment" class="comment" placeholder="コメントを入力"><?php echo post('comment'); ?></textarea>
                        <span class="err-msg"><?php echo err('comment'); ?></span>
                    </div>
                    <div class="counter-area">
                        <span class="count" id="counter">0</span>/200
                    </div>
                    <div class="form-group-btn">
                        <input type="submit" name="post" value="投稿" class="btn-submit">
                    </div>
                </div>
            </form>

        </div>
    </main>

<?php require_once 'templete/footer.php'; ?>
    
    <script src="../js/validation.js"></script>
    <script src="../js/text_counter.js"></script>
    <script src="../js/img_preview.js"></script>
</body>
</html>