<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aceng Company</title>
    <link rel="stylesheet" type="text/css" href="style_assets/style_1.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <?php include 'navbar/navbar.php'; ?>
    </header>

    <main class="container mt-3">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <div class="d-flex flex-column align-items-start">
                    <img src="Photo_assets/Screenshot 2024-10-25 034946.png" class="img-fluid mb-3 w-75"
                        alt="Company Logo" />
                    <h1 class="display-5 fw-bold">
                        <span id="typing-text"></span>
                        <span class="cursor">|</span> <!-- Blinking cursor -->
                    </h1>
                    <p class="lead">We sell the best pizza like it’s made by a PhD! (pizzahutDiploma)</p>
                    <p>Explore our products and get in touch with us!</p>
                    <button class="btn btn-start"
                        style="font-size: 3rem; padding: 20px 40px; border: none; border-radius: 50px; transition: all 0.3s ease; text-transform: uppercase; box-shadow: 0 0 15px rgba(255, 255, 255, 0.7), 0 0 30px rgba(255, 255, 255, 0.5), 0 0 45px rgba(255, 255, 255, 0.3);">
                        START PIZZA
                    </button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row row-cols-2 g-4">
                    <div class="col">
                        <p class="lead fw-bold text-center typing-effect" style="font-size: 1.5rem;">
                            “I followed my heart, and it led me to the pizza!”
                        </p>
                    </div>
                    <div class="col">
                        <p class="lead fw-bold text-center typing-effect" style="font-size: 1.5rem;">
                            “Every pizza is a personal pizza if you believe in yourself!”
                        </p>
                    </div>
                    <div class="col">
                        <p class="lead fw-bold text-center typing-effect" style="font-size: 1.5rem;">
                            “A slice a day keeps sadness away!”
                        </p>
                    </div>
                    <div class="col">
                        <p class="lead fw-bold text-center typing-effect" style="font-size: 1.5rem;">
                            “Life happens. Pizza helps.”
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="login.php">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Username</label>
                            <input type="text" class="form-control" id="loginEmail" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="register.php" onsubmit="return validateRegisterForm()">
                        <div class="mb-3">
                            <label for="registerName" class="form-label">Username</label>
                            <input type="text" class="form-control" id="registerName" name="registerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Main typing effect for the header text
        function typeEffectText(element, text, speed) {
            let i = 0;
            function typing() {
                if (i < text.length) {
                    element.textContent += text.charAt(i);
                    i++;
                    setTimeout(typing, speed);
                }
            }
            typing();
        }




        // Blinking cursor effect
        function blinkCursor() {
            const cursor = document.querySelector('.cursor');
            setInterval(() => {
                cursor.style.visibility = cursor.style.visibility === 'hidden' ? 'visible' : 'hidden';
            }, 500); // Adjust blink speed
        }

        // Typing effect for multiple elements
        function applyTypingEffects() {
            document.querySelectorAll('.typing-effect').forEach((el, index) => {
                const text = el.textContent;
                el.textContent = ""; // Clear existing text
                setTimeout(() => {
                    typeEffectText(el, text, 75);
                }, index * 2000); // Delay each typing effect
            });
        }

        // Button RGB glow effect
        function rgbGlowButton() {
            const button = document.querySelector('.btn-start');
            let hue = 0;

            setInterval(() => {
                const color = `hsl(${hue}, 100%, 50%)`;
                button.style.backgroundColor = color;
                hue = (hue + 1) % 360;
            }, 10);
        }

        // Start all effects when the page loads
        window.onload = function () {
            typeEffectText(document.getElementById('typing-text'), "Welcome to Aceng's Pizza!", 100);
            blinkCursor();
            applyTypingEffects();
            rgbGlowButton();
        };
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>