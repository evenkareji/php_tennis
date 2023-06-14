<?php

$page=$_GET['page'];
$param=$_GET['param'];

echo 'リクエストされたページは' . $page .'です';
echo "<br/>";
echo 'パラメーター' . $param . 'です';

?>