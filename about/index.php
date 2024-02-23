<?php require_once '../helpers.php';  ?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Grrr.li'); ?>
    <style>
        html,
        body {
            background: white;
            color: black;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
        a {
            display: block;
            padding: 20px;
        }
        @media (prefers-color-scheme: dark) {
            html,
            body {
                background: black;
                color: white;
            }
        }
    </style>
</head>
<body>
<h1>Grrr.li</h1>
<h3>About</h3>
<p>Born out of frustration, build with love.</p>
<p>
    My PC's fan shouldn't turn on when viewing a simple calendar, clock or random word website.
    <br>
    Such a page shouldn't need hundreds and hundreds of requests and multiple MB's of resources.
</p>
<p>Build for personal use but feel free to use it as well.</p>
<a href="/">Back to homepage</a>
<a
    href="https://github.com/grrrli/grrr.li"
    rel="noopener noreferrer nofollow"
    target="_blank"
>View on GitHub</a>
</body>
</html>
