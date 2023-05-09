<?php
// Start a session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
require_once('config.php');

// Check if the form has been submitted
if(isset($_POST['search'])) {
    // Get the appointment ID from the form data
    
    $appointment_id = mysqli_real_escape_string($conn, $_POST['appointment_id']);
    
    // perform a database query to fetch the appointment data
    $query = "SELECT * FROM appointment_form WHERE appointment_id = '$appointment_id'";
    $result = mysqli_query($conn, $query);
    
    
    // Check if the query returned any results
    if(mysqli_num_rows($result) > 0) {
        // If yes, display the appointment data in a printable format
        $appointment_row = mysqli_fetch_assoc($result);
        $invoice_html = "<html><head><style>table {border-collapse: collapse; width: 80%; margin: 0 auto; font-family: Poppins, sans-serif; color: #333;} th, td {text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style></head><body>";
        $invoice_html .= "<h2 style='text-align: center;'>Appointment Details</h2>";
        $invoice_html .= "<img src='images/logo.png' alt='Hospital Logo' style='display: block; margin: 0 auto;'>";
        $invoice_html .= "<h3 style='text-align: center;'>Kathmandu Dental</h3>";
        $invoice_html .= "<table>";
        $invoice_html .= "<tr><th>Appointment ID:</th><td>".$appointment_row['appointment_id']."</td></tr>";
        $invoice_html .= "<tr><th>First Name:</th><td>".$appointment_row['first_name']."</td></tr>";
        $invoice_html .= "<tr><th>Last Name:</th><td>".$appointment_row['last_name']."</td></tr>";
        $invoice_html .= "<tr><th>Email:</th><td>".$appointment_row['email']."</td></tr>";
        $invoice_html .= "<tr><th>Phone:</th><td>".$appointment_row['phone']."</td></tr>";
        $invoice_html .= "<tr><th>Preferred Doctor:</th><td>".$appointment_row['Preferred_doctor']."</td></tr>";
        $invoice_html .= "<tr><th>Symptoms:</th><td>".$appointment_row['Symptoms']."</td></tr>";
        $invoice_html .= "<tr><th>Tooth(Injured):</th><td>".$appointment_row['Tooth(Injured)']."</td></tr>";
        $invoice_html .= "<tr><th>Diagnosis Report:</th><td>".$appointment_row['Diagnosis Report']."</td></tr>";
        $invoice_html .= "<tr><th>Doctor Assigned:</th><td>".$appointment_row['Doctor Assigned']."</td></tr>";
        $invoice_html .= "<tr><th>Payment Status</th>:</th><td>".$appointment_row['Payment Status']."</td></tr>";
        $invoice_html .= "<tr><th>Fee:</th><td>".$appointment_row['Fee']."</td></tr>";
       
        $invoice_html .= "</table>";
        $invoice_html .= "</body></html>";
        echo $invoice_html;
    } else {
        // If no, display an error message
        echo "No appointment found with ID: " . $appointment_id;
    }
}
?>