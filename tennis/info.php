<?php
/*
info.phpは全文表示。
今のindex.phpをコピーすればOK
*/ ?>
<!doctype html>
<html lang="ja" >
  <head>
    <title>サークルサイト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>

    <?php include('navbar.php'); ?>

    <main role="main" class="container" style="padding:60px 15px 0">
      <div>
        <!-- ここから「本文」-->

        <h1>お知らせ</h1>
<?php
$filedata = file("info.txt");
$body = '';
    if (count($filedata) > 0) { // お知らせがあるかどうか
        foreach ($filedata as $i => $text) {
            if ($i==0) {
                $body .= '<h2>' . $text . '</h2>';
            } else {
                $body .= $text . '<br>';
            }
        }
    }
    echo '<p>' . $body . '</p>';
?>
        <!-- 本文ここまで -->
      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

