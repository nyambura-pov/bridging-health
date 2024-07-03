<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BridgingHealth - Welcome</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            background-color: #a68ac8; /* Lighter purple color */
            color: #fff;
            height: 100vh;
            width: 250px;
            padding: 2rem 1rem;
            position: fixed;
            top: 0;
            left: 0;
            transition: width 0.3s ease;
            z-index: 1000;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.2); /* Shadow for better separation */
            border-radius: 0 15px 15px 0; /* Rounded corners */
        }
        .sidebar .logo {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }
        .sidebar .logo img {
            max-width: 50px;
            margin-right: 10px;
        }
        .sidebar .logo span {
            font-weight: bold;
        }
        .sidebar .nav-links {
            list-style: none;
            padding: 0;
        }
        .sidebar .nav-links li {
            margin: 1rem 0;
        }
        .sidebar .nav-links a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-weight: bold;
            padding: 0.5rem;
            border-radius: 5px;
        }
        .sidebar .nav-links a:hover {
            background-color: #8a66c0;
        }
        .sidebar .nav-links a i {
            margin-right: 10px;
        }
        .sidebar .minimize-btn {
            position: absolute;
            bottom: 1rem;
            left: 100%;
            background-color: #8a66c0; /* Slightly darker purple */
            border: none;
            color: #fff;
            padding: 0.5rem;
            cursor: pointer;
            border-radius: 0 5px 5px 0;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }
        .sidebar .minimize-btn:hover {
            background-color: #6e4b97; /* Darker purple on hover */
        }
        .main-content {
            margin-left: 250px;
            padding: 2rem;
            flex-grow: 1;
        }
        .profile-section {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 1rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        .profile-section img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 10px;
        }
        .profile-section .user-info {
            text-align: right;
        }
        .profile-section .user-info h3 {
            margin: 0;
            font-size: 1.2rem;
            color: #6f42c1;
        }
        .profile-section .user-info p {
            margin: 0;
            color: #6c757d;
        }
        .hero {
            background-color: #6f42c1;
            color: #fff;
            text-align: center;
            padding: 3rem 1rem;
        }
        .hero img {
            max-width: 100%;
            height: auto;
            margin-top: 1rem;
        }
        .services {
            text-align: center;
            padding: 2rem 1rem;
        }
        .services img {
            max-width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }
        .footer {
            background-color: #6f42c1;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 0.5rem;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <span>BridgingHealth</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{ route('track') }}">
                    <i class="bi bi-calendar"></i>
                    <span>Track Symptoms</span>
                </a>
            </li>
        
            <li>
    <a href="{{ route('doctor.entry.form') }}">
        <i class="bi bi-file-text"></i>
        <span>Medical Records</span>
    </a>
</li>

            <li>
                <a href="{{ route('health') }}">
                    <i class="bi bi-book"></i>
                    <span>Health Education</span>
                </a>
            </li>
            <li>
                <a href="{{ route('call') }}">
                    <i class="bi bi-phone"></i>
                    <span>Contact</span>
                </a>
            </li>
        </ul>

        <!-- New Pages Section -->
        <div class="pages-section">
            <h4>Pages</h4>
            <ul class="nav-links">
            <li>
    <a href="{{ route('profile.edit') }}">
        <i class="bi bi-person"></i>
        <span>Profile</span>
    </a>
</li>
                <li>
                    <a href="{{ route('faq') }}">
                        <i class="bi bi-question-circle"></i>
                        <span>F.A.Q.</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <button class="minimize-btn" onclick="toggleSidebar()">☰</button>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Profile Photo and Name -->
        <div class="profile-section">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
            <div class="user-info">
                <h3>{{ Auth::user()->name }}</h3>
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <h1>Welcome to BridgingHealth</h1>
                <p>Your partner in maternal healthcare management</p>
                <i class="fas fa-baby fa-3x" style="margin-left: 10px;"></i>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="https://img.icons8.com/ios/512/calendar.png" style="width: 200px; height: 150px;" alt="Calendar Icon" class="img-fluid">
                        <h3>Pregnancy Tracking</h3>
                        <p>Track your pregnancy milestones with ease.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="https://img.icons8.com/ios/512/pen.png" style="width: 200px; height: 150px;" alt="Pen Icon" class="img-fluid">
                        <h3>Health Education</h3>
                        <p>Access valuable health resources and information.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="https://img.icons8.com/ios/512/phone.png" style="width: 200px; height: 150px;" alt="Landline Icon" class="img-fluid">
                        <h3>Doctor On-Call</h3>
                        <p>Get medical advice from qualified professionals.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <p>&copy; 2024 BridgingHealth. All rights reserved.</p>
                <p>Contact us at <a href="mailto:info@bridginghealth.com">info@bridginghealth.com</a></p>
                <p>
                    <a href="{{ route('privacy') }}">Privacy Policy</a> | <a href="{{ route('terms') }}">Terms of Service</a>
                </p>
            </div>
        </footer>

    </div><!-- End Main Content -->

    <!-- JavaScript to toggle sidebar visibility -->
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            if (sidebar.style.width === '50px') {
                sidebar.style.width = '250px';
                document.querySelector('.main-content').style.marginLeft = '250px';
                document.querySelector('.minimize-btn').innerText = '☰';
            } else {
                sidebar.style.width = '50px';
                document.querySelector('.main-content').style.marginLeft = '50px';
                document.querySelector('.minimize-btn').innerText = '◉';
            }
        }
    </script>
    
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
