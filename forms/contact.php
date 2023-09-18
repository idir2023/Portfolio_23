<?php
include 'PHP_Email_Form.php'; // Include the PHP_Email_Form library

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'contact@example.com';

// Check if the PHP_Email_Form library exists
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form); // Include the PHP_Email_Form library
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form(); // Create a new instance of PHP_Email_Form
$contact->ajax = true; // Enable AJAX support

$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : ''; // Get 'name' from POST data or set to an empty string
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : ''; // Get 'email' from POST data or set to an empty string
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : ''; // Get 'subject' from POST data or set to an empty string

// $contact->smtp = array(
//     'host' => 'lahcenidir700@gmail.com',
//     'username' => 'lahcenidir',
//     'password' => '',
//     'port' => '587'
//     );
    

if (isset($_POST['message'])) {
    $contact->add_message($_POST['message'], 'Message', 10); // Add 'message' to the email body
}

echo $contact->send(); // Send the email and output the result
?>


