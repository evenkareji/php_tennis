<?php
include("navbar.php");
$fp = fopen("info.txt", "r");
$line = [];
$body = "";
if ($fp) {
    while (!feof($fp)) {
        $line[] = fgets($fp);
    }
    fclose($fp);
}
?>

<main role="main" class="container" style="padding:60px 15px 0">
    <div>
        <h1>お知らせ</h1>
        <?php
        if (count($line) > 0) {
            foreach ($line as $i => $txt) {
                if ($i == 0) {
                    echo "<h2>$txt</h2>";
                } else {
                    $body .= $txt . "<br>";
                }
            }
            echo $body;
        }
        ?>
    </div>
</main>