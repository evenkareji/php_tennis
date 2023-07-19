<?php
// p277 リスト12-4 ログインしてない -> login.phpへ移動
session_start();
if(!isset($_SESSION['id'])) {
  header('Location: login.php');
  exit();
}
/*
↑login.phpへ移動させるコードを、includes/login.phpに書く

index.php, album.php, bbs.php, info.php, upload.php で、
↓　のように、inludes/login.phpを読み込む

include 'includes/login.php';

*/
?>