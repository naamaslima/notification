<?php
namespace Notification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $mail = \stdClass::class;
    
    function __construct($smtpDebug, $host, $username, $password, $smtpSecure, $port, $setFromEmail, $setFromName)
    {
        $this->mail = new PHPMailer(true); 
        $this->mail->SMTPDebug = $smtpDebug;    // Enable verbose debug output 
        $this->mail->isSMTP();                  // Set mailer to use SMTP
        $this->mail->Host = $host;              // Specify main and backup SMTP servers. Ex: 'mail.ndevtecnologia.com.br;'
        $this->mail->SMTPAuth = true;           // Enable SMTP authentication
        $this->mail->Username = $username ;     // SMTP username. Ex: 'suporte@ndevtecnologia.com.br'
        $this->mail->Password = $password;      // SMTP password
        $this->mail->SMTPSecure = 'tls';        // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = $port;              // TCP port to connect 
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom( $setFromEmail, $setFromName);
    }
    public function sendEmail($address, $replayAddress, $replayName, $subject, $body)
    {
        $this->mail->addAddress($address);               // Name is optional
        $this->mail->addReplyTo($replayAddress, $replayName);

        $this->mail->isHTML(true);                                  // Set email format to HTML
        $this->mail->Subject = $subject;
        $this->mail->Body    = $body;
        
        try {
            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: '. $this->mail->ErrorInfo;
        }
    }
    
}

?>