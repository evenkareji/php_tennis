
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// 自分の名前を書いて提出する
//横田乙茂

$result = array(
    "Japanese" => 60,
    "English" => 70,
    "Mathematics" => 50,
    "History" => 60,
    "Biology" => 45
);
$total = array_sum($result); // 点数の合計

echo '<table class="table table-bordered">';
foreach ($result as $subject => $score) {
    echo '<tr>';
    echo '<td>' . $subject . '</td>';
    echo '<td>' . ($score < 60 ? '<span class="text-danger fw-bold">' . $score . '</span>' : $score) . '</td>';
    echo '</tr>';
}
echo '<tr>';
echo '<th>Total</th>';
echo '<th>' . $total . '</th>';
echo '</tr>';
echo '</table>';
?>
</body>
</html>