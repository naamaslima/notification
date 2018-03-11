<?php
require __DIR__ . '/vendor/autoload.php';

use Notification\Email;

$email = new Email;
$email->sendEmail("naama32@hotmail.com", "contato@ndevtecnologia.com.br", "ndev", "assunto", "This is the HTML message body <b>in bold!</b>");


