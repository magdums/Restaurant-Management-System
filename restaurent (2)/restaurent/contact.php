<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <div id="navbar-placeholder">

    </div>
    
    <script>
    $(function(){
      $("#navbar-placeholder").load("navbar.php");
    });
    </script>
    <section id="contact-info">
        <h2>Contact Us</h2>
        <p>We are just a contact form away!</p>
        <div class="form-container">
            <form class="form" action="" method="post">
        
                <div class="flex">
                    <label>
                        <input required="" placeholder="" type="text" class="input" name="firstName">
                        <span>first name</span>
                    </label>
            
                    <label>
                        <input required="" placeholder="" type="text" class="input" name="lastName">
                        <span>last name</span>
                    </label>
                </div>  
                        
                <label>
                    <input required="" placeholder="" type="email" class="input" name="email">
                    <span>email</span>
                </label> 
                    
                <label>
                    <input required="" type="tel" placeholder="" class="input" name="number">
                    <span>contact number</span>
                </label>
                <label>
                    <textarea required="" rows="3" placeholder="" class="input01" name="message"></textarea>
                    <span>message</span>
                </label>
                <label>
                    <input type="submit" name="send" value="send">
                </label>
       
            </form>
        </div>
    </section>
</body>
</html>

<?php

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
if(isset($_POST['send'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Load Composer's autoloader
require 'phpmailer\PHPMailer.php';
require 'phpmailer\SMTP.php';
require 'phpmailer\Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'patilprachi824@gmail.com';                     //SMTP username
    $mail->Password   = 'tmea bfwx upid ztcy';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('patilprachi824@gmail.com', 'contact form');
    $mail->addAddress('patilprachi824@gmail.com');     //Add a recipient
    

   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "sender name- $firstName <br> sender email-$email";
    
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
