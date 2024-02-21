<?php
include "config.php";
require 'vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function generateToken($length = 20) {
    return bin2hex(random_bytes($length));
}


function sendPasswordResetEmail($email, $token) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                 
        $mail->Username   = 'tsupperb@gmail.com';                   
        $mail->Password   = 'umcyfonirkspdbjg';                         
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;                                    

        
        $mail->setFrom('tsupperb@gmail.com', 'VGEC');
        $mail->addAddress($email);                                  

        $mail->isHTML(true);                                        
        $mail->Subject = 'Password Reset Request';
        $mail->Body    = 'Click the following link to reset your password: <a href="http://localhost/vgec-web/resetpassword.php?token=' . $token . '">Reset Password</a>';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    $token = generateToken();

    
    $expiry_time = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $sql = "INSERT INTO password_reset_tokens (email, token, expiry_time) VALUES ('$email', '$token', '$expiry_time')";
    $conn->query($sql);

   
    if (sendPasswordResetEmail($email, $token)) {
        echo "<script>alert('password reset link has been sent')</script>";
    } else {
        echo "Failed to send password reset email.";
        
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/Style.css" />
    <title>Document</title>
</head>
<body>
    <div class="login-container">
    <form class="form" action="" method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Submit</button>
    </form>
    </div>
</body>
</html>
