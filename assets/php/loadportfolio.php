<?php
// Load JSON data
$json_file = 'assets/data/portfolio.json';
$json_data = file_get_contents($json_file);
// Decode JSON into PHP array
$portfolioItems = json_decode($json_data, true);

// Extract categories
$categories = array_unique(array_column($portfolioItems, 'category'));