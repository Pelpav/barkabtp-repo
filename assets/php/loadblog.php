<?php
// Load JSON data
$json_file = 'assets/data/blog.json';
$json_data = file_get_contents($json_file);
// Decode JSON into PHP array
$blogItems = json_decode($json_data, true);