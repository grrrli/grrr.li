<?php
require_once 'vendor/autoload.php';
require_once '../helpers.php';
use Ramsey\Uuid\Uuid;
$uuid = Uuid::uuid4();
?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('UUID'); ?>
    <link rel="stylesheet" href="/uuid/uuid.css">
</head>
<body>
<div id="uuid-wrapper">
    <h1 onclick="navigator.clipboard.writeText('<?php echo $uuid; ?>');">
        <?php echo $uuid; ?>
    </h1>
</div>
</body>
</html>
