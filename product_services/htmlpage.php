<?php
include 'pizza_data.php';
include 'pagination.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aceng Company - Products/Services</title>
    <link rel="stylesheet" type="text/css" href="../style_assets/style_1.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <?php include '../navbar.php'?>
    </header>

    <main class="container mt-4">
        <h1>Our Products</h1>
        <p>Check out our delicious pizza options!</p>

        <!--pizza sliding-->
        <div class="row">
            <?php foreach ($pizzasToShow as $pizza): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <!-- Carousel for Pizza Images -->
                        <div id="carousel<?php echo htmlspecialchars($pizza['title']); ?>" class="carousel slide"
                            data-bs-ride="carousel" data-bs-interval="1700">
                            <div class="carousel-inner">
                                <?php foreach ($pizza['img'] as $index => $img): ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="<?php echo $img; ?>" class="d-block w-100"
                                            alt="<?php echo htmlspecialchars($pizza['title']); ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carousel<?php echo htmlspecialchars($pizza['title']); ?>"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carousel<?php echo htmlspecialchars($pizza['title']); ?>"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($pizza['title']); ?></h5>
                            <button class="btn btn-primary preview-btn" data-bs-toggle="modal"
                                data-bs-target="#pizzaPreviewModal" data-imgs="<?php echo implode(',', $pizza['img']); ?>"
                                data-title="<?php echo htmlspecialchars($pizza['title']); ?>"
                                data-desc="<?php echo htmlspecialchars($pizza['desc']); ?>">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <!-- Pizza Preview Modal -->
        <div class="modal fade" id="pizzaPreviewModal" tabindex="-1" aria-labelledby="pizzaPreviewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pizzaPreviewModalLabel">Pizza Preview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="pizzaCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1000">
                            <div class="carousel-inner" id="carouselImages"></div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#pizzaCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#pizzaCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="htmlpage.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </main>

    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="text-center p-3">
            &copy; 2024 Aceng's Pizza. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pizzas = <?php echo json_encode($pizzasToShow); ?>; // Pass the PHP array to JS

            // Add event listener to the preview buttons
            document.querySelectorAll('.preview-btn').forEach((button, index) => {
                button.addEventListener('click', function () {
                    const pizza = pizzas[index];
                    const imgs = pizza.img;
                    const title = pizza.title;
                    const desc = pizza.desc;

                    // Clear previous carousel items
                    const carouselImages = document.getElementById('carouselImages');
                    carouselImages.innerHTML = '';

                    // Create carousel items
                    imgs.forEach((img, idx) => {
                        const activeClass = idx === 0 ? 'active' : '';
                        const carouselItem = `
                            <div class="carousel-item ${activeClass}">
                                <img src="${img}" class="d-block w-100" alt="${title}">
                            </div>
                        `;
                        carouselImages.innerHTML += carouselItem;
                    });

                    // Set modal title and show the modal
                    document.getElementById('pizzaPreviewModalLabel').textContent = title;
                    const modal = new bootstrap.Modal(document.getElementById('pizzaPreviewModal'));
                    modal.show();
                });
            });
        });
    </script>

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

</body>

</html>