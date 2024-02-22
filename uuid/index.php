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
    <?php renderHeadBase('uuid'); ?>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background: white;
            color: black;
            font-family: 'Times New Roman', Times, serif;
        }
        h1 {
            font-size: 4em;
            margin: 15px;
        }
        h1:active {
            opacity: 0.5;
        }
        #uuid-wrapper {
            margin-left: auto;
            margin-right: auto;
            height: 100%;
            width: 90%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        @media (prefers-color-scheme: dark) {
            html,
            body {
                background: black;
                color: white;
            }
        }
        @media only screen and (max-width: 768px) {
            h1 {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
<div id="uuid-wrapper">
    <h1 onclick="navigator.clipboard.writeText('<?php echo $uuid; ?>');">
        <?php echo $uuid; ?>
    </h1>
</div>
</body>
</html>
