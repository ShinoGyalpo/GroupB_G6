<?php
include('partials/header.php');
?>
<div class="container1">
<div class="form-box1">
<div class="signInlogo">
            <img src="images/DENTAL APPOINTMENT SYSTEM (1).png" alt="">
        </div>
            <h1>Sign In</h1>
            <form action="" method="POST">
                <?php
                if(isset($_SESSION['noAdmin'])){
                    echo $_SESSION['noAdmin'];
                    unset($_SESSION['noAdmin']);
                }
                ?>
<!-- form input -->
                <div class="input-group1">
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" placeholder="Email" name="email" required>
                        
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <span class="forget"><a href="forget-password.php"> Forget Password? </a></span>
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
        if($email == "amod.pradhan1122@gmail.com")
        {?>
            <script>
            // document.querySelector(".swal-button swal-button--confirm").addEventListener("click", function() {
            // Show success message and redirect
			swal({
				title: "Success!",
				text: "You have logged in successfully!",
				icon: "success",
			}).then(function() {
				window.location.href = "admin_welcome.php";
			});
        </script>
        <?php
        }elseif ($email == "doctor@gmail.com"){
            ?>
            <script>
            // document.querySelector(".swal-button swal-button--confirm").addEventListener("click", function() {
            // Show success message and redirect
			swal({
				title: "Success!",
				text: "You have logged in successfully!",
				icon: "success",
			}).then(function() {
				window.location.href = "doctor_welcome.php";
			});
        </script>
        <?php
        }
            else{
        ?>

        <script>
            // document.querySelector(".swal-button swal-button--confirm").addEventListener("click", function() {
            // Show success message and redirect
			swal({
				title: "Success!",
				text: "You have logged in successfully!",
				icon: "success",
			}).then(function() {
				window.location.href = "welcome.php";
			});
        </script>

        <?php
        exit();
    }
}
    else{
        //message to welcome admin to home
        // $_SESSION['noAdmin'] = '<span class="fail">'.$email.' is not registered! </span>';
        // header('location:' .SITEURL. 'signIn.php');
        
        echo"<div class= 'alert alert-danger'> Invalid Password or Email. </div>";
        exit();
    }
    }


?>  