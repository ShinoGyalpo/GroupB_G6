<?php
require_once('config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\autoload;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['pwdrst'])) {
    // Retrieve email address from form
    $email = $_POST['email'];

    // Check if email exists in the database
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        // Generate random password
        $password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);

        // Update user's password in database
        $sql = "UPDATE admin SET password = '$password' WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

          if($result) {
            // Create new PHPMailer object
            $mail = new PHPMailer;

            // Configure SMTP settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "amod.pradhan1122@gmail.com";
            $mail->Password = "flxxocsxbjgacodz";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            
            // Set email content
            $mail->setFrom("your_email@gmail.com", "Your Name");
            $mail->addAddress($email);
            $mail->Subject = "Password Reset";
            $mail->Body = "Your new password is: $password";

            if (!$mail->send()) {
                $msg = "Failed to send email: " . $mail->ErrorInfo;
            } else {
                $msg = "New Password has been sent to the email successfully";
                header('Location: login_forget.php');
            }
        }
    } else {
        $msg = "Email does not exist";
    }
}

// Close database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Forget Password|</title>
    <link rel="stylesheet" href="sign.css">


    <style>
        html, body{
            height:100%;
        }
        body{
            background-image:url('images/bgImage.png') !important;
            background-size:cover;
            background-repeat:no-repeat;
            background-position:center center;
        }
        h1#sys_title {
            font-size: 6em;
            text-shadow: 3px 3px 10px #000000;
        }
        @media (max-with:700px){
            h1#sys_title {
                font-size: inherit !important;
                
            }
        }
        .card.my-3.col-md-4.offset-md-4 {
                opacity: 1;
        }
        .cta {
  background: #f2f2f2;
  width: 100%;
  padding: 15px 40px;
  box-sizing: border-box;
  color: #666666;
  font-size: 12px;
  text-align: center;
}
    </style>
</head>

<body class="">
   <div class="h-100 d-flex jsutify-content-center align-items-center">
       <div class='w-100'>
        <!-- <h1 class="py-5 text-center text-light px-4" id="sys_title">Kathmandu Dental Hospital</h1> -->
        <div class="card my-3 col-md-4 offset-md-4">
            <div class="form-box9">
            <div class="signInlogo">
            <img src="images/DENTAL APPOINTMENT SYSTEM (1).png" alt="">
            </div>
            <h1 align="center" >Forgot Password</h1><br/>
                <form id="validate_form" method="post">  
                  <div class="input-group2">
                  <!-- <div class="input-field"> -->
                        <!-- <label for="email">Email Address</label> -->
                        <input type="text" name="email" id="email" placeholder="Enter your email address"  required 
                        data-parsley-type="email" data-parsley-trigger="keyup" class="form-control" style="margin-top: -16px;" />
                        <div class="error">
                            <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
                        </div>
                    <!-- </div> -->
                  </div>
                    <div class="btn-field2">
                        <button  type="submit" id="login" name="pwdrst" value="Continue" style="margin-top: -24px;">Continue</button> 
                    </div>
                </form>
            
              
            </div>
        </div>
       </div>
   </div>
</body>


