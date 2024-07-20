<?php
@include ('config.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $reservation_date = $_POST['reservation_date'];

    // Insérer les données dans la base de données
    $sql = "INSERT INTO reservations (name, email, number, reservation_date) VALUES ('$name', '$email', '$number', '$reservation_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successfully created.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="path/to/boxicons/css/boxicons.min.css">
    <link rel="icon" href="G__7_.png" type="image/x-icon">
    <title>Home Steak Craft</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo Steak.png" type="image/x-icon">
</head>
<body>
    
    <header>
        <div class="logo">
            <p><span>Steak </span>Craft</p>
        </div>
        <ul class="menu">
            <li><a href="#home">Home</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#about_us">About Us</a></li>
            <li><a href="#reservation">Réservation</a></li>
            <li><a href="<?php echo "login.php";
            ?>"><i class='bx bx-user'></i></a></li>
            <?php if(isset($_SESSION['user_id'])){
                echo "<li><a href='logout.php'>Log out</a></li>";}?>
             
        </ul>

        <!-- menu responsive -->
        <div class="toggle_menu"></div>
    </header>

    <!-- section acceuil home -->

    <section id="home">
        <div class="left">
            <h4>Our Latest Menu</h4>
            <h1>New York Strip</h1>
            <p>Experience the vibrant flavors of Africa with our latest culinary creation: African Chicken. This tantalizing dish features tender chicken marinated in a blend of traditional African spices, resulting in a mouthwatering fusion of savory and aromatic sensations. Served with fragrant rice and accompanied by a medley of colorful vegetables, each bite offers a journey through the rich and diverse culinary heritage of the continent. Whether you're a fan of bold flavors or simply seeking a taste of something exotic, our African Chicken promises to delight your palate and leave you craving more. Indulge in this delicious adventure today and embark on a gastronomic experience like no other.</p>
             <button><a href="menu.php">Order Now</a></button>
        </div>
        <div class="right">
            <img src="img1.png">
        </div>
    </section>

       <!-- section  menu -->

       <section id="menu">
           <h4 class="mini_title">Ours Menu</h4>
           <h2 class="title">Popular Menu</h2>
           <div class="dishes">
               <div class="dish">
                   <img src="olo.png">
                   <p>Tikka Masala</p>
                   <p><strong>Origin:</strong> ASIA</p>
                   <h2>550 MAD</h2>
                   <button><a href="menu.php">GO TO MENU <i class='bx bxs-cart-alt' style='color:#ffffff'  ></i></a></button>
               </div>
               <div class="dish">
                    <img src="img2.png">
                    <p>Teriyaki Grillé</p>
                    <p><strong>Origin:</strong> SOUTH AMERICA</p>
                    <h2>855 MAD</h2>
                    <button><a href="menu.php">GO TO MENU <i class='bx bxs-cart-alt' style='color:#ffffff'  ></i></a></button>
               </div>
               <div class="dish">
                    <img src="img3.png">
                    <p>Homard Thermidor</p>
                    <p><strong>Origin:</strong> MEXICO</p>
                    <h2>759 MAD</h2>
                    <button><a href="menu.php">GO TO MENU <i class='bx bxs-cart-alt' style='color:#ffffff'  ></i></a></button>
                </div>
                <div class="dish">
                    <img src="img4.png">
                    <p>Turbot Sauce Champagne</p>
                    <p><strong>Origin:</strong> TURKEY</p>
                    <h2>900 MAD </h2>
                    <button><a href="menu.php">GO TO MENU <i class='bx bxs-cart-alt' style='color:#ffffff'  ></i></a></button>
                </div>
                <div class="dish">
                    <img src="img5.png">
                    <p>Filet Mignon Rossini</p>
                    <p><strong>Origin:</strong> AMERICA</p>
                    <h2>479 MAD</h2>
                    <button><a href="menu.php">GO TO MENU <i class='bx bxs-cart-alt' style='color:#ffffff'  ></i></a></button>
               </div>
               <div class="dish">
                   <img src="ola.png">
                   <p>Round Steak</p>
                   <p><strong>Origin:</strong> FRANCE</p>
                   <h2>569 MAD</h2>
                   <button><a href="menu.php">GO TO MENU <i class='bx bxs-cart-alt' style='color:#ffffff'  ></i></a></button>
           </div>
          
           </div>
           <button class="btn"><a href="menu.php">Learn More</a></button>
       </section>


       <!-- section about us -->

       <section id="about_us">
            <h4 class="mini_title">About Us</h4>
            <h2 class="title">Why choose us ?</h2>
            <div class="about">
                <div class="left">
                    <img src="img-about-us.png">
                </div>
                <div class="right">
                    <h3>Best Food in The Word</h3>
                    <p>Welcome to Steak Craft—where every dish is an experience. Our dedication to quality ensures each bite exceeds expectations. Explore our diverse menu featuring savory steaks, fresh seafood, and vegetarian delights. Experience genuine warmth from our attentive staff the moment you arrive. Immerse yourself in our inviting ambiance, perfect for any occasion. Choose us for unforgettable dining moments. Join us at Steak Craft and savor the difference</p>
                    <button class="btn"><a href="aboutus.php">Learn More</a></button>
                </div>
            </div>
       </section>


       <!-- section comments -->
      <section class="comment_section">
            <h4 class="mini_title">Comments</h4>
            <h2 class="title"> What are our customers saying about us</h2>
            <div class="comments">
                <div class="comment">
                    <div>
                        <img src="t2.jpg">
                        <h4>Arthur Louis</h4>
                    </div>
                    <p>A feast for the senses! My visit to this establishment was a true culinary revelation. The expert chefs dazzled my taste buds with innovative and delicious dishes, showcasing their passion for cooking. Each plate was a work of art, highlighting quality ingredients and bold flavor combinations. The ambiance was also delightful, adding to the overall experience. I highly recommend this place to all food enthusiasts</p>
                </div>
                <div class="comment">
                    <div>
                        <img src="t3.jpg">
                        <h4>Smith Johnson</h4>
                    </div>
                    <p>An exceptional culinary experience! I had the pleasure of indulging in a meal prepared by the expert chefs of this establishment, and I am still enchanted. Each dish was a true work of art, with perfectly balanced flavors and a presentation worthy of the finest Michelin-starred restaurants. The service was impeccable, and the warm ambiance added to the experience. I highly recommend to all food enthusiasts to come and discover this culinary gem.</p>
                </div>
                <div class="comment">
                    <div>
                        <img src="t4.jpg">
                        <h4>Agathe Emma</h4>
                    </div>
                    <p>I recently had the opportunity to dine at the restaurant Steak Craft, and my experience was simply amazing. Not only was the ambiance elegant and welcoming, but each dish was a true culinary masterpiece. The exquisite flavors and fresh ingredients took me on an unforgettable gastronomic journey. The service was impeccable, with attention to detail that truly made a difference. For an exceptional culinary experience, visit this restaurant</p>
                </div>


            </div>
      </section>

       <!-- section reservation -->
       <section id="reservation">
    <h4 class="mini_title">Reservation</h4>
    <h2 class="title"> Fill this form to make a reservation</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Your Name</label>
        <input type="text" name="name">
        <label>Your Email</label>
        <input type="email" name="email">
        <label>Your Number</label>
        <input type="text" name="number">
        <label>Reservation Date</label>
        <input type="date" name="reservation_date">
        <input type="submit" name="submit" value="Make The Reservation">
    </form>
</section>




      <!-- footer -->
      <footer>
        <section class="contact1">
            <div class="contact-info">
                <div class="first-info">
                    <h2 href="#" class="logo"><span>Steak</span> Craft</h2>
                    <p> Ain Diab Bd Corniche, Casablanca</p>
                    <p>+212 522345671</p>
                    <p>SteakCraft@gmail.com</p>
                   <div class="social-icon">
                        <a href="#"><i class='bx bxl-facebook'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-youtube'></i></a>
                        <a href="#"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </div>  
                <div class="second-info">
                    <h4>CONTACT US</h4>
                    <p>About Page</p>
                    <p>Size Guide</p>
                    <p>Purchases and Returns</p>
                    <p>Privacy</p>
                </div>
                <div class="third-info">
                    <h4>RESERVATIONS & ORDERS</h4>
                    <p>Process</p>
                    <p>Booking Information</p>
                    <p>Ordering Information</p>
                    <p>Reservation FAQs</p>
                </div>
                <div class="fourth-info">
                    <h4>COMPANY</h4>
                    <p>Location</p>
                    <p>Hours of Operation</p>
                    <p>Mission and Values</p>
                    <p>Connexion</p>
                </div>
                <div class="fiv">
                    <h4>SUBSCRIBE</h4>
                    <p>Join us for an unparalleled culinary experience! Subscribe now to stay updated on our latest special offers, exclusive events, and culinary discoveries that will tantalize your taste buds with every visit. Never miss an opportunity to savor the delights of our restaurant.</p>
                </div>
            </div>
        </section>
          <br>
          <p class="footer_text">copyright @2024 <span>STEAK CRAFT</span> | DESIGNED BY AOUANE OUSSAMA , CHAKROUNI YOUNES , MOURTADA MOHAMMED .</p>
      </footer>


      <script>
          var small_menu = document.querySelector('.toggle_menu')
          var menu = document.querySelector('.menu')

          small_menu.onclick = function(){
               small_menu.classList.toggle('active');
               menu.classList.toggle('responsive');
          }
      </script>
      
</body>
</html>