<?php
    include("../php/session.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <?php include('../templates/head.php'); ?>
    </head>
    <body>
        <?php include('../templates/google.php'); ?>
        <?php include('../templates/navbar.php'); ?>
        <div class="section-ring min-full-height">
            <div id="contact-top-text">Talk to us<div id="registry-divider">&nbsp;</div></div>
            <div id="contact-lower-top-text">Still have questions? Send us a message below.</div>
            <div id="form-container">
                <?php if ($_SERVER['REQUEST_METHOD'] === "POST") {
                        include('../php/credentials.php');
                        require('../php/PHPMailerAutoload.php');
                        require('../php/class.phpmailer.php');
                        require('../php/class.smtp.php');

                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];

                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = 'tls';
                        $mail->Host = "smtp.zoho.com";
                        $mail->Port = 587;
                        $mail->IsHTML(true);
                        $mail->Username = $EMAIL_USER;
                        $mail->Password = $EMAIL_PASS;
                        $mail->SetFrom($EMAIL_USER, "KFSquared.com");
                        $mail->Subject = "Someone sent you a message from KFSquared.com";
                        $mail->Body = 'From: ' . $name . "<br>" . 'Email: ' . $email . "<br>" . 'Message: ' . "<br>" . nl2br($message);
                        $mail->AddAddress($KATHRYN_EMAIL);
                        $mail->AddAddress($KYLE_EMAIL);
                        
                        if(!$mail->Send()) {
                            echo "We're sorry, your message couldn't be sent. Please <a href=\"/contact\">go back</a> and try again.<br><br>If this error continues, check back later to see if the issue has been resolved.";
                        } else {
                            echo "We've got your message!<br>We will email you back as soon as we can.";
                        }
                    } else {
                        echo '<form name="contact-form" id="contact-form" method="POST">
                                <center>
                                    <p><input id="name" type="text" placeholder="Name" name="name" required></p>
                                    <p><input id="email" type="text" placeholder="Email" name="email" required></p>
                                    <p><textarea id="message" name="message" placeholder="Message" required></textarea></p>
                                    <input id="submitButton" type="submit" value="Send message">
                                <center>
                            </form>';
                    }
            ?>
            </div>
        </div>
        <script src="/js/main.js"></script>
    </body>
</html>
