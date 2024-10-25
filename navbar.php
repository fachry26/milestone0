<!-- Link to Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid align-items-center">
        <!-- Logo and Title -->
        <a href="#" class="d-flex align-items-center me-3">
            <img src="../Photo_assets/Screenshot 2024-10-25 034014.png" 
                 class="glow-logo img-fluid" alt="Logo" />
        </a>
        <h1 class="navbar-brand glow-text" style="font-size: 80px;">ACENG'S PIZZA</h1>

        <!-- Toggler for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavbar"
            aria-controls="navbarNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Navbar Items -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sporty-font" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sporty-font active" href="../product_services/htmlpage.php">
                        Made by Customer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sporty-font" data-bs-toggle="modal" data-bs-target="#pizzaPreviewModal">Portfolio</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn sporty-font" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn sporty-font" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>

<!-- JavaScript for RGB Animation -->
<script>
    function rgbGlow() {
        const glowingElements = document.querySelectorAll('.glow-text');
        const logo = document.querySelector('.glow-logo');
        const navbar = document.querySelector('.navbar');
        let hue = 0;

        setInterval(() => {
            const color = `hsl(${hue}, 100%, 60%)`;

            glowingElements.forEach(el => {
                el.style.color = color;
                el.style.filter = `drop-shadow(0 0 15px ${color})`;
            });

            logo.style.filter = `hue-rotate(${hue}deg)`;
            navbar.style.boxShadow = `0 0 15px ${color}, 0 0 30px ${color}`;

            hue = (hue + 1) % 360;
        }, 15);
    }

    window.onload = rgbGlow;
</script>

<style>
/* Navbar Styling */
.navbar {
    background-color: #f8f9fa;
    transition: box-shadow 0.1s ease;
}

/* Glowing Text */
.glow-text {
    font-size: 3rem;
    font-weight: bold;
    margin-left: 10px;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.7),
                 0 0 20px rgba(255, 255, 255, 0.5),
                 0 0 30px rgba(255, 255, 255, 0.3);
    font-family: 'Oswald', sans-serif;
}

/* Glowing Logo Image */
.glow-logo {
    width: 120px;
    height: auto;
    transition: filter 0.1s ease;
}

/* Sporty Font for Navbar Links */
.sporty-font {
    font-family: 'Oswald', sans-serif;
    font-size: 30px;
    letter-spacing: 1px;
    text-transform: uppercase;
}
</style>
