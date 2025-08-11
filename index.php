<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$reservationDot = false;

if (isset($_SESSION['username'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'GlamX');
    $username = $_SESSION['username'];

    // Only fetch un-seen appointments
    $query = "SELECT * FROM appointment WHERE userEmail = '$username' AND seen = 0 LIMIT 1";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        $reservationDot = true;
    }

    mysqli_close($conn);
}

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlamX.com</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/mediaqueries.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Quicksand:wght@300..700&family=Tangerine:wght@400;700&display=swap" rel="stylesheet" />
    
    <!-- animations on scroll library -->
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->

    <!-- home page library for text animations (Animate.css) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>

    <!-- Cookie Consent -->
    <div id="cookieConsent">
        <p>We use cookies to improve your experience on our website. By clicking "Accept", you agree to the use of cookies. You can choose to reject them if you prefer.</p>
        <div class="cookiesBtn">
            <button id="acceptBtn" class="btn btn1">Accept All</button>
            <button id="rejectBtn" class="btn btn2">Reject All</button>
        </div>
    </div>

    <!-- Reservation Modal -->
    <div id="reservationModal" class="modalR">
        <div class="modal-contentR">
            <span class="closeR">&times;</span>
            <h2>My Reservations</h2>
            <div id="appointmentContainer"></div>
        </div>
    </div>

    <!-- Header -->
    <header class="header" id="header">
        <div class="navbar container-fluid">
            <div class="logo">
                <img class="logoimg" src="images/logo/logo10.png" alt="Logo" />
                <img class="logoname" src="images/logo/logo11.png" alt="Logo" />

                <!-- <h5>GlamX</h5> -->
            </div>

            <!-- Mobile Toggle -->
            <button class="nav-toggel d-lg-none" data-bs-toggle="modal" data-bs-target="#mobileNavModal" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>

            <!-- Desktop Nav -->
            <nav class="nav-menu d-none d-lg-flex" id="nav-menu">
                <ul class="nav-list mb-0 p-0">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="#services" class="nav-link">Services</a></li>
                    <li><a href="#professionals" class="nav-link">Specialists</a></li>
                    <li><a href="#gallery" class="nav-link">Gallery</a></li>
                    <li><a href="#reviews" class="nav-link">Reviews</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>

                </ul>
            </nav>

            <!-- Desktop Auth -->
            <div class="loginbutton d-none d-lg-flex align-items-center gap-2">
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="position-relative">
                        <button class="Modalbtn openModalBtn position-relative">
                            My Reservation
                            <?php if ($reservationDot): ?>
                                <span class="reservation-dot"></span>
                            <?php endif; ?>
                        </button>
                    </div>
                    <a href="SignupLogin/logout.php"><button class="login">Logout</button></a>
                <?php else: ?>
                    <a href="SignupLogin/login/login.php"><button class="login">Login</button></a>
                    <a href="SignupLogin/signup/signup.php"><button class="SignUp">Sign Up</button></a>
                <?php endif; ?>
            </div>

        </div>
    </header>

    <!-- Mobile Nav Modal -->
    <div class="modal fade" id="mobileNavModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body d-flex flex-column align-items-center justify-content-center gap-3">
                    <a href="#home" class="nav-link">Home</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="#services" class="nav-link">Services</a>
                    <a href="#professionals" class="nav-link">Specialists</a>
                    <a href="#gallery" class="nav-link">Gallery</a>
                    <a href="#reviews" class="nav-link">Reviews</a>
                    <a href="#contact" class="nav-link">Contact</a>

                    <?php if (isset($_SESSION['username'])): ?>
                        <div class="position-relative">
                            <button class="Modalbtn openModalBtn position-relative" data-bs-dismiss="modal">
                                My Reservation
                                <?php if ($reservationDot): ?>
                                    <span class="reservation-dot"></span>
                                <?php endif; ?>
                            </button>
                        </div>
                        <a href="SignupLogin/logout.php"><button class="login">Logout</button></a>
                    <?php else: ?>
                        <a href="SignupLogin/login/login.php"><button class="login">Login</button></a>
                        <a href="SignupLogin/signup/signup.php"><button class="SignUp">Sign Up</button></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Home -->
    <section class="home" id="home">
        <div class="home-slider">
            <div class="homeimg"><img src="images/bg/woman/4.png" alt=""></div>
            <div class="homeimg"><img src="images/bg/woman/5.png" alt=""></div>
            <div class="homeimg"><img src="images/bg/woman/2.png" alt=""></div>
        </div>
        <div class="navigationHome">
            <button id="prevBtnHome">❮</button>
            <button id="nextBtnHome">❯</button></div>

        <div class="container">
            <div class="mainheading">
                <p class="tagline animate__animated animate__fadeInDownBig">Discover the art of self-care</p>
                <h1 class="animate__animated animate__fadeIn">Refining Beauty With Every Subtle Shade</h1>
                <div class="detailpara animate__animated animate__fadeInUpBig">
                    Our expert stylists and therapists use premium products and cutting-edge techniques to ensure you leave feeling refreshed, confident, and absolutely stunning.
                </div>
                <a href="#services"><button class="home-servicesBtn animate__animated animate__fadeInUpBig">Check Out Our Transforming Services</button></a>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="about" id="about">
        <div class="container-abt">
            <div class="section-title-abt">
                <h1 data-aos="fade-up">About us</h1>
            </div>
            <div class="about-detail">
                <div class="about-detail-content">
                    <div class="about-img"><img src="images/background.webp" alt="" data-aos="flip-up" data-aos-duration="1000"></div>
                    <div class="about-description" data-aos="fade-left" data-aos-duration="1000">
                        <p>Welcome to <b>GlamX</b>, where beauty is more than a service — it’s a celebration of you.</p>
                        <p>Founded in 2024 in Rahim Yar Khan, GlamX was created to empower individuals through self-care and personal transformation. </p>
                        <p>Our mission is simple: to help you look and feel your best with premium products, personalized services, and a warm, welcoming touch.</p>
                        <p>At GlamX, we believe beauty is unique to every individual. Whether it’s a big occasion or a small self-care moment, we’re here to make you feel confident, radiant, and truly valued.</p>
                        <p>Come experience the difference at GlamX — where every shade of beauty is celebrated.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <div class="services" id="services">
        <div class="services2">
            <div class="row1-services">
                <h1 data-aos="fade-up">Services</h1>
            </div>
            <div class="row2-services">
                <!-- Repeat this block for each service -->
                <div class="card2a-services" data-aos="zoom-in" data-aos-duration="1000"><img src="images/services/s1.png" alt="">
                    <p class="ser">Skin Care</p>
                </div>
                <div class="card2a-services" data-aos="zoom-in" data-aos-duration="1000"><img src="images/services/s2.png" alt="">
                    <p class="ser">Makeup</p>
                </div>
                <div class="card2a-services" data-aos="zoom-in" data-aos-duration="1000"><img src="images/services/s3.png" alt="">
                    <p class="ser">Massage</p>
                </div>
                <div class="card2a-services" data-aos="zoom-in" data-aos-duration="1000"><img src="images/services/s4.png" alt="">
                    <p class="ser">Waxing</p>
                </div>
                <div class="card2a-services" data-aos="zoom-in" data-aos-duration="1000"><img src="images/services/s5.png" alt="">
                    <p class="ser">Manicure</p>
                </div>
                <div class="card2a-services" data-aos="zoom-in" data-aos-duration="1000"><img src="images/services/s6.png" alt="">
                    <p class="ser">Pedicure</p>
                </div>
                <div class="card2a-services" data-aos="zoom-in" data-aos-duration="1000"><img src="images/services/s7.png" alt="">
                    <p class="ser">Hairstyle</p>
                </div>
                <div class="card2a-services" data-aos="zoom-in" data-aos-duration="1000"><img src="images/services/s8.png" alt="">
                    <p class="ser">Haircare</p>
                </div>
            </div>
            <div class="row3-services">
                <a href="appointment/checkLogin.php">
                    <button class="animated-button-services" data-aos="zoom-in" data-aos-duration="1000">Schedule an Appointment</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Professionals -->
    <div class="professionals" id="professionals">
        <div class="row1-p">
            <h1 data-aos="fade-up">Specialists</h1>
        </div>
        <div class="row2-p">
            <div class="card-p">
                <div class="card-p-inner" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="one">
                        <img src="images/professionals/ex1.jpg" alt="">
                        <div class="two">
                            <h5 class="name">Amna Asif</h5>
                            <h6 class="prof">Esthetician</h6>
                        </div>
                    </div>
                    <p>Amna offers personalized facials and skincare treatments designed to restore radiance and leave your skin feeling refreshed and pretty.</p>
                </div>
            </div>
            <div class="card-p">
                <div class="card-p-inner" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="one">
                        <img src="images/professionals/ex2.jpg" alt="">
                        <div class="two">
                            <h5 class="name">Irum Munawar</h5>
                            <h6 class="prof">Makeup Artist</h6>
                        </div>
                    </div>
                    <p>Irum specializes in flawless makeup for weddings and events, enhancing natural beauty with professional techniques and long-lasting, elegant results.</p>
                </div>
            </div>
            <div class="card-p">
                <div class="card-p-inner" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="one">
                        <img src="images/professionals/ex3.jpg" alt="">
                        <div class="two">
                            <h5 class="name">Tooba Moiz</h5>
                            <h6 class="prof">Massage Therapist</h6>
                        </div>
                    </div>
                    <p>Tooba provides relaxing, therapeutic massages that relieve stress, improve circulation, and help clients feel calm, and completely renewed.</p>
                </div>
            </div>
            <div class="card-p">
                <div class="card-p-inner" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="one">
                        <img src="images/professionals/ex4.jpg" alt="">
                        <div class="two">
                            <h5 class="name">Hina Fatima</h5>
                            <h6 class="prof">Hair Artist</h6>
                        </div>
                    </div>
                    <p>Hina delivers modern, flattering hairstyles and hair treatments, tailoring each service to highlight your features and express your personal style.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <section class="gallery" id="gallery">
        <div class="gallery-content">
            <div class="section-title" data-aos="fade-up">
                <h1>Gallery</h1><span>Beauty is good for soul</span>
            </div>
            <div class="gallery-list-img">
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Connection failed!');
                $result = mysqli_query($conn, "SELECT * FROM gallery");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="gallery-img" data-aos="zoom-in" data-aos-duration="1000"><img src="images/gallery/' . htmlspecialchars($row["gal_img"]) . '" alt=""></div>';
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </section>

    <!-- Reviews -->
    <section class="reviews-body" id="reviews">
        <div class="container-reviews">
            <h1 class="reviews-body-heading" data-aos="fade-up">Client's Reviews</h1>
            <div class="slider" id="slider">
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'GlamX');
                $result = mysqli_query($conn, "SELECT review_name, review_msg FROM reviews");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="slide"><div class="slide2" data-aos="zoom-in" data-aos-duration="1000"><p>"' . htmlspecialchars($row["review_msg"]) . '"</p><div class="details"><span class="name">' . htmlspecialchars($row["review_name"]) . '</span></div></div></div>';
                }
                mysqli_close($conn);
                ?>
            </div>
            <div class="reviewsBtn">
                <a href="reviews/checklogin.php"><button class="animated-button-reviews" data-aos="zoom-in" data-aos-duration="1000">Add a Review</button></a>
            </div>
            <div class="navigation"><button id="prevBtn">❮</button><button id="nextBtn">❯</button></div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <section class="Contact">
            <div class="contactContainer">
                <div class="contactleftportion">
                    <div class="Conatctlogo"><img src="images/logo/logo8.png" alt=""></div>
                    <div class="socialmediaicons">
                        <img src="images/footer/icons8-facebook-50.png" alt="">
                        <img src="images/footer/icons8-instagram-50.png" alt="">
                        <img src="images/footer/icons8-twitter-50.png" alt="">
                    </div>
                </div>
                <div class="Address">
                    <h2>Address</h2>
                    <p>RYK, Pakistan</p>
                </div>
                <div class="OpenedTime">
                    <h2>Opening Hours</h2>
                    <p>Mon-Fri</p>
                    <p>9:00 AM - 9:00 PM</p>
                </div>
                <div class="ContactNo">
                    <h2>Contact</h2>
                    <p>+920 000 0000</p>
                    <p>GlamX@gmail.com</p>
                </div>
            </div>
            <div class="copy">
                <p>&copy; All Rights Reserved</p>
            </div>
        </section>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/cookies.js"></script>
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>