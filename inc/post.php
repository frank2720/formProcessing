<?php

const NAME_REQUIRED = 'Please enter your name';
const EMAIL_REQUIRED = 'Please enter your email';
const EMAIL_INVALID = 'Please enter a valid email';

$token = htmlspecialchars($_POST['token']);

if (!$token || $token !== $_SESSION['token']) {
    // show an error message
    echo '<p class="error">Error: invalid form submission</p>';
    // return 405 http status code
    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
    exit;
}

// sanitize and validate name
$name = htmlspecialchars($_POST['name']);
$inputs['name'] = $name;

if ($name) {
    $name = trim($name);
    if ($name === '') {
        $errors['name'] = NAME_REQUIRED;
    }
} else {
    $errors['name'] = NAME_REQUIRED;
}


// sanitize & validate email
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
if ($email) {
    // validate email
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        $errors['email'] = EMAIL_INVALID;
    }
} else {
    $errors['email'] = EMAIL_REQUIRED;
}

// sanitize the contact
$contact = filter_input(INPUT_POST, 'contact');

// check the selected value against the original values
if ($contact && array_key_exists($contact, $contacts)) {
	$contact = htmlspecialchars($contact);
} else {
	$errors['contact'] = 'Please select at least an option.';
}

?>

<?php if (count($errors) === 0) : ?>
    <section>
        <?php flash('greeting') ?>
        <p>Please follow the steps below to complete your subscription:</p>
        <ol>
            <li>Check your email (<?php echo htmlspecialchars($email) ?>) - Find the message sent from webmaster@phptutorial.net</li>
            <li>Click to confirm - Click on the link in the email to confirm your subscription.</li>
        </ol>
    </section>

    <?php echo <<<html
	You selected to be contacted via <strong> $contact</strong>.
	<a href="index.php">Back to the form</a>
	html; ?>

<?php endif ?>