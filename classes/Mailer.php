<?php

class Mailer
{

    private static $enabled = TRUE;

    public static function sendMsg($values, $recipients = NULL)
    {
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 4;                               // Enable verbose debug output
        if (self::$enabled == TRUE) {
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = "user@gmail.com";                 // SMTP username
            $mail->Password = "password";                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->From = "user@gmail.com";
            $mail->FromName = 'Bettingexpert Mailer';
            //$mail->addAddress('user@email.com', 'Name');     // Add a recipient
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'New bettingexpert (' . $values[2] . ') ID: ' . $values[0];
            $mail->Body = self::mailBody($values);
            $mail->AltBody = 'Error: No non-HTML Body.';
            if (!$mail->send()) {
                echo 'Message could not be sent.<br>';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent<br>';
            }
        }
    }

    private static function mailBody($values)
    {
        $date1 = date("Y-m-d H:i:s", $values[12]);
        $dt_end = new DateTime($date1);
        $remain = $dt_end->diff(new DateTime());
        $timer = $remain->d . ' days, ' . $remain->h . ' hours, ' . $remain->i . ' minutes, ' . $remain->s . ' seconds';

        return '<b>Tipper:</b> ' . $values[2] . ' (' . $values[1] . ')<br/>
        <b>Match Title:</b> ' . $values[3] . ' <b>Country name:</b> ' . $values[8] . ' <b>League name:</b> ' . $values[9] . ' <br/>
        <b>Betting affiliate:</b> ' . $values[11] . ' <br/>
        <b>Stake:</b> ' . $values[6] . ' <b>Odds:</b> ' . $values[7] . ' <b>SelectionType:</b> ' . $values[5] . ' <b>BetType:</b> ' . $values[4] . ' <br/>
        <b>Kickoff time:</b> ' . date("Y-m-d H:i:s", $values[12]) . ' (GMT+2 Ljubljana - Time left: ' . $timer . ')<br/>
        <b>Full details:</b> <a target="_blank" href="' . $values[10] . '">' . $values[10] . '</a>';
    }
}
