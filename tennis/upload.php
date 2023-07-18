<?php
include "navbar.php";
$msg = null;
$alert = null;
if (isset($_FILES['img']) && is_uploaded_file($_FILES['img']['tmp_name'])) {
    $o_name = $_FILES["img"]["tmp_name"];
    $n_name = date("YmdHis");
    $size = getimagesize($_FILES["img"]["tmp_name"]);
    echo ($size[2]);
    switch ($size[2]) {
        case IMAGETYPE_JPEG:
            $n_name .= ".jpg";
            break;
        case IMAGETYPE_PNG:
            $n_name .= ".png";
            break;
        case IMAGETYPE_GIF:
            $n_name = ".gif";
        default:
            header("Location:upload.php");
            exit();
    }
    echo $o_name;
    if (move_uploaded_file($o_name, 'album/' . $n_name)) {
        $msg = "成功";
        $alert = "sucsess";
    } else {
        $msg = "失敗";
        $alert = "danger";
    }
}
?>
<main role="main" class="container" style="padding:60px 15px 0">
    <h1>画像アップロード</h1>
    <?php
    if ($msg) {
        echo '<div class="alert alert-' . $alert . '">' . $msg . '</div>';
    }
    ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>アップロードファイル</label>
            <input type="file" name="img" class="form-content-file">
        </div>
        <input type="submit" value="アップロード" class="btn btn-primary">
    </form>
</main>
<?php include "foot.php";