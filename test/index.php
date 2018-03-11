<?php
require __DIR__ . '../vendor/autoload.php';

use Notification\Email;

$email = new Email('smtpDebug', 'host', 'username', 'password', 'smtpSecure', 'port', 'setFromEmail', 'setFromName');
$email->sendEmail('your address email', 'your replay address', 'your replay name', 'subject', 'body');


