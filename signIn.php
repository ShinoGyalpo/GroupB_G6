<?php
include('partials/header.php');
?>
<div class="container">
<div class="form-box1">

            <h1>Sign In</h1>
            <form action="" method="POST">
                <?php
                if(isset($_SESSION['noAdmin'])){
                    echo $_SESSION['noAdmin'];
                    unset($_SESSION['noadmin']);
                }
                ?>

                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" placeholder="Email" name="email" required>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <span class="forget"><a href="forget_password.php"> Forget Password? </a></span>
                </div>
                <div class="btn-field1">
                    <button type="login" id="signinBtn" name="login" required><b>Login</b></button>
                </div>
                <span class="signupLink">Don't have an account? <a href="signUp.php">Sign Up</a></span>     
        </form>
    </div>
</div>
<script src="sign.js"></script>


<?php
include('partials/footer.php');
?>

<?php

if(isset($_POST['login'])){
    // echo 'your data submited';

    //creating variables to store email and password
    $email = $_POST['email'];
    $passWord = $_POST['password'];
    


    //sql to select if there is the deatails in the database
    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$passWord'";
    //excute the query
    $result = mysqli_query($conn, $sql);

    //count the number of account with same email and passwprd
    $count = mysqli_num_rows($result);
    //put the count result into one associate array
    $row = mysqli_fetch_assoc($result);

    if($count == 1){
        //message to welcome admin to home
        $_SESSION['loginMessage'] = '<span class="success">Welcome '.$email.' </span>';
        header('location:' .SITEURL. 'home.php');
        exit();
    }
    else{
        //message to welcome admin to home
        $_SESSION['noAdmin'] = '<span class="fail">'.$email.' is not registered! </span>';
        header('location:' .SITEURL. 'signIn.php');
        exit();
    }
}

?>

  
  
  