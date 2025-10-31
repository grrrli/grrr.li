<?php require_once '../helpers.php';  ?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Clock'); ?>
    <link rel="stylesheet" href="/clock/clock.css">
</head>
<body class="tool">
    <div class="tool-wrapper">
        <h1 id="clock" onclick="copyTime()" style="cursor: pointer;"></h1>
        <div style="margin: 20px 0;">
            <button class="icon-button" onclick="copyTime()" aria-label="Copy">⎘</button>
        </div>
    </div>

    <script src="/assets/utils.js"></script>
    <?php
    if (!empty($_GET['format'])) {
        ?><script type="text/javascript" src="moment.js"></script><?php
    }
    ?>

    <script>
        const queryParams = new URLSearchParams(window.location.search);
        const format = queryParams.get('format') || null;

        const clockElement = document.getElementById('clock');
        let previousTime = null;

        updateClock();
        setInterval(updateClock, 100);

        console.group('URL parameters');
        console.group('optional');
        console.group('format');
        console.log('description: Moment.js format');
        console.log('default: Date().toLocaleTimeString()');
        console.log('example: ?format=YYYY-MM-DD');
        console.groupEnd();
        console.groupEnd();
        console.groupEnd();

        function updateClock () {
            let time = getTime();
            if (time !== previousTime) {
                previousTime = time;
                clockElement.innerText = time;
                document.title = time;
            }
        }

        function getTime () {
            if (format) {
                return moment().format(format);
            } else {
                const now = new Date();
                return now.toLocaleTimeString();
            }
        }

        function copyTime() {
            const time = document.getElementById('clock').innerText;
            copyToClipboard(time);
        }
    </script>
</body>
</html>
