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



// データ取得 index.php
function getPosts(){

}

// データ取得 mypage.php
function getMyPosts(){

}

// データ取得 photo_detail.php
function getPhotoDetail(){

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