<?php
declare(strict_types=1);

header('Content-Type: application/json');
echo json_encode([
    'status' => 'ok',
    'message' => 'University Social Network API is running'
]);