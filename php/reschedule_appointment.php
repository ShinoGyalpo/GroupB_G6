<?php
// Start a session
session_start();

// Include the database connection file
require_once('config.php');

// Check if the appointment ID and new appointment date are set
if (isset($_POST['id']) && isset($_POST['appointment_date'])) {
    // Retrieve the appointment ID and sanitize input
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Retrieve the new appointment date and sanitize input
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);

    // Update the appointment date in the appointment_form table
    $query = "UPDATE appointment_form SET appointment_date = '$appointment_date' WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        // If the data is successfully updated, redirect to a success page
        $_SESSION['success_msg'] = "Appointment rescheduled successfully!";
        header("Location: success.php");
        exit;
    } else {
        // If there is an error in the query, show an error message
        $_SESSION['error_msg'] = "Error in rescheduling appointment: " . mysqli_error($conn);
        header("Location: appointment.php");
        exit;
    }
}
?>
