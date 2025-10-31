<?php

echo "Downloading official Unicode emoji list...\n";

// Download emoji data from unicode-emoji-json (official Unicode data)
$url = 'https://unpkg.com/unicode-emoji-json/data-ordered-emoji.json';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
$data = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($data === false || $httpCode !== 200) {
    die("Error downloading emoji data (HTTP $httpCode): $error\n");
}

echo "Parsing emojis...\n";

// Parse JSON and extract emoji characters
$jsonData = json_decode($data, true);

if (!$jsonData) {
    die("Error parsing JSON data\n");
}

// Check if it's an array or object and extract emojis accordingly
if (array_keys($jsonData) === range(0, count($jsonData) - 1)) {
    // It's a numeric array, use values directly
    $emojis = $jsonData;
} else {
    // It's an associative array/object, use keys (the emoji characters)
    $emojis = array_keys($jsonData);
}

echo "Found " . count($emojis) . " emojis\n";

// Update index.php
echo "Updating index.php...\n";

$phpFile = __DIR__ . '/emojis/index.php';
$content = file_get_contents($phpFile);

// Create emoji array string
$emojiArray = '';
foreach ($emojis as $emoji) {
    $emojiArray .= "                '$emoji',\n";
}
$emojiArray = rtrim($emojiArray, ",\n"); // Remove last comma

// Replace the emoji array in the PHP file
$pattern = '/(const emojis = \[)([\s\S]*?)(\];)/';
$replacement = "$1\n$emojiArray\n            $3";
$content = preg_replace($pattern, $replacement, $content);

file_put_contents($phpFile, $content);

echo "Done! ✓\n";
echo "Total emojis: " . count($emojis) . "\n";

?>
