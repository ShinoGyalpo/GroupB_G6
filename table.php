<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/e29b4434c7.js" crossorigin="anonymous"></script>
    <title>Dental App</title>
</head>

<div class="form">
    <div class="about">
      <h1 class="heading" style="text-transform: uppercase;">Schedule</h1>
        <div class="content5">
        </div>
    </div>

<!-- PHP code -->
<?php
// Connect to the database
require_once('config.php');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from the database
$sql = "SELECT `first_name`,`last_name`,`email`,`phone`,`appointment_date`,`Doctor Assigned`,`Status` FROM `appointment_form`";
$result = mysqli_query($conn, $sql);

// Create the HTML table with inline styles

echo "<table style='width:100%;border-collapse:collapse;'>";
echo "<tr>
<th style='background-color:#f2f2f2;font-weight:bold;padding:8px;text-align:left;border-bottom:1px solid #ddd;'>First Name</th>
<th style='background-color:#f2f2f2;font-weight:bold;padding:8px;text-align:left;border-bottom:1px solid #ddd;'>Last Name</th>
<th style='background-color:#f2f2f2;font-weight:bold;padding:8px;text-align:left;border-bottom:1px solid #ddd;'>Email</th>
<th style='background-color:#f2f2f2;font-weight:bold;padding:8px;text-align:left;border-bottom:1px solid #ddd;'>Appointment Date</th>
<th style='background-color:#f2f2f2;font-weight:bold;padding:8px;text-align:left;border-bottom:1px solid #ddd;'>Doctor Assigned</th>
<th style='background-color:#f2f2f2;font-weight:bold;padding:8px;text-align:left;border-bottom:1px solid #ddd;'>Status</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td style='padding:8px;text-align:left;border-bottom:1px solid #ddd;text-transform: capitalize;'>" . $row["first_name"] . "</td>
    <td style='padding:8px;text-align:left;border-bottom:1px solid #ddd;text-transform: capitalize;'>" . $row["last_name"] . "</td>
    <td style='padding:8px;text-align:left;border-bottom:1px solid #ddd;'>" . $row["email"] . "</td>
    <td style='padding:8px;text-align:left;border-bottom:1px solid #ddd;'>" . $row["appointment_date"] . "</td>
    <td style='padding:8px;text-align:left;border-bottom:1px solid #ddd;text-transform: capitalize;'>" . $row["Doctor Assigned"] . "</td>
    <td style='padding:8px;text-align:left;border-bottom:1px solid #ddd;text-transform: capitalize;'>" . $row["Status"] . "</td>
    </tr>";
}

echo "</table>";

// Close the database connection
mysqli_close($conn);
?>

</div>

<style>
body {
  background-image: url("images/bgImage.png");
  background-repeat: no-repeat;
  background-size: cover;
}
.form{
    height: 55vh;
    border-radius: 14px;
    width: 90%;
    max-width: 90%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: #ffffff;
    opacity: 90%;
    padding: 50px 60px 70px;
    text-align: center;
    overflow: auto; /* Set the overflow property to auto */
}


</style>

<?php
include('partials/footer.php');
?>


