<?php

$projectRoot = dirname(__DIR__);
chdir($projectRoot);

$artisan = escapeshellarg($projectRoot . '/artisan');
$php = escapeshellarg(PHP_BINARY);

foreach (['migrate --force', 'db:seed --force'] as $command) {
    passthru("$php $artisan $command", $exitCode);

    if ($exitCode !== 0) {
        exit($exitCode);
    }
}
