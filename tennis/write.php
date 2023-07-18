<?php

$name = $_POST["name"];
$title = $_POST["title"];
$body = $_POST["body"];
$pass = $_POST["pass"];

if ($name == "" || $body == "") {
    header("Locaion:bbs.php");
    exit();
}

if (!preg_match("/^[0-9]{4}/", $pass)) {
    header("Locaion:bbs.php");
    exit();
}

$dsn = "mysql:host=localhost;dbname=tennis;charset=utf8";
$user = "tennisuser";
$password = "password";

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $stmt = $db->prepare("INSERT INTO bbs (names, title, body, date, pass)
      VALUES (:names, :title, :body, now(), :pass)");
    var_dump($stmt);
    $stmt->bindParam(":names", $name, PDO::PARAM_STR);
    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":body", $body, PDO::PARAM_STR);
    $stmt->bindParam(":pass", $pass, PDO::PARAM_INT);
    echo "<br>";
    var_dump($stmt);
    if ($stmt->execute()) {
        echo "成功";
    } else {
        echo "失敗";
    }
    header("Location:bbs.php");
} catch (PDOException $e) {
    exit("error:" . $e->getMessage());
}
?>