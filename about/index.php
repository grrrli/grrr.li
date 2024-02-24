<?php require_once '../helpers.php'; ?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Grrr.li'); ?>
    <style>
        html,
        body {
            padding: 15px;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>
<body>
<img src="/favicon.ico">
<h1>Grrr.li</h1>
<h2>About</h2>
<p>Born out of frustration, build with love.</p>
<p>
    My PC's fan shouldn't turn on when viewing a simple calendar, clock or random word website.
    <br>
    Such a page shouldn't need hundreds and hundreds of requests and multiple MB's of resources.
</p>
<p>Build for personal use but feel free to use it as well.</p>
<br>
<a
        href="/"
        class="button"
>Back to homepage</a>
<br>
<br>
<a
        href="https://github.com/grrrli/grrr.li"
        rel="noopener noreferrer nofollow"
        target="_blank"
        class="button"
>View on GitHub</a>
</body>
</html>
