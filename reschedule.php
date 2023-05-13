<div style="text-align: center;">
<?php
session_start();

// Check if the appointment ID is set in the session
if (!isset($_SESSION['appointment_id'])) {
    echo "Error: Appointment ID not set in session.";
    exit();
}

// Connect to the database
require_once('config.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new appointment date from the form submission
    $new_date = mysqli_real_escape_string($conn, $_POST['new_date']);
    
    // Update the appointment record in the database
    $appointment_id = mysqli_real_escape_string($conn, $_SESSION['appointment_id']);
    $update_query = "UPDATE appointment_form SET appointment_date='$new_date' WHERE appointment_id='$appointment_id'";
    $update_result = mysqli_query($conn, $update_query);
    
    // Check if the update was successful
    if ($update_result) {
        echo "";
    } else {
        echo "Error rescheduling appointment: " . mysqli_error($conn);
    }
}

// Retrieve the appointment details from the database
$appointment_id = mysqli_real_escape_string($conn, $_SESSION['appointment_id']);
$appointment_query = "SELECT * FROM appointment_form WHERE appointment_id='$appointment_id'";
$appointment_result = mysqli_query($conn, $appointment_query);
if (!$appointment_result) {
    echo "Error retrieving appointment details: " . mysqli_error($conn);
    exit();
}
$appointment_row = mysqli_fetch_assoc($appointment_result);

// Check if the appointment was found in the database
if (!$appointment_row) {
    echo "Error: Appointment not found.";
    exit();
}
?>

<html>
<head>
    <title>Reschedule Appointment</title>
    <style>
        body{
            background-image: url(images/bgImage.png);
            background-position: center;
            background-size: cover;

        }
        .container {

            height: 42vh;
  border-radius: 14px;
  width: 90%;
  max-width: 450px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #ffffff;
  opacity: 90%;
  padding: 50px 60px 70px;
  text-align: center;
        }
        label {
            display: inline-block;
            width: 200px;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        input[type="date"] {
            width: 200px;
            font-size: 1.2rem;
            padding: 0.5rem;
        }
        input[type="submit"], input[type="button"] {
            margin-top: 1rem;
            display: inline-block;
            padding: 1rem 3rem;
            border-radius: 0.5rem;
            font-size: 1.2rem;
            color: white;
            width: 180px;
        }
        input[type="submit"] {
            background: #2f66d4;
        }
        input[type="button"] {
            background-color: #2f66d4;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #45a049;
        }
        input[type="submit"]:focus, input[type="button"]:focus {
            outline: none;
        }
        input[type="submit"]:active, input[type="button"]:active {
            background-color: #2f66d4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reschedule Appointment</h2>
        <p>Current appointment date: <?php echo $appointment_row['appointment_date']; ?></p>
        <form method="POST">
            <label for="new_date">New appointment date:</label>
            <input type="date" name="new_date" required>
            <br><br>
            <input type="submit" value="Reschedule">
            <input type="button" value="Cancel" onclick="window.location.href='cancel.php'; alert('Your appointment has been canceled.');">
            <br>
            <input type="button" value="Ok" onclick="window.location.href='welcome.php'; alert('Your appointment has been booked.');">
        </form>
    </div>
</body>
</html>