<?php

/*-----------------------------------------------------
// WARNING: this doesn't include sanitization
// and validation
//-----------------------------------------------------

if (isset($_POST['name'], $_POST['email'])) {
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);

	// show the $name and $email
	echo "Thanks $name for your subscription.<br>";
	echo "Please confirm it in your inbox of the email $email.";
} else {
	echo 'You need to provide your name and email address.';
}*/

if (filter_has_var(INPUT_POST,'name')&&filter_has_var(INPUT_POST,'email')) {
    echo 'Thanks '.htmlspecialchars($_POST['name']) .' for your subscription.<br>';
	echo "Please confirm it in your inbox of the email ".htmlspecialchars($_POST['email']);
} else {
    echo 'You need to provide your name and email address.';
}
