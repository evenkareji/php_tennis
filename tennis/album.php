<?php include "navbar.php";
$img = [];
$prev = 4;
if ($handle = opendir('./album')) {
    while ($entry = readdir($handle)) {

        if ($entry != "." && $entry != "..") {
            $img[] = $entry;
        }
    }
    closedir($handle);
}
?>

<main role="main" class="container" style="padding:60px 15px 0">
    <div>
        <h1>アルバム</h1>
        <?php
        if (count($img) > 0) {
            echo '<div class="row">';
            $img = array_chunk($img, $prev);
            $page = 1;
            if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
                $page = intval($_GET["page"]);
                if (!isset($img[$page - 1])) {
                    $page = 1;
                }
            }
            foreach ($img[$page - 1] as $imag) {
                echo '<div class="col-3">';
                echo '<div class="card">';
                echo '<a href="./album/' . $imag . '" target="_blank">
                    <img src="./album/' . $imag . '" class="img-fluid"></a>
                    </div>
                    </div>';

            }
            echo '<nav>
            <ul class="pagination">';
            for ($i = 1; $i <= count($img); $i++) {
                echo '<li class="page-item"><a href="album.php?page=' . $i . '" class="page-link">' . $i . '</a></li>';
            }
            echo "</ul></nav>";
        }
        ?>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script>
window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>