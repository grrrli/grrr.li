<?php require_once '../helpers.php';  ?>

<?php setHeaders(false); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Lorem ipsum'); ?>
    <link rel="stylesheet" href="/lorem-ipsum/lorem-ipsum.css">
</head>
<body class="tool">
<?php
$loremIpsumParagraphs = [
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.",
    "Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "Curabitur aliquet risus ut suscipit posuere. Nulla facilisi. Integer malesuada nulla et lorem blandit bibendum. Ut id sapien convallis, vulputate dui nec, lobortis nulla.",
    "Phasellus feugiat magna nec nisl tempor, id sodales sapien convallis. Cras ac augue et nisi commodo cursus. Nulla convallis risus ac purus aliquam, vel vehicula velit vulputate. Aliquam erat volutpat.",
    "Nam tempus, arcu at convallis lacinia, justo ipsum facilisis sapien, ac dictum risus ipsum in libero. Sed vehicula magna sed orci dapibus, nec varius purus facilisis. Vivamus at quam orci. Curabitur sit amet arcu orci. Nam vitae metus ullamcorper, auctor nunc sit amet, vestibulum erat. Ut tempus libero ut libero cursus dapibus.",
    "Fusce viverra metus sit amet nulla euismod facilisis. Donec consectetur urna vel nulla volutpat, non aliquet magna sagittis. Praesent vehicula libero a arcu interdum, in fermentum turpis tincidunt. Nulla facilisi. Nam tincidunt auctor libero, sed facilisis risus. Etiam ac vehicula lorem.",
    "Donec convallis, nisi a hendrerit egestas, neque quam ullamcorper dui, vel fringilla nulla urna non quam. Nulla in purus sapien. Sed tincidunt nisl vel turpis ultrices, non posuere est lobortis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor orci non lorem blandit, a cursus sapien lacinia.",
    "Integer vel orci quis nisl tincidunt volutpat. Aliquam erat volutpat. In tincidunt orci eu nulla pharetra, sed lobortis erat tincidunt. Donec pharetra turpis in magna accumsan, ac malesuada dui venenatis.",
    "Praesent a malesuada erat. Fusce a justo at urna suscipit suscipit. Etiam in dui suscipit, dictum sapien et, tristique leo. Integer porta felis non quam tincidunt malesuada. Donec eget urna nec velit ullamcorper aliquam. Quisque dignissim odio a orci auctor, id facilisis dolor blandit.",
    "Sed sed nulla consequat, auctor sapien sit amet, condimentum purus. Nam tempus, arcu at convallis lacinia, justo ipsum facilisis sapien, ac dictum risus ipsum in libero. Sed vehicula magna sed orci dapibus, nec varius purus facilisis. Vivamus at quam orci. Curabitur sit amet arcu orci. Nam vitae metus ullamcorper, auctor nunc sit amet, vestibulum erat.",
    "Vestibulum sit amet bibendum lectus, vel pulvinar eros. Integer a suscipit urna. Nulla facilisi. Mauris posuere sapien sit amet eros auctor, ac dignissim lorem tristique.",
    "Nunc dictum nunc id sem tincidunt, non tempor justo eleifend. Sed convallis quam vel felis malesuada, sit amet condimentum libero consectetur. Mauris viverra lacus ac mauris hendrerit, vel iaculis odio gravida. Nulla facilisi. Ut aliquet diam sit amet nunc tristique, id vehicula sapien ultricies.",
    "Aliquam erat volutpat. Curabitur ac venenatis libero. Ut convallis sem nec magna tincidunt, sit amet posuere mauris aliquet. Etiam vitae nunc et libero aliquam gravida in in mauris. Fusce tempor lacus eget dui fringilla, ac egestas lacus viverra. Phasellus vestibulum urna vel libero dapibus, non ullamcorper magna auctor.",
    "Vivamus varius, ex eget sodales gravida, arcu nisi euismod sapien, id viverra justo lectus at est. Donec tempor purus ut tellus hendrerit feugiat. Etiam vestibulum nisl non est laoreet, in scelerisque elit tincidunt. Sed et dui at risus tempor malesuada id nec orci. Integer ultricies, lectus non ultricies facilisis, odio ipsum lobortis elit, vel aliquet nunc odio a erat. Nulla facilisi. Integer et lacinia turpis. Curabitur id lacus sed turpis vestibulum ultricies at non turpis.",
    "Cras vitae velit dictum, tristique est a, feugiat felis. Suspendisse tincidunt nisl eget tortor convallis, id vehicula lorem lacinia. Aenean ac neque at risus fermentum varius. Integer vel orci quis nisl tincidunt volutpat. Aliquam erat volutpat. In tincidunt orci eu nulla pharetra, sed lobortis erat tincidunt. Sed auctor, arcu non luctus cursus, est eros convallis arcu, id pharetra justo risus ut quam.",
    "Suspendisse potenti. Phasellus sit amet tristique eros. Vestibulum rutrum ante ut urna finibus, vel laoreet nunc posuere. Curabitur dictum dui id neque hendrerit suscipit. Donec auctor risus id turpis gravida, a sagittis leo ultricies. Donec pharetra turpis in magna accumsan, ac malesuada dui venenatis.",
    "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque malesuada eros et arcu placerat, sit amet porttitor odio consectetur. Cras vulputate purus nec nunc efficitur, eget ultrices nisi suscipit. Aenean quis justo non velit viverra egestas sed id dolor.",
    "In hac habitasse platea dictumst. Nam accumsan libero nec libero dignissim, vel bibendum urna posuere. Nam id lectus ac turpis eleifend aliquet. Sed quis lacus sed ligula condimentum volutpat. In hac habitasse platea dictumst. Nulla sed augue ac orci convallis viverra at id velit.",
    "Curabitur aliquet risus ut suscipit posuere. Nulla facilisi. Integer malesuada nulla et lorem blandit bibendum. Ut id sapien convallis, vulputate dui nec, lobortis nulla. Cras ut felis tincidunt, scelerisque leo sit amet, convallis dolor.",
    "Nulla sed augue ac orci convallis viverra at id velit. Integer tincidunt, dolor non egestas efficitur, ipsum libero lacinia ligula, in vehicula urna sapien non mauris. Vivamus euismod nisi ut dolor sollicitudin, ac bibendum nunc lobortis. Ut at sapien sapien. Nam vitae metus ullamcorper, auctor nunc sit amet, vestibulum erat.",
    "Donec convallis, nisi a hendrerit egestas, neque quam ullamcorper dui, vel fringilla nulla urna non quam. Nulla in purus sapien. Sed tincidunt nisl vel turpis ultrices, non posuere est lobortis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor orci non lorem blandit, a cursus sapien lacinia.",
    "Nam tempus, arcu at convallis lacinia, justo ipsum facilisis sapien, ac dictum risus ipsum in libero. Sed vehicula magna sed orci dapibus, nec varius purus facilisis. Vivamus at quam orci. Curabitur sit amet arcu orci. Nam vitae metus ullamcorper, auctor nunc sit amet, vestibulum erat. Ut tempus libero ut libero cursus dapibus.",
    "Fusce viverra metus sit amet nulla euismod facilisis. Donec consectetur urna vel nulla volutpat, non aliquet magna sagittis. Praesent vehicula libero a arcu interdum, in fermentum turpis tincidunt. Nulla facilisi. Nam tincidunt auctor libero, sed facilisis risus. Etiam ac vehicula lorem.",
    "Curabitur aliquet risus ut suscipit posuere. Nulla facilisi. Integer malesuada nulla et lorem blandit bibendum. Ut id sapien convallis, vulputate dui nec, lobortis nulla. Cras ut felis tincidunt, scelerisque leo sit amet, convallis dolor.",
    "Proin ut enim nec mi feugiat lacinia. Vivamus dictum ipsum vel arcu varius, ac tincidunt dui pretium. Vivamus varius, ex eget sodales gravida, arcu nisi euismod sapien, id viverra justo lectus at est. Donec tempor purus ut tellus hendrerit feugiat. Etiam vestibulum nisl non est laoreet, in scelerisque elit tincidunt. Sed et dui at risus tempor malesuada id nec orci. Integer ultricies, lectus non ultricies facilisis, odio ipsum lobortis elit, vel aliquet nunc odio a erat. Nulla facilisi. Integer et lacinia turpis. Curabitur id lacus sed turpis vestibulum ultricies at non turpis."
];
$randomParagraphs = array_rand($loremIpsumParagraphs, 3);
?>
<div class="tool-wrapper" id="lorem-ipsum-wrapper">
    <?php foreach ($randomParagraphs as $paragraph): ?>
        <p onclick="navigator.clipboard.writeText('<?php echo $loremIpsumParagraphs[$paragraph]; ?>');">
            <?php echo $loremIpsumParagraphs[$paragraph]; ?>
        </p>
    <?php endforeach; ?>
</div>
<script>
    document.body.onkeyup = function(e) {
        if (
            e.key === ' '
            ||
            e.code === 'Space'
            ||
            e.keyCode === 32
        ) {
            location.reload();
        }
    }
</script>
</body>
</html>
