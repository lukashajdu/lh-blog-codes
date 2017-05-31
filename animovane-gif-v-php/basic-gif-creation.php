<?php

/**
 * GIF generation
 *
 * Example of a GIF image generation in PHP using ImageMagic library
 *
 * Run the script from the build in server:
 *
 * ```
 * php -S localhost:9999 basic-gif-creation.php
 * ```
 *
 * @author Lukas Hajdu <hello@lukashajdu.com>
 * @copyright Lukas Hajdu <http://lukashajdu.com>, 2017
 */

$gif = new Imagick();
$gif->setFormat('gif');

$primaryColor = new ImagickPixel('rgb(0, 255, 0)');
$secondaryColor = new ImagickPixel('rgb(255, 0, 0)');
$backgroundColor = new ImagickPixel('rgb(0, 0, 0)');
$transparentColor = new ImagickPixel('rgba(0, 0, 0, 0)');
$canvasSize = 200;

$draw = new ImagickDraw();

$draw->setFillColor($transparentColor);
$draw->setStrokeColor($primaryColor);
$draw->circle($canvasSize / 2, $canvasSize / 2, $canvasSize / 2, 0.9 * $canvasSize);

$draw->setStrokeColor($secondaryColor);
for ($angle = 0; $angle < 2 * M_PI; $angle += 0.349066) {
    $x = 0.4 * $canvasSize * cos($angle) + $canvasSize / 2;
    $y = 0.4 * $canvasSize * sin($angle) + $canvasSize / 2;
    $draw->line($canvasSize / 2, $canvasSize / 2, $x, $y);
}

$frame = new Imagick();
$frame->newImage($canvasSize, $canvasSize, $backgroundColor);
$frame->setImageFormat('gif');
$frame->drawImage($draw);

$gif->addImage($frame);

header('Content-Type: image/gif');
echo $gif->getImageBlob();
