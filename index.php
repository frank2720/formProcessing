<?php
session_start();
require __DIR__  . '/inc/flash.php';
require __DIR__ . '/inc/header.php';

$errors = [];
$inputs = [];
$contacts = [
	'email' => 'Email',
	'phone' => 'Phone'
];

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

flash('greeting', "Hello, Thanks for your subscription!", FLASH_SUCCESS);

if ($request_method === 'GET') {
    // generate a token
	$_SESSION['token'] = bin2hex(random_bytes(35));
    // show the form
    require __DIR__ . '/inc/get.php';
}elseif ($request_method === 'POST') {
    // handle the form submission
    require    __DIR__ .  '/inc/post.php';
    // show the form if the error exists
    if (count($errors) > 0) {
        require __DIR__ . '/inc/get.php';
    }
}

require __DIR__ .  '/inc/footer.php';
