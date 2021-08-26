<?php

require __DIR__ . '/vendor/autoload.php';

session_start();

$outputFile = __DIR__ . '/output/index.html';

try {
    $data = json_decode(file_get_contents(__DIR__ . '/input/listings.json'), true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    file_put_contents($outputFile, '500: error at parsing JSON - ' . $e->getMessage());
    echo('Problem with parsing JSON - ' . $e->getMessage() . PHP_EOL);

    return;
}

ob_start();
require 'src/index.phtml';
$html = ob_get_contents();
ob_clean();

file_put_contents(__DIR__ . '/output/index.html', $html);

echo('Generated into "output/", exiting successfully' . PHP_EOL);
