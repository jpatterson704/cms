<?php

$db_host = "localhost";
$db_name = "cms";
$db_user = "cms_www";
$db_pass = "64w6H2rOJ1zwLRyk";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

$sql = "SELECT *
        FROM article
        WHERE id = 1";

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $article = mysqli_fetch_assoc($results);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>My blog</title>
    <meta charset="utf-8">
</head>
<body>

    <header>
        <h1>My blog</h1>
    </header>

    <main>
        <?php if ($article === null): ?>
            <p>Article not found.</p>
        <?php else: ?>

            <article>
                <h2><?= $article['title']; ?></h2>
                <p><?= $article['content']; ?></p>
            </article>

        <?php endif; ?>
    </main>
</body>
</html>
