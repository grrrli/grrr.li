<?php

function setHeaders(): void
{
    header('Access-Control-Allow-Origin: https://grrr.li');
    header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' https://grrr.li; style-src 'self' 'unsafe-inline'; object-src 'none';");
    header('Content-Type: text/html; charset=UTF-8');
    header('Cross-Origin-Opener-Policy: same-origin');
    header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
    header('Referrer-Policy: no-referrer');
    header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: DENY');
    header('X-Powered-By: Grrr.li');
    header('X-XSS-Protection: 1; mode=block');
}

function renderHeadBase(
    string $title
): void {
    ob_start();
    ?><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="<?php echo $title ; ?>" />
    <meta property="og:image" content="https://grrr.li/android-chrome-192x192.png" />
    <link rel="apple-touch-icon" href="https://grrr.li/apple-touch-icon.png" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/assets/main.css"><?php
    $head = ob_get_clean();
    echo $head;
}
