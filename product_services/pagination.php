<?php
// pagination.php
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
