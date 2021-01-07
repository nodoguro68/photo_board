<?php 

// エラー
error_reporting(E_ALL);
ini_set('display_errors','on');
ini_set('log_errors','on');
ini_set('error_log','php.log');

// DB接続
define('DB_HOST','localhost');
define('DB_NAME','photo_board');
define('DB_USER','root');
define('DB_PASS','root');

function dbConnect(){
    $host = DB_HOST;
    $db = DB_NAME;
    $user = DB_USER;
    $password = DB_PASS;

    $dsn = "mysql:dbname=$db;host=$host;charset=utf8";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // バッファードクエリを使う(一度に結果セットをすべて取得し、サーバー負荷を軽減)
        // SELECTで得た結果に対してもrowCountメソッドを使えるようにする
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
        
        PDO::ATTR_EMULATE_PREPARES => false
    );
    
    try{
        $dbh = new PDO($dsn,$user,$password,$options);
        
        return $dbh;

    } catch(PDOException $e){
        echo ERR_DB_CONNECT.$e->getMessage();
        exit();
    }
}


// セッション
session_start();

// エラ〜メッセージ
$err_msg = array();
define('ERR_EMPTY','入力必須項目です');
define('ERR_EMAIL','Eメールの形式で入力してください');
define('ERR_MIN_LEN','8文字以上入力してください');
define('ERR_PASS_CONF','パスワードの再入力が違います');
define('ERR_PASS','半角英数字で入力してください');
define('ERR_CREATE_USER','ユーザー登録に失敗しました');
define('ERR_DB_CONNECT','データベース接続に失敗しました');
define('ERR_LOGIN','ログインに失敗しました');
define('ERR_FILE_SIZE','ファイルサイズは1MB未満にしてください');
define('ERR_FILE_EXT','画像ファイルを添付してください');
define('ERR_IS_SELECTED','ファイルが選択されていません');
define('ERR_SAVE_FILE','ファイルを保存できませんでした');

// バリデーション
function validationEmpty($key){
    global $err_msg;
    if(empty($_POST[$key])){
        $err_msg[$key] = ERR_EMPTY; 
    }
}
function validationEmail($email){
    global $err_msg;
    if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email)){
        $err_msg['email'] = ERR_EMAIL; 
    }
}
function validationPass($pass){
    global $err_msg;
    if(!preg_match("/^[a-zA-Z0-9]+$/",$pass)){
        $err_msg['pass'] = ERR_PASS; 
    }
}
function validationMaxLen($str,$key,$num){
    global $err_msg;
    if(mb_strlen($str) >= $num){
        $err_msg[$key] = $num.'文字以内で入力してください'; 
    }
}
function validationMinLen($str,$key){
    global $err_msg;
    if(mb_strlen($str) < 8){
        $err_msg[$key] = ERR_MIN_LEN; 
    }
}
function validationPassConf($pass,$pass_re){
    global $err_msg;
    if($pass !== $pass_re){
        $err_msg['pass'] = ERR_PASS_CONF; 
    }
}

function validationFileSize($file_size,$file_err){
    global $err_msg;
    if($file_size > 1048576 || $file_err === 2){
        $err_msg['photo'] = ERR_FILE_SIZE;
    }
}
function validationFileExt($file_name){
    global $err_msg;
    $allow_ext = array('jpg','jpeg','png');
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

    if(!in_array(strtolower($file_ext),$allow_ext)){
        $err_msg['photo'] = ERR_FILE_EXT;
    }
}




// データ取得 index.php
function getPosts(){

    try{

        $dbh = dbConnect();

        $sql = 'SELECT * FROM posts WHERE delete_flg = 0';

        $stmt = $dbh->query($sql);

        $user_data = $stmt->fetchAll();

        return $user_data;

    } catch(Exception $e){
        return false;
    }
}

// データ取得 mypage.php
function getMyPosts($user_id){

    try{

        $dbh = dbConnect();

        $sql = 'SELECT * FROM posts WHERE user_id = :user_id AND delete_flg = 0';

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':user_id' => $user_id,
        ));

        $user_data = $stmt->fetchAll();

        return $user_data;

    } catch(Exception $e){
        return false;
    }
}

// データ取得 photo_detail.php
function getPostDetail($id){

    try{

        $dbh = dbConnect();

        $sql = 'SELECT * FROM posts WHERE id = :id AND delete_flg = 0';

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':id' => $id,
        ));

        $user_data = $stmt->fetch();

        return $user_data;

    } catch(Exception $e){
        return false;
    }
}

// サニタイズ
function sanitize($str){
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

// ユーザー登録
function createUser($username,$email,$pass){

    try{

        $dbh = dbConnect();

        $sql = 'INSERT users SET username = :username, email = :email, password = :password ,login_time = :login_time ,created_at = :created_at';

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':username' => $username,
            ':email' => $email,
            ':password' => password_hash($pass,PASSWORD_DEFAULT),
            ':login_time' => date('Y-m-d H:i:s'),
            ':created_at' => date('Y-m-d H:i:s'),
        ));

        return $stmt;

    } catch(Exception $e){
        echo ERR_DB_CONNECT.$e->getMessage();
    }
}
function getUserByEmail($email){

    try{

        $dbh = dbConnect();

        $sql = 'SELECT * FROM users WHERE email = :email AND delete_flg = 0';

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':email' => $email,
        ));

        $user_data = $stmt->fetch();

        return $user_data;

    } catch(Exception $e){
        return false;
    }
}
function login($email,$pass){

    $user_data = getUserByEmail($email);

    if(password_verify($pass,$user_data['password'])){

        session_regenerate_id(true);
        $_SESSION['login_user'] = $user_data;
        $result = true;
        return $result;
    }

}
function checkLogin(){
    if(empty($_SESSION['login_user'])){
        header('Location: login.php');
    }
}
function logout(){
    $_SESSION = array();
    session_destroy();
    header('Location: login.php');
}

// ワンタイムトークン
function setToken(){

    // session_start();
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;

    return $csrf_token;
}



// post入力保持
function post($key){
    if(!empty($_POST[$key])){
        return sanitize($_POST[$key]);
    }
}
// エラーメッセージ
function err($key){
    global $err_msg;
    if(!empty($err_msg[$key])){
        return sanitize($err_msg[$key]);
    }
}

function uploadFile($tmp_path,$save_path,$save_file_name){
    if(is_uploaded_file($tmp_path)){
        if(move_uploaded_file($tmp_path,$save_path)){
            echo $save_file_name.'をアップしました';
        } else {
            $err_msg['photo'] = ERR_SAVE_FILE;
        }
    } else {
        $err_msg['photo'] = ERR_IS_SELECTED;
    }
}
function createPost($user_id,$img_name,$img_path,$comment){

    try{

        $dbh = dbConnect();

        $sql = 'INSERT posts SET user_id = :user_id, img_name = :img_name, img_path = :img_path, comment = :comment ,created_at = :created_at';

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':user_id' => $user_id,
            ':img_name' => $img_name,
            ':img_path' => $img_path,
            ':comment' => $comment,
            ':created_at' => date('Y-m-d H:i:s'),
        ));

        if($stmt){
            return $stmt;
        }


    } catch(Exception $e){
        echo ERR_DB_CONNECT.$e->getMessage();
    }
}