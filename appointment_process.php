<?php
// Start a session
session_start();

// Include the database connection file
require_once('config.php');

// Check if the appointment form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);

    // Insert the form data into the appointment_form table
    $query = "INSERT INTO appointment_form (first_name, last_name, email, phone, appointment_date) VALUES ('$first_name', '$last_name', '$email', '$phone', '$appointment_date')";

    if (mysqli_query($conn, $query)) {
        // If the data is successfully inserted, show a success message
        echo "Appointment booked successfully!";
    } else {
        // If there is an error in the query, show an error message
        echo "Error in booking appointment: " . mysqli_error($conn);
    }
}
?>
