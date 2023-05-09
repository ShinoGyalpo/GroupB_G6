<?php
// Start a session
// session_start();

// Include the database connection file
require_once('config.php');
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\autoload;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Check if the appointment form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $Doctor_Name = mysqli_real_escape_string($conn, $_POST['Doctor_Name']);

    // Check if the selected date and time is available
    $check_query = "SELECT COUNT(*) AS count FROM appointment_form WHERE appointment_date = '$appointment_date'";
    $check_result = mysqli_query($conn, $check_query);
    $check_row = mysqli_fetch_assoc($check_result);
    if ($check_row['count'] > 0) {
        // If the selected date and time is not available, show an error message
        echo "<script>alert('Sorry for the inconvinence, but we are fully booked as of now. Please select another date and time.Thank you !!!'); window.location='welcome.php';</script>";
    } else {
        // Insert the form data into the appointment_form table
        $query = "INSERT INTO appointment_form (first_name, last_name, email, phone, appointment_date, Doctor_Name, Status) VALUES ('$first_name', '$last_name', '$email', '$phone', '$appointment_date', '$Doctor_Name', 'booked')";
        
        if (mysqli_query($conn, $query)) {
            // If the data is successfully inserted, show a success message
            echo "<script>alert('Appointment booked successfully!'); window.location='welcome.php';</script>";
        } else {
            // If there is an error in the query, show an error message
            echo "<script>alert('Error in booking appointment: " . mysqli_error($conn) . "'); window.location='welcome.php'; </script>";
        }
    }
     
    $to = $email;
        $subject = "Reminder: Your appointment with " . $first_name ;
        $message = "Hello " . $first_name . ",<br><br>This is a friendly reminder that you have an appointment scheduled with us tomorrow at " . $appointment_date . ". Please remember to arrive on time.<br><br>Best regards,<br> Admin<br><br>
        नमस्ते " . $first_name . ", यो एक मैत्रीपूर्ण रिमाइन्डर हो कि तपाइँले भोलि"  . $appointment_date . " मा हामीसँग भेट्ने समय तय गर्नुभएको छ।<br><br> समयमै आइपुग्न नभुल्नु होला।<br><br> हार्दिक बधाई,<br> प्रशासक";
    
        $headers = "From: amod.pradhan1122@gmail.com\r\n";
        $headers .= "Reply-To: amod.pradhan1122@gmail.com\r\n";

      // Send email using PHPMailer
      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'amod.pradhan1122@gmail.com';
      $mail->Password = 'flxxocsxbjgacodz';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;
      $mail->setFrom('amod.pradhan1122@gmail.com', 'Admin');
      $mail->addAddress($to);
      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = $message;

      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      }
  }





// if (isset($_POST['submit_m'])) {

//     // Retrieve email address from form
//     $first_name = $_POST['first_name'];
//     $email = $_POST['email'];
//     $appointment_date = $_POST['appointment_date'];

    // // Retrieve the relevant data from the database
    // $query = "SELECT * FROM appointment_form WHERE appointment_date = '$appointment_date'"; //+ INTERVAL 1 DAY";
    // $result = mysqli_query($conn, $query);
    // while ($row = mysqli_fetch_assoc($result)) {
//       $to = $email;
//       $subject = "Reminder: Your appointment with " . $first_name . " is on ". $appointment_date ;
//       $message = "Hello " . $first_name . ",\n\nThis is a friendly reminder that you have an appointment scheduled with us tomorrow at " . $appointment_date . ". Please remember to arrive on time.\n\nBest regards,\n Admin";
//       $headers = "From: amod.pradhan1122@gmail.com\r\n";
//       $headers .= "Reply-To: amod.pradhan1122@gmail.com\r\n";

//       // Send email using PHPMailer
//       $mail = new PHPMailer;
//       $mail->isSMTP();
//       $mail->Host = 'smtp.gmail.com';
//       $mail->SMTPAuth = true;
//       $mail->Username = 'amod.pradhan1122@gmail.com';
//       $mail->Password = 'flxxocsxbjgacodz';
//       $mail->SMTPSecure = 'tls';
//       $mail->Port = 587;
//       $mail->setFrom('amod.pradhan1122@gmail.com', 'Admin');
//       $mail->addAddress($to);
//       $mail->isHTML(true);
//       $mail->Subject = $subject;
//       $mail->Body = $message;

//       if(!$mail->send()) {
//           echo 'Message could not be sent.';
//           echo 'Mailer Error: ' . $mail->ErrorInfo;
//       }
//   }

  //Close the database connection
  mysqli_close($conn);
?>
