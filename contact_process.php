<?php
// Uncomment next line if you're not using a dependency loader (such as Composer)
require_once '/sendgrid-php-main/sendgrid-php.php';

use SendGrid\Mail\Mail;

$email = new Mail();
$email->setFrom("support@hash2day.com", "Example User");
$email->setSubject("Sending with Twilio SendGrid is Fun");
$email->addTo("support@hash2day.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('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'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}