<?php
include('navbar.php');
$num = 20;
$dsn = "mysql:host=localhost;dbname=tennis;charset=utf8";
$user = "tennisuser";
$password = "password";

$page = 1;

if (isset($_GET["page"]) && ($_GET["page"] > 1)) {
    $page = intval($_GET["page"]);
}

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

    $stmt = $db->prepare("
    SELECT * FROM bbs ORDER BY date DESC LIMIT :page, :num");
    $page = ($page - 1) * $num;
    $stmt->bindParam(':page', $page, PDO::PARAM_INT);
    $stmt->bindParam(':num', $num, PDO::PARAM_INT);
    $stmt->execute();
} catch (PDOException $e) {
    exit("error" . $e->getMessage());
}
?>

<main role="main" class="container" style="padding:60px 15px 0">
    <div>
        <h1>掲示板</h1>
        <form action="write.php" method="post">
            <div class="form-group">
                <label for="">タイトル</label>
                <input type="text" name="title" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">name</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">body</label>
                <textarea name="body" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="">pass</label>
                <input type="text" name="pass" id="" class="form-control">
            </div>
            <input type="submit" value="書き込む" class="btn btn-primary">
        </form>
        <hr>
        <?php while ($row = $stmt->fetch()): ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $row["title"] ? $row["title"] : "無題"; ?>
                </h5>

                <p class="card-text">
                    <?php echo nl2br($row["body"]) ?>
                </p>

                <?php echo $row["names"];
                    echo "(" . $row["date"] . ")"
                        ?>
            </div>
        </div>
        <?php endwhile; ?>
        <?php
        try {
            $stmt = $db->prepare("SELECT COUNT (*) FROM bss");
            $stmt->execute();
        } catch (PDOException $e) {
            exit("error" . $e->getMessage());
        }

        $comments = $stmt->fetchColumn();
        $max_page = ceil($comments / $num);

        if ($max_page >= 1) {
            echo '"<nav><ul class="pagenation">';
            for ($i = 1; $i <= $max_page; $i++) {
                echo '<li class="page-item">
                <a href="bbs.php?page=' . $i . '">' . $i . '</a>
                </li>';
            }
            echo "</ul></nav>";
        }
        ?>
    </div>
</main>
<?php include("foot.php") ?>