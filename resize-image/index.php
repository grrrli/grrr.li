<?php

require_once '../helpers.php';

function resizeImage(
        string $originalImage,
        int $targetWidth,
        int $targetHeight,
        int $quality,
        string $outputFormat
): string {
    $info = getimagesize($originalImage);
    $mime = $info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($originalImage);
            break;
        case 'image/png':
            $image = imagecreatefrompng($originalImage);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($originalImage);
            break;
        default:
            echo 'Unsupported image format';
            exit;
    }

    list($width, $height) = getimagesize($originalImage);
    $ratio = $width / $height;

    if ($targetWidth / $targetHeight > $ratio) {
        $targetWidth = round($targetHeight * $ratio);
    } else {
        $targetHeight = round($targetWidth / $ratio);
    }

    $newImage = imagecreatetruecolor($targetWidth, $targetHeight);

    if ($mime == 'image/png') {
        imagecolortransparent($newImage, imagecolorallocatealpha($newImage, 0, 0, 0, 127));
        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);
    }

    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

    $savePath = $originalImage . '_resized.' . $outputFormat;

    switch ($outputFormat) {
        case 'jpeg':
        case 'jpg':
            imagejpeg($newImage, $savePath, $quality);
            break;
        case 'png':
            imagepng($newImage, $savePath, round($quality / 10));
            break;
        case 'gif':
            imagegif($newImage, $savePath);
            break;
    }

    imagedestroy($image);
    imagedestroy($newImage);

    return $savePath;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $targetDir = 'tmp/';
    $originalFile = $_FILES['image']['tmp_name'];
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    $check = getimagesize($originalFile);
    if ($check === false) {
        echo 'Invalid image';
        exit;
    }

    $tempFile = tempnam($targetDir, 'upload_');
    if (!move_uploaded_file($originalFile, $tempFile)) {
        echo 'Unable to upload file';
        exit;
    }

    $width = intval($_POST['width']);
    $height = intval($_POST['height']);
    $quality = intval($_POST['quality']);
    $outputFormat = $imageFileType === 'jpg' ? 'jpeg' : $imageFileType;
    $resizedImagePath = resizeImage($tempFile, $width, $height, $quality, $outputFormat);

    $contentType = 'image/jpeg';
    switch ($outputFormat) {
        case 'png':
            $contentType = 'image/png';
            break;
        case 'gif':
            $contentType = 'image/gif';
            break;
    }

    header('Content-Description: File Transfer');
    header('Content-Type: ' . $contentType);
    header('Content-Disposition: attachment; filename="' . basename($resizedImagePath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($resizedImagePath));

    readfile($resizedImagePath);

    unlink($originalFile);
    unlink($tempFile);
    unlink($resizedImagePath);
    exit;
}

setHeaders();
?><!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Resize image'); ?>
    <link rel="stylesheet" href="/resize-image/resize-image.css">
</head>
<body>
<div id="resize-image-wrapper">
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Image:</label>
            <input
                    type="file"
                    id="image"
                    name="image"
                    required
            >
        </div>
        <div class="form-group">
            <label for="width">Width (px):</label>
            <input
                    type="number"
                    id="width"
                    name="width"
                    value="1000"
                    required
            >
        </div>
        <div class="form-group">
            <label for="height">Height (px):</label>
            <input
                    type="number"
                    id="height"
                    name="height"
                    value="500"
                    required
            >
        </div>
        <div class="form-group">
            <label for="quality">Quality (1-100):</label>
            <input
                    type="number"
                    id="quality"
                    name="quality"
                    value="80"
                    required
            >
        </div>
        <br>
        <input
                type="submit"
                class="button"
                value="Download resized image"
        >
    </form>
</div>
</body>
</html>
