<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Use environment variables or configuration files for sensitive data
  $receiving_email_address = getenv('RECEIVING_EMAIL_ADDRESS');

  if (!$receiving_email_address) {
    die('Receiving email address is not set.');
  }

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  // Validate and sanitize POST inputs
  $contact->from_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $contact->from_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $contact->subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);

  if (!$contact->from_email) {
    die('Invalid email address.');
  }

  $contact->to = $receiving_email_address;

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => getenv('SMTP_USERNAME'),
    'password' => getenv('SMTP_PASSWORD'),
    'port' => '587'
  );

  if (!$contact->smtp['username'] || !$contact->smtp['password']) {
    die('SMTP credentials are not set.');
  }

  $contact->add_message($contact->from_name, 'From');
  $contact->add_message($contact->from_email, 'Email');
  $contact->add_message(filter_var($_POST['message'], FILTER_SANITIZE_STRING), 'Message', 10);

  echo $contact->send();
?>