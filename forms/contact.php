<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'mosesnuggz@gmail.com';

// Including the PHP Email Form library directly
include('../assets/vendor/php-email-form/php-email-form.php');

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
$contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
);
*/

// Customize error messages (optional)
$contact->invalid_to_email = 'Email to (receiving email address) is empty or invalid!';
$contact->invalid_from_name = 'From Name is empty!';
$contact->invalid_from_email = 'Email from: is empty or invalid!';
$contact->invalid_subject = 'Subject is too short or empty!';
$contact->short = 'is too short or empty!';
$contact->ajax_error = 'Sorry, the request should be an Ajax POST';

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>
