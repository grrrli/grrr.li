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
    ?><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="<?php echo $title ; ?>" />
    <meta property="og:image" content="/android-chrome-192x192.png" />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    <link rel="icon" sizes="48x48" href="/favicon.ico" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="manifest" href="/site.webmanifest" />
    <link rel="mask-icon" href="/favicon.ico" color="#FFFFFF" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/assets/main.css"><?php
    $head = ob_get_clean();
    echo $head;
}
