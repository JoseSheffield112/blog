<!DOCTYPE html>

<script src="/js/main.js"></script>
<link rel="stylesheet" href="/css/main.css">
<title>Hello</title>

<body>

    <?php foreach ($posts as $post) : ?>
        <article>
                <?= $post ?>
        </article>
    <?php endforeach; ?>

</body>
