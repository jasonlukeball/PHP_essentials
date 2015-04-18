<?php


// The most important fact about HTTP Headers is that the come back BEFORE ALL OTHER DATA
// They are required by the HTTP standard to preceded any further communication back and forth
// Any changes you want to make to the header must be done before any other output for the file


header("HTTP 1.1/ 404 Not Found");

echo "<pre>";
print_r(headers_list());
echo "</pre>";


// Headers are important in page redirection
// In HTTP we can redirect the browser to a new URL using a 302 "Redirect"

// 302 Redirects have two parts 1. A Status Code 2. A location (path) the the file we want to redirect to