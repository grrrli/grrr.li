<?php require_once '../helpers.php';  ?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Clock'); ?>
    <link rel="stylesheet" href="/clock/clock.css">
</head>
<body>
    <div id="clock-wrapper">
        <h1 id="clock"></h1>
    </div>
    <script>
        const clockElement = document.getElementById('clock');
        let previousTime = null;

        updateClock();
        setInterval(updateClock, 100);

        function updateClock () {
            let time = getTime();
            if (time !== previousTime) {
                previousTime = time;
                clockElement.innerText = time;
                document.title = time;
            }
        }

        function getTime () {
            const now = new Date();
            return now.toLocaleTimeString();
        }
    </script>
</body>
</html>
