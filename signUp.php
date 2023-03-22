<?php
include('partials/header.php');

if(isset($_SESSION['accountCreated'])){
    echo $_SESSION['accountCreated'];
    unset($_SESSION['accountCreated']);
}
?>

<div class="container">
    <div class="form-box">
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
                    <input type="text" placeholder="Phone No." name="phone" required>
                </div>
            </div>
            <div class="btn-field">
                <button type="submit" id="signupBtn" name="signup" required><b>Sign Up</b></button>
            </div>

            <span class="signinLink">Have an account already? <a href="index.php">Login</a></span>
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

    //state out query..
    $sql = "INSERT INTO admin SET
            name = '$name',
            email = '$email',
            password = '$password',
            confirmpassword = '$confirmpassword',
            address = '$address',
            phone = '$phone'
            ";
    // execute sql query 
    $res = mysqli_query($conn, $sql);
    //check if query is executed successfully
    if($res == true){
        //message to show account created successfully
            $_SESSION['accountCreated']= '<span class="addedAccount">Account '.$Name.' created!</span>';
            header('location: '.SITEURL. 'index.php');
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
  
  