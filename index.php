<?php require_once 'helpers.php';  ?>

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
<ul>
    <li><a href="/calendar">calendar</a>
    <li><a href="/emojis">emojis</a>
    <li><a href="/random-word">random word</a>
    <li><a href="/uuid">uuid</a>
</ul>
</body>
</html>
