<?php
  require 'database.php';

if( isset($_GET['id']) &&  is_numeric($_GET['id'])){
    $sql = "SELECT *
    FROM article
    WHERE id = " . $_GET['id'];

    $results = mysqli_query($conn, $sql);

    if ( $results === false) {
        echo mysqli_error($conn);
    } else {
        $article = mysqli_fetch_assoc($results);
    }
}else{
    $article = null;
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