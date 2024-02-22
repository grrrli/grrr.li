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
<a href="/calendar">calendar</a>
<a href="/emojis">emojis</a>
<a href="/random-word">random word</a>
<a href="/uuid">uuid</a>
</body>
</html>
