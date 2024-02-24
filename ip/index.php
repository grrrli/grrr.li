<?php
require_once '../helpers.php';

function getClientIp() {
    $headers = [
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR'
    ];

    foreach ($headers as $header) {
        if (array_key_exists($header, $_SERVER)) {
            foreach (explode(',', $_SERVER[$header]) as $ip) {
                $ip = trim($ip);
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }
    }

    return 'Unknown';
}

$ip = getClientIp();
?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase(($ip !== 'Unknown') ? $ip : 'IP'); ?>
    <link rel="stylesheet" href="/ip/ip.css">
</head>
<body>
<div id="ip-wrapper">
    <h1 onclick="navigator.clipboard.writeText('<?php echo $ip; ?>');">
        <?php echo $ip; ?>
    </h1>
</div>
</body>
</html>
