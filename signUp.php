<?php
include('partials/header.php');

if(isset($_SESSION['accountCreated'])){
    echo $_SESSION['accountCreated'];
    unset($_SESSION['accountCreated']);
}
?>

<div class="container">
    <div class="form-box">
        <div class="signUplogo">
            <img src="images/DENTAL APPOINTMENT SYSTEM (1).png" alt="">
        </div>
        <h1>Sign Up</h1>
        <form action="" method="POST">
            <div class="input-group">
                <div class="input-field" id="name">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Name" name="name" required>
                </div>    
                
                <div class="input-field" id="email">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email" required>
                </div>

                <div class="input-field" id="password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" required>
                </div>

                <div class="input-field" id="confirm">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Confirm password" name="confirmpassword" required>
                </div>
                
                <div class="input-field" id="address">
                    <i class="fa-solid fa-location-dot"></i>
                    <input type="text" placeholder="Address" name="address" required>
                </div>

                <div class="input-field" id="phone">
                    <i class="fa-solid fa-phone"></i>
                    <input type="number" placeholder="Phone No. " name="phone" required>
                </div>

                <div class="input-field" id="dob">
                    <p style="font-size: 10px; margin-left: 15px; color: #999;"><b>DOB</b></p>
                    <input type="date" placeholder="Date of Birth" name="dob" required>
                </div>
               
                <div class="input-field" id="gender">
                    <label for="gender">Gender:</label>

                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="other">Other
                </div>
                

 
            </div>
            <div class="btn-field">
                <button type="submit" id="signupBtn" name="signup" required><b>Sign Up</b></button>
            </div>

            <span class="signinLink">Have an account already? <a href="signIn.php">Login</a></span>
        </form>
    </div>
</div>

<?php
include('partials/footer.php');

//connecting with database
if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    // Check if password and confirm password fields match
    if ($password != $confirmpassword) {
        $_SESSION['unSuccessful'] = '<span class="fail">Passwords do not match!</span>';
        header('location:' .SITEURL. 'signUp.php');
        exit();
    }

    //state out query..
    $sql = "INSERT INTO admin SET
            name = '$name',
            email = '$email',
            password = '$password',
            confirmpassword = '$confirmpassword',
            address = '$address',
            phone = '$phone',
            dob = '$dob',
            gender ='$gender'
            ";
    // execute sql query 
    $res = mysqli_query($conn, $sql);
    //check if query is executed successfully
    if($res == true){
        //message to show account created successfully
            // $_SESSION= '<span class="addedAccount">Account '.$Name.' created!</span>';
            // header('location: '.SITEURL. 'signIn.php');

            ?>
 
            <script>
            // Show success message and redirect
                swal({
                    title: "Success!",
                    text: "Your account is created successfully!",
                    icon: "success",
                }).then(function() {
                    window.location.href = "welcome.php";
                });
            // });
        </script>
            <?php
            exit();
        }
        else{
             //message to show account not created successfully
             $_SESSION['unSuccessful'] = '<span class="fail">Account '.$Name.' created!</span>';
             header('location:' .SITEURL. 'signUp.php');
             exit();
        }       
}
?>

  
  