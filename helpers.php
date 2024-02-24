<?php

function setHeaders(): void
{
    $cachingPeriodInDays = 1;
    $cacheMaxAge = $cachingPeriodInDays * 24 * 60 * 60;
    $cacheExpirationDate = gmdate('D, d M Y H:i:s', time() + $cacheMaxAge) . ' GMT';
    header('Access-Control-Allow-Origin: https://grrr.li');
    header("Cache-Control: public, max-age=$cacheMaxAge");
    header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' https://grrr.li; style-src 'self'; object-src 'none';");
    header('Content-Type: text/html; charset=UTF-8');
    header('Cross-Origin-Opener-Policy: same-origin');
    header("Expires: $cacheExpirationDate");
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
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#FFFFFF" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#000000" media="(prefers-color-scheme: dark)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/assets/main.css"><?php
    $head = ob_get_clean();
    echo $head;
}
