<?php
$fp = fopen("info.txt", "r");
$title = fgets($fp);
fclose($fp);
?>
<?php include('navbar.php'); ?>

<main role="main" class="container" style="padding:60px 15px 0">
    <div>
        <h1>お知らせ</h1>
        <p>
            <a href="info.php">
                <?php echo $title ?>
            </a>
        </p>

        <!-- 本文ここまで -->
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script>
window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>