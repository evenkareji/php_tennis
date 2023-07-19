<?php
include 'includes/login.php'; // ←を追加
$id = intval($_POST['id']);
$pass = $_POST['pass'];
$token = $_POST['token'];

if ($token != hash("sha256", session_id())) {
    header("Location: bbs.php");
    exit();
}
if ($id == '' || $pass == '') {
    header('Location: bbs.php');
    exit();
}

$dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
$user = 'tennisuser'; // ユーザー作らなかった人は root
$password = 'password'; // ユーザー作らなかった人は root

try {
    // [何らかの処理]を実行する
    // データベースへアクセスして、bbsに記事を登録する
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   // ↑2行は、データベースへアクセスするときに書く
   
   // データベースから読み込み
   $stmt = $db->prepare("
       DELETE FROM bbs WHERE id=:id AND pass=:pass"
);
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
   $stmt->execute();
   } catch (PDOException $e) {
    // [何らかの処理]を実行できなかった場合の処理
    // エラーメッセージを出す
    exit('エラー: ') . $e->getMessage();
   }
   header('Location: bbs.php');
   exit();