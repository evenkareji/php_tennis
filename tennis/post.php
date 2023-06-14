<?php
$name=$_POST['name'];
// var_dump($name);



$gender=$_POST['gender'];
// var_dump($gender);
if($gender=='man'){
  $gender='男性';
}else if($gender=='woman'){
  $gender='女性';
}

$tmp_star=intval($_POST['star']);
// var_dump($tmp_star);

$star = '';
if($tmp_star<1||$tmp_star>5){
  $star = '不正な値です';
}else{
  for($i=0;$i<$tmp_star;$i++){
    $star .= '★';
  }
  for($i; $i<5;$i++){
    $star .= '☆';
  }
}

// var_dump($star);

$other = $_POST['other'];
?>

<html>
  <head>
   <meta charset="UTF-8">
   <title>アンケート結果</title>
  </head>
  <body>
    <h1>アンケート結果</h1>
    <p>お名前：<?php echo $name; ?></p>
    <p>性別：<?php echo $gender; ?></p>
    <p>評価：<?php echo $star; ?></p>
    <p>ご意見：<?php echo nl2br($other); ?></p>
  </body>
</html>