<?php
// Start a session
session_start();

// Include the database connection file
require_once('config.php');

// Check if the appointment ID is set
if (isset($_GET['id'])) {
    // Retrieve the appointment ID and sanitize input
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Delete the appointment from the appointment_form table
    $query = "DELETE FROM appointment_form WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        // If the data is successfully deleted, redirect to a success page
        $_SESSION['success_msg'] = "Appointment cancelled successfully!";
        header("Location: success.php");
        exit;
    } else {
        // If there is an error in the query, show an error message
        $_SESSION['error_msg'] = "Error in cancelling appointment: " . mysqli_error($conn);
        header("Location: appointment.php");
        exit;
    }
}
?>
