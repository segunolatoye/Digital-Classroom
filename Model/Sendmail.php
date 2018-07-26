<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once "Dbconnection.php";
include_once "../vendor/autoload.php";
class Mail{

    public function sendmail($fromemail,$teacher_id)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password = '';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($fromemail);


            header('location:'.$_SERVER['HTTP_REFERER']);

            $mail->addReplyTo('example@gmail.com', 'Information');
            $mail->addCC('exaple@gmail.com');
            $mail->addBCC('bcc@example.com');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'ID';
            $mail->Body = 'your Id Is Here '.$teacher_id;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    //Send Old Password
    public function oldpass($fromemail,$pass)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->SMTPAuth = true;
            $mail->Username = 'ex@gmail.com';
            $mail->Password = 'ex';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($fromemail);


            header('location: ../oldpass.php?email=<?php echo $_SESSION[\'email\']?>');

            $mail->addReplyTo('ex@gmail.com', 'Information');
            $mail->addCC('ex@gmail.com');
            $mail->addBCC('bcc@example.com');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'PASSWORD';
            $mail->Body = 'your Id Is Here '.$pass;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}