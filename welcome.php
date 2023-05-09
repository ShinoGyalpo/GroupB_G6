<?php
session_start();
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dental Appointment</title>
    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />

    <!-- swiper css link  -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css" />
  </head>
  <?php
      if(isset($_SESSION['loginMessage'])){
        echo $_SESSION['loginMessage'];
        unset($_SESSION['loginMessage']);
      }
    ?>
  <body>
    <!-- Header Section -->
    <header class="header">
      <nav class="navbar">
        <a href="#"><img src="images/logo.png" alt="logo" /></a>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#team">Our-Team</a>
        <a href="#pricing">Pricing</a>
        <a href="#Schedule">Schedule</a>
      </nav>

      <a href="#contact" class="btn"> Make Appointment </a>
      <div id="menu-btn" class="fas fa-bars"></div>
      
    <!-- LogOut button for user -->
      <!-- <a href="index.html" class="btn"> Logout </a> -->
      
      <a href="logout.php" class="btn"> Logout </a>
      

      <div id="profile">
        <a href="#"><img src="images/profile.png" alt="" /></a>
      </div>
    </header>

    <!-- home -->

    <section class="home" id="home">
      <div class="content">
        <h3>"Life is short, but a beautiful smile lasts forever."</h3>
        <p>
          Welcome to Kathmandu Dental, where we believe that a healthy smile is
          the key to a happy life. Our state-of-the-art dental clinic is
          dedicated to providing you and your family with the highest quality
          dental care in a comfortable and relaxing environment.Our mission is
          to help you achieve and maintain a healthy, beautiful smile that you
          can be proud of. Whether you're a new patient or a returning one, we
          look forward to serving you and your family. Contact us today to
          schedule an appointment and experience the Kathmandu Dental
          difference!
        </p>
        <a href="#contact" class="btn">Make appointment</a>
        
      </div>
    </section>

    <!-- home end -->

    <!-- about us section-->

    <section class="about" id="about">
      <h1 class="heading">about us</h1>

      <div class="row">
        <div class="image">
          <img src="images/about.jpg" alt="" />
        </div>

        <div class="content">
          <h3>our clinic is made for you to be smiling all the time</h3>
          <p>
            Kathmandu Dental is a premier dental clinic that has been serving
            the people of Nepal since its founding on February 14th, 2000. We
            offer a comprehensive range of dental services, including routine
            cleanings, restorative dentistry, orthodontics, and cosmetic
            dentistry. With a team of highly skilled and experienced dental
            professionals, we are committed to providing the best possible care
            to our patients. Our dedication to quality and patient satisfaction
            has made us well-known throughout Nepal, and we are proud to be a
            trusted provider of dental care for the people of Kathmandu and
            beyond.
          </p>
          <a href="#" class="btn">read more</a>
        </div>
      </div>
    </section>

    <!-- about end -->

    <!-- services -->

    <section class="services" id="services">
      <h1 class="heading">our services</h1>

      <div class="box-container">
        <div class="box">
          <img src="images/services-1.webp" alt="" />
          <h3>online schedule</h3>
          <p>
            Easily book dental appointments from the comfort of their own homes.
            Instead of calling a dental clinic during business hours and trying
            to find an available appointment time, patients can simply go online
            and view the available appointment slots.
          </p>
        </div>
        <div class="box">
          <img src="images/braces.jpg" alt="" />
          <h3>Orthodontic treatments</h3>
          <p>
            Orthodontic treatments are used to straighten crooked teeth and
            correct bite problems. Traditional braces and clear aligners such as
            Invisalign are two common orthodontic treatments.
          </p>
        </div>

        <div class="box">
          <img src="images/services-2.webp" alt="" />
          <h3>Cosmetic dentistry</h3>
          <p>
            Cosmetic dentistry involves treatments that improve the appearance
            of your teeth and smile. Common cosmetic treatments include teeth
            whitening, veneers, and cosmetic bonding.
          </p>
        </div>

        <div class="box">
          <img src="images/services-3.webp" alt="" />
          <h3>Restorative dentistry</h3>
          <p>
            Restorative dentistry involves repairing damaged or missing teeth.
            Common restorative treatments include fillings, crowns, bridges, and
            dental implants.
          </p>
        </div>
      </div>
    </section>

    <!-- services end-->

    <!-- team section -->

    <section class="team" id="team">
      <h1 class="heading">our team</h1>

      <div class="swiper team-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <div class="image">
            
            <img src="images/Dr_sama.jpg" alt="" />
              <div class="share">
                <!-- <a href="#" class="fab fa-facebook-f"></a> -->
                <a href="https://twitter.com/PradhanSamu" class="fab fa-twitter"></a>
                <!-- <a href="#" class="fab fa-instagram"></a> -->
                <a href="https://www.linkedin.com/in/sama-pradhan-33a126169/?originalSubdomain=np" class="fab fa-linkedin"></a>
              </div>
            </div>
            <div class="content">
              <h3>Dr. Sama Pradhan <br> <p style="font-size: x-small;">(10am-2pm)</p></h3>
              <span>Endodontist (MDS)</span>
              
            </div>
            <a href="sama_rating.php" class="btn" >Feedbacks</a>
            
          </div>

          <div class="swiper-slide slide">
            <div class="image">
              <img src="images/dr_kushal.jpg" alt="" />
              <div class="share">
                <!-- <a href="#" class="fab fa-facebook-f"></a> -->
                <a href="https://twitter.com/k_vaishnani?lang=en" class="fab fa-twitter"></a>
                <!-- <a href="#" class="fab fa-instagram"></a> -->
                <a href="https://np.linkedin.com/in/dr-kushal-bimb-b467124b" class="fab fa-linkedin"></a>
              </div>
            </div>
            <div class="content">
              <h3>Dr. Kushal Bimb <br> <p style="font-size: x-small;">(11am-3pm)</p></h3>
              <span>Oral and Maxillofacial Surgeon</span>
            </div>
            <a href="bimb_rating.php" class="btn" >Feedbacks</a>
          </div>

          <div class="swiper-slide slide">
            <div class="image">
              <img src="images/dr_aryal.jpg" alt="" />
              <div class="share">
                <!-- <a href="#" class="fab fa-facebook-f"></a> -->
                <a href="https://twitter.com/aryal_shreeya" class="fab fa-twitter"></a>
                <!-- <a href="#" class="fab fa-instagram"></a> -->
                <a href="https://www.linkedin.com/in/shreeya-aryal-26b102115/" class="fab fa-linkedin"></a>
              </div>
            </div>
            <div class="content">
              <h3>Dr. Shreeya Aryal <br> <p style="font-size: x-small;">(12pm-4pm)</p></h3>
              <span>Periodontist (MDS)</span>
            </div>
            <a href="shreya_rating.php" class="btn" >Feedbacks</a>
          </div>

          <div class="swiper-slide slide">
            <div class="image">
              <img src="images/dr_saloni.jpg" alt="" />
              <div class="share">
                <!-- <a href="#" class="fab fa-facebook-f"></a> -->
                <a href="https://twitter.com/SaloniShillu" class="fab fa-twitter"></a>
                <!-- <a href="#" class="fab fa-instagram"></a> -->
                <a href="https://www.linkedin.com/in/shilpi-saloni-a72891b6/?trk=pub-pbmap&originalSubdomain=in" class="fab fa-linkedin"></a>
              </div>
            </div>
            <div class="content">
              <h3>Dr. Saloni Shilphi <br> <p style="font-size: x-small;">(3pm-6pm)</p></h3>
              <span>Endodontist (BDS,MDS)</span>
            </div>
            <a href="shilpi_rating.php" class="btn" >Feedbacks</a>
          </div>
        </div>
      </div>
    </section>

    <!-- team section ends -->

    <!-- pricing plan  -->

    <section class="pricing" id="pricing">
      <h1 class="heading">Pricing plan</h1>
    </section>
    <div _ngcontent-c3="" class="payment-type">
            <h5 _ngcontent-c3="" class="payment-type__title">Select Payment Partner</h5>
            <ul _ngcontent-c3="" class="payment-type__list">
              <li _ngcontent-c3="" class="payment-type__item">
                <div _ngcontent-c3="" class="payment-type__image-section">
                  
                  <a _ngcontent-c3="" class="payment-type__link" href="https://esewa.com.np/#/home">
                    
                    <img _ngcontent-c3="" class="payment-type__img" src="images/esewa.png" alt="eSewa">
                    <p _ngcontent-c3="" class="payment-type__text"> eSewa </p>
                  </a>
                  
                </div>
              </li><li _ngcontent-c3="" class="payment-type__item">
                <div _ngcontent-c3="" class="payment-type__image-section">
                  
                  <a _ngcontent-c3="" class="payment-type__link" href="https://khalti.com/">
                    
                    <img _ngcontent-c3="" class="payment-type__img" src="images/khalti.png" alt="khalti">
                    <p _ngcontent-c3="" class="payment-type__text" > khalti </p>
                  </a>
                </div>
              </li>
            </ul>
            <div>
            <img _ngcontent-c3="" class="qrK" style="max-width: 13%;margin-top: -15%;margin-left: 18%;" src="images/esewaQR.jpg" alt="khalti">
            </div>
            <div>
            <img _ngcontent-c3="" class="qrE" style="max-width: 13%;margin-left: 70%;margin-top: -19%;" src="images/khaltiQR.png" alt="khalti">
            </div>  
            <p style="text-align: center;">Please Bring the Screenshorts of the payment during visit </p>

            </div>
            
          </div>

    

    <!-- pricing plan ends -->

    <!-- contact -->

    <section class="contact" id="contact">
      <h1 class="heading">Make appointment</h1>

      <form action="appointment_process.php" method="POST" >
        <span>Your name :</span>
        <div class="inputBox">
          <input type="text" placeholder="first name" name="first_name" />
          <input type="text" placeholder="last name" name="last_name" />
        </div>

        <span>Your email :</span>
        <input
          type="email"
          placeholder="enter your email"
          class="box"
          name="email"
        />

        <span>Your Number :</span>
        <input
          type="number"
          placeholder="enter your number"
          class="box"
          name="phone"
        />

        <div class="prefer">
          <div>
            <span><label for="Doctor_Name">Preferred Doctor:</label></span>
          </div>
          <div>
            <select name="Doctor_Name" id="doctor_Name">
              <option value="">Choose a doctor</option>
              <option value="Dr. Sama Pradhan">Dr. Sama Pradhan</option>
              <option value="Dr. Kushal Bimb">Dr. Kushal Bimb</option>
              <option value="Dr. Shreeya Arya">Dr. Shreeya Arya</option>
              <option value="Dr. Saloni Shilphi">Dr. Saloni Shilphi</option>
            </select>
          </div>
        </div>
        <div style="font-size: 1.7rem;line-height: 2;
  color: var(--primary);">Appointment date :</div>
        <input type="datetime-local" class="box" name="appointment_date" />

        <input type="submit" value="Book now" name="submit" class="btn" />
        <!-- <form style= "padding-top: 20px"; method="post"> -->
        </form>
      </form>
    </section>

    <!-- contact ends-->

         <!-- table -->
         <section class="about" id="Schedule">
      <h1 class="heading">Schedule</h1>
        <div class="content5">
          <h3>View your Appointment/Schedule</h3>
          <a href="table.php" class="btn1" >Schedule</a>
          
        </div>
      </div>
    </section>
      <!-- table end -->

    <!-- footer -->

    <section class="footer" id="social">
      <div class="box-container">
        <div class="box">
          <h3>address</h3>
          <p>Tinchuli-Boudha, Kathmandu, Nepal</p>
          <div class="share">
            <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
          </div>
        </div>

        <div class="box">
          <h3>e-mail</h3>
          <a href="#social" class="link">gyalpo2001@gmail.com</a>
          <a href="#social" class="link">jubingc15@gmail.com</a>
        </div>

        <div class="box">
          <h3>call us</h3>
          <p>+977 9818716826</p>
          <p>+977 9823548051</p>
        </div>

        <div class="box">
          <h3>opening hours</h3>
          <p>
            Sunday - thursday : 8:00 - 6:00 <br />
            friday : 9:00 AM - 1:00 PM
          </p>
        </div>
      </div>

      <div class="credit">
        created by <span>L5CG6 Group B</span> | all rights reserved!
      </div>
    </section>

    <!-- footer ends -->

    <!-- swiper js link  -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="scriptmain.js"></script>
  </body>
</html>


<style>

.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

*{
text-transform: capitalize;
}


</style>