<?php require_once 'helpers.php'; ?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Grrr.li'); ?>
</head>
<body>
<img
        src="/favicon.ico"
        class="logo"
        alt="Logo"
>
<h1>Grrr.li</h1>

<a
        href="/calendar/"
        class="button"
>Calendar</a>
<a
        href="/clock/"
        class="button"
>Clock</a>
<a
        href="/emojis/"
        class="button"
>Emojis</a>
<a
        href="/ip/"
        class="button"
>IP</a>
<a
        href="/lorem-ipsum/"
        class="button"
>Lorem ipsum</a>
<a
        href="/moon-phase/"
        class="button"
>Moon phase</a>
<a
        href="/random-number/"
        class="button"
>Random number</a>
<a
        href="/random-word/"
        class="button"
>Random word</a>
<a
        href="/uuid/"
        class="button"
>UUID</a>

<br>
<br>

<a
        href="/about/"
        class="button"
>About</a>
</body>
</html>
