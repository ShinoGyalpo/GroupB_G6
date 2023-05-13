<?php
// Start a session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
require_once('config.php');

// Check if the appointment form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $Preferred_doctor = mysqli_real_escape_string($conn, $_POST['Preferred_doctor']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);

    // Check if the selected date and time is available
    $check_query = "SELECT COUNT(*) AS count FROM appointment_form  WHERE appointment_date = '$appointment_date'";
    $check_result = mysqli_query($conn, $check_query);
    if ($check_result) {
        $check_row = mysqli_fetch_assoc($check_result);
        if ($check_row['count'] > 0) {
            // If the selected date and time is not available, show an error message
            echo "<script>alert('Sorry, the appointment slot you selected is already booked. Please select another date and time.');</script>";
        } else {
            // Insert the form data into the appointment_form table
            $query = "INSERT INTO appointment_form (first_name, last_name, email, phone, Preferred_doctor, appointment_date, status) VALUES ('$first_name', '$last_name', '$email', '$phone','$Preferred_doctor', '$appointment_date', 'booked')";
            
            if (mysqli_query($conn, $query)) {
                // If the data is successfully inserted, show a success message
                echo "<script>alert('Appointment booked successfully!');</script>";
                // Save the appointment ID in the session variable for future use
                $_SESSION['appointment_id'] = mysqli_insert_id($conn);
            } else {
                // If there is an error in the query, show an error message
                echo "<script>alert('Error in booking appointment: " . mysqli_error($conn) . "');</script>";
            }
        }
    } else {
        // If there is an error in the query, show an error message
        echo "<script>alert('Error in checking availability: " . mysqli_error($conn) . "');</script>";
    }
}

// Check if the cancel form is submitted
if (isset($_POST['cancel'])) {
    // Update the status of the appointment to "canceled"
    $appointment_id = mysqli_real_escape_string($conn, $_POST['appointment_id']);
    $update_query = "UPDATE admin SET status='canceled' WHERE appointment_id='$appointment_id'";
    if (mysqli_query($conn, $update_query)) {
        // If the status is successfully updated, show a success message
        echo "<script>alert('Appointment canceled successfully!');</script>";
    } else {
        // If there is an error in the query, show an error message
        echo "<script>alert('Error in canceling appointment: " . mysqli_error($conn) . "');</script>";
    }
}


// Check if an appointment ID is set in the session variable
if (isset($_SESSION['appointment_id'])) {
    $appointment_id = mysqli_real_escape_string($conn, $_SESSION['appointment_id']);
    // Retrieve appointment details from the database
    $appointment_query = "SELECT * FROM appointment_form WHERE appointment_id='$appointment_id'";
    $appointment_result = mysqli_query($conn, $appointment_query);
    if (!$appointment_result) {
        // If there is an error in the query, show the error message and exit the script
        echo "Error: " . mysqli_error($conn);
        exit();
    }
    $appointment_row = mysqli_fetch_assoc($appointment_result);
    // If the appointment is not found in the database, show an error message
    if (!$appointment_row) {
        echo "Error: Appointment not found.";
    } else {
        
         // Generate invoice HTML
         $invoice_html = "<html><head><style>table {border-collapse: collapse; width: 80%; margin: 0 auto; font-family: Arial, sans-serif; color: #333;} th, td {text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style></head><body>";
         $invoice_html .="<div class='content'>";
         $invoice_html .= "<img src='images/logo.png' alt='Hospital Logo' style='display: block; margin: 0 auto;'>";
         $invoice_html .= "<h3 style='text-align: center;'>Kathmandu Dental</h3>";
         $invoice_html .= "<h2 style='text-align: center;'>Appointment Invoice</h2>";
         $invoice_html .= "<table>";
         $invoice_html .= "<tr><th>Appointment ID:</th><td>".$appointment_row['appointment_id']."</td></tr>";
         $invoice_html .= "<tr><th>First Name:</th><td>".$appointment_row['first_name']."</td></tr>";
         $invoice_html .= "<tr><th>Last Name:</th><td>".$appointment_row['last_name']."</td></tr>";
         $invoice_html .= "<tr><th>Email:</th><td>".$appointment_row['email']."</td></tr>";
         $invoice_html .= "<tr><th>Phone:</th><td>".$appointment_row['phone']."</td></tr>";
         $invoice_html .= "<tr><th>Preferred Doctor:</th><td>".$appointment_row['Preferred_doctor']."</td></tr>";
         $invoice_html .= "<tr><th>Appointment Date:</th><td>".$appointment_row['appointment_date']."</td></tr>";
         $invoice_html .= "</table>";
         $invoice_html .= "<div style='text-align:center; margin-top:20px;'>";
         $invoice_html .= "<form method='post' action='reschedule.php'>";
         $invoice_html .= "<input type='hidden' name='appointment_id' value='".$appointment_row['appointment_id']."'>";
         $invoice_html .= "<br>";
         $invoice_html .= "<label for='new_date'>Reschedule Appointment:</label>";
         $invoice_html .= "<input type='date' id='new_date' name='new_date' required>";
         $invoice_html .= "<br>";
         $invoice_html .= "<br>";
         $invoice_html .= "<button type='submit' style='background-color: #4CAF50; width:200px; color: white; font-size: 16px; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer;'>Reschedule</button>";
         $invoice_html .= "</form>";
         $invoice_html .= "<form method='post' action='cancel.php'>";
         $invoice_html .= "<input type='hidden' name='appointment_id' value='".$appointment_row['appointment_id']."'>";
        
         $invoice_html .= "<button type='submit' style='background-color: #f44336; color: white; width:200px;  font-size: 16px; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px;'>Cancel Appointment</button>";
         $invoice_html .= "</form>";
         $invoice_html .= "</div></div></body></html>";
         
         
        
        // Output the invoice HTML
        echo $invoice_html;
    }
} else {
    echo "Error: Appointment ID not set in session.";
} 
?>

