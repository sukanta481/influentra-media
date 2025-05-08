<?php
// Automatically build base URL for both localhost and live
$host = $_SERVER['HTTP_HOST'];
$https = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";

// Manually set project folder (important for local)
$project_folder = 'finalinfluentra'; // set to '' if you're on root domain live

if ($host === 'localhost') {
    $base_url = "$https://$host/$project_folder";
} else {
    $base_url = "$https://$host"; // no folder on live
}
?>
