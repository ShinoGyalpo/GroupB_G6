<?php
// Database connection
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "my_database";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check if token exists in database
$token = $_GET['token'];
$sql = "SELECT * FROM password_resets WHERE token = '$token'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
  // Display password reset form
?>
<form action="update_password.php" method="POST">
  <label for="password">New Password:</label>
  <input type="password" id="password" name="password" required>
  <input type="hidden" name="token" value="<?php echo $token ?>">
  <button type="submit">Reset Password</button>
</form>
<?php
} else {
  echo "Invalid token";
}

mysqli_close($conn);
?>
