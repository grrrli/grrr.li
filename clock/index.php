<?php require_once '../helpers.php';  ?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Clock'); ?>
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
            font-size: 8em;
            margin: 15px;
        }
        #clock-wrapper {
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
                font-size: 4em;
            }
        }
    </style>
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
