<!DOCTYPE html>

<script src="/js/main.js"></script>
<link rel="stylesheet" href="/css/main.css">
<title>Hello</title>

<body>

    <?php foreach ($posts as $post) : ?>
        <article>
            <h1>
                <a href="posts/<?= $post->slug ?>">
                    <?= $post->title ?>
                </a>
            </h1>

            <div>
                <?= $post->excerpt ?>
            </div>
        </article>
    <?php endforeach; ?>

</body>
