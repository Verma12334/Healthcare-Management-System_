<!-- <?php
// Start the PHP file
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthCare</title>
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="logo">
                <h1>HealthCare</h1>
            </div>
            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="#about">About Us</a>
                <a href="#treatments">Treatments</a>
                <a href="#blog">Our Blog</a>
                <a href="#contact">Contact Us</a>
                <a href="#appointment" class="appointment-button">Book an Appointment</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-slideshow">
            <img src="../Photos/hero1.jpg" alt="Arthritis Treatment" class="active">
            <img src="../Photos/hero2.jpg" alt="Hospital">
            <img src="../Photos/hero3.jpg" alt="Homeopathy Care">
            <img src="../Photos/hero4.jpg" alt="Pain Relief">
        </div>
        <!-- Different content for each slide -->
        <!-- <div class="hero-content">
            <div class="content active">
                <h2>SWEET TREATMENT FOR ALL YOUR PAINS</h2>
                <p>We Provide the best Homeocare for You</p>
                <p>Homeopathy treatment is very beneficial for people as it is very useful and efficient in treating an immense range of diseases and long-term illness.</p>
            </div>
            <div class="content">
                <h2>PAIN RELIEF FOR A BETTER LIFE</h2>
                <p>Expert Homeopathy care for pain management.</p>
                <p>Our treatments are designed to help you live pain-free with natural remedies.</p>
            </div>
            <div class="content">
                <h2>HOMEOPATHY CARE FOR EVERYONE</h2>
                <p>Natural, effective, and personalized treatments.</p>
                <p>Discover the benefits of homeopathy for your health and well-being.</p>
            </div>
        </div> -->
        
    </section>

    <!-- Features Section -->
    <section class="key-features">
        <div class="key-single">
            <i class="fas fa-plus-square"></i>
            <b>Care about your Health</b>
        </div>
        <div class="key-single key-color-2">
            <i class="fas fa-user-md"></i>
            <b>Professional Doctors</b>
        </div>
        <div class="key-single">
            <i class="fas fa-wheelchair"></i>
            <b>15000+ People Treated</b>
        </div>
        <div class="key-single key-color-2">
            <i class="fas fa-plus-square"></i>
            <b>Fast and Flex Service</b>
        </div>
    </section>

    <!-- Treatments Section -->
    <section class="treatments" id="treatments">
        <h2>Our Treatments</h2>
        <p>Take a look at our treatments</p>
        <div class="treatment-grid">
            <div class="treatment-card">
                <img src="../Photos/module1.jpg" alt="Thyroid Treatment">
                <br>
                <a href="admin_login.php" style="text-decoration: none;">Admin</a>
                <p>Effective thyroid care for lasting health.</p>
            </div>
            <div class="treatment-card">
                <img src="../Photos/module3.jpg" alt="Diabetes Treatment">
                <br>
                <a href="patient_login.php" style="text-decoration: none;">Patient</a>
                <p>Personalized care for diabetes management.</p>
            </div>
            <div class="treatment-card">
                <img src="../Photos/module2.jpg" alt="Arthritis Treatment">
                <br>
                <a href="doctor_login.php" style="text-decoration: none;">Doctor</a>
                <p>Relief for joint pain and arthritis.</p>
            </div>
            <div class="treatment-card">
                <img src="../Photos/module4.jpg" alt="Asthma Treatment">
                <br>
                <a href="employee_login.php" style="text-decoration: none;">Staff</a>
                <p>Respiratory care for asthma patients.</p>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let slideIndex = 0;
            const slides = document.querySelectorAll('.hero-slideshow img');
            const contents = document.querySelectorAll('.hero-content .content');

            function showSlides() {
                slides.forEach((slide, index) => {
                    slide.classList.remove('active');
                    if (index === slideIndex) {
                        slide.classList.add('active');
                    }
                });
                contents.forEach((slide, index) => {
                    slide.classList.remove('active');
                    if (index === slideIndex) {
                        slide.classList.add('active');
                    }
                });

                slideIndex = (slideIndex + 1) % slides.length; // Loop back to the first slide
            }

            // Call showSlides every 2 seconds
            setInterval(showSlides, 2000);
        });
    </script>

    <!-- Footer -->
    <footer>
        <p>Contact us at +91 2134567890 | info@homeopathyclinic.com</p>
    </footer>

</body>
</html>