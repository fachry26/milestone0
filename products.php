<?php
// Sample pizza data 
$pizzas = [
    [
        "title" => "Margherita Pizza", 
        "img" => [
            "photo_assets/margherita-pizza-recipe.jpg",
            "photo_assets/margherita-pizza-recipe2.jpg"
        ], 
        "desc" => "A simple pizza with fresh mozzarella, basil, and tomato sauce."
    ],
    [
        "title" => "Pepperoni Pizza", 
        "img" => [
            "https://via.placeholder.com/300x200?text=Pepperoni",
            "https://via.placeholder.com/300x200?text=Pepperoni2"
        ], 
        "desc" => "Loaded with spicy pepperoni slices and mozzarella cheese."
    ],
    [
        "title" => "Veggie Pizza", 
        "img" => [
            "https://via.placeholder.com/300x200?text=Veggie"
        ], 
        "desc" => "A healthy choice packed with colorful veggies and fresh herbs."
    ],
    [
        "title" => "BBQ Chicken Pizza", 
        "img" => [
            "https://via.placeholder.com/300x200?text=BBQ+Chicken"
        ], 
        "desc" => "Topped with grilled chicken and tangy BBQ sauce."
    ],
    [
        "title" => "Hawaiian Pizza", 
        "img" => [
            "https://via.placeholder.com/300x200?text=Hawaiian"
        ], 
        "desc" => "A delicious combination of ham and pineapple."
    ],
    [
        "title" => "Meat Lovers Pizza", 
        "img" => [
            "https://via.placeholder.com/300x200?text=Meat+Lovers"
        ], 
        "desc" => "A meat-packed pizza with pepperoni, sausage, and bacon."
    ],
    [
        "title" => "Four Cheese Pizza", 
        "img" => [
            "https://via.placeholder.com/300x200?text=Four+Cheese"
        ], 
        "desc" => "A cheesy delight with mozzarella, cheddar, blue cheese, and goat cheese."
    ],
    [
        "title" => "Buffalo Chicken Pizza", 
        "img" => [
            "https://via.placeholder.com/300x200?text=Buffalo+Chicken"
        ], 
        "desc" => "Spicy buffalo chicken topped with creamy ranch."
    ],
];

$itemsPerPage = 6;
$totalPizzas = count($pizzas);
$totalPages = ceil($totalPizzas / $itemsPerPage);

// Get the current page number from the URL, default to 1
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$currentPage = max(1, min($currentPage, $totalPages)); // Ensure current page is within range

// Calculate the starting index for the pizzas to display on the current page
$startIndex = ($currentPage - 1) * $itemsPerPage;
$pizzasToShow = array_slice($pizzas, $startIndex, $itemsPerPage);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aceng Company - Products/Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">ACENG'S PIZZA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="mainpage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="products.php">Products/Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#pizzaPreviewModal">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link btn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link btn" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-4" style="margin-top: 10px;">
        <h1>Our Products</h1>
        <p>Check out our delicious pizza options!</p>

        <div class="row">
            <?php foreach ($pizzasToShow as $pizza): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $pizza['img'][0]; ?>" class="card-img-top" alt="<?php echo $pizza['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $pizza['title']; ?></h5>
                        <button class="btn btn-primary preview-btn" 
                                data-bs-toggle="modal" data-bs-target="#pizzaPreviewModal"
                                data-imgs="<?php echo implode(',', $pizza['img']); ?>" 
                                data-title="<?php echo $pizza['title']; ?>"
                                data-desc="<?php echo $pizza['desc']; ?>">
                            Preview
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination Controls -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                    <a class="page-link" href="products.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
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

    <!-- Pizza Preview Modal with Carousel -->
    <div class="modal fade" id="pizzaPreviewModal" tabindex="-1" aria-labelledby="pizzaPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pizzaPreviewModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" id="carousel-items"></div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <p class="mt-3" id="pizza-desc"></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-D0Anf5uokc6XFRoIhO2h1Z/Y1c9K95I3o/rcyDzCtK5eyOd6IFHxIF1ljAANm6ZP" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-bF67rBOZ1FEWJg0y+4G0B8C6MHK0rLSv4KzB3z/Y9HT3xwWUBZuBl//jY9F8D+Tx" crossorigin="anonymous"></script>

    <script>
        const previewButtons = document.querySelectorAll('.preview-btn');
        previewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const imgs = this.getAttribute('data-imgs').split(',');
                const title = this.getAttribute('data-title');
                const desc = this.getAttribute('data-desc');

                // Update modal title and description
                document.getElementById('pizzaPreviewModalLabel').innerText = title;
                document.getElementById('pizza-desc').innerText = desc;

                // Clear existing carousel items
                const carouselItems = document.getElementById('carousel-items');
                carouselItems.innerHTML = '';

                // Populate carousel items
                imgs.forEach((img, index) => {
                    const isActive = index === 0 ? 'active' : '';
                    carouselItems.innerHTML += `
                        <div class="carousel-item ${isActive}">
                            <img src="${img}" class="d-block w-100" alt="Pizza Image ${index + 1}">
                        </div>
                    `;
                });
            });
        });
    </script>
</body>
</html>
