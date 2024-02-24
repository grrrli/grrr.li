<?php require_once 'helpers.php';  ?>

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
<a href="/calendar/" class="button">Calendar</a>
<a href="/clock/" class="button">Clock</a>
<a href="/emojis/" class="button">Emojis</a>
<a href="/random-word/" class="button">Random word</a>
<a href="/uuid/" class="button">UUID</a>
<br>
<br>
<a href="/about/" class="button">About</a>
</body>
</html>
