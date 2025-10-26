<?php
// health.php - Simple health check endpoint
// health.php - This was actuall done because I was using render,
//              which sleeps after some while, so I was trying to
//                  make a route so I will be pinging to keep the 
//                  server active(still checking if it works though)
header('Content-Type: application/json');
http_response_code(200);

echo json_encode([
    'status' => 'healthy',
    'timestamp' => date('c'),
    'service' => 'Carteon'
]);
?>