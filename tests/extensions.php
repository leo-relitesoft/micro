<?php
$extensions = [
    'opcache',
    'mbstring',
    'intl',
    'dom',
    'ctype',
    'curl',
    'phar',
    'openssl',
    'xml',
    'xmlwriter',
    'simplexml',
    'pdo'
];

foreach ($extensions as $ext) {
    if (!extension_loaded($ext)) {
        echo $ext, PHP_EOL;
    }
}
