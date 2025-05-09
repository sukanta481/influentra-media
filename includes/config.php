<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$project_folder = 'finalinfluentra';

if ($host === 'localhost') {
    $base_url = "$protocol://$host/$project_folder";
} else {
    $base_url = "$protocol://$host";
}
?>
