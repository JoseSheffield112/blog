<!DOCTYPE html>


<script src="/js/main.js"></script>
<link rel="stylesheet" href="/css/main.css">
<title>Hello</title>

<body>

    <article>
        <h1> <?= $post->title; ?> </h1>

        <div>
            <?= $post->body; ?>
        </div>

    </article>

    <button onclick="window.location.href = '/';"> Go back to mainpage </button>

</body>



