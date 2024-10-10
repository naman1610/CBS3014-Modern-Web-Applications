<?php
session_start();

// Initialize the inventory array if it doesn't exist
if (!isset($_SESSION['inventory'])) {
    $_SESSION['inventory'] = [];
}

// Function to add a new item
function addItem($name, $category, $price, $quantity, $code) {
    $_SESSION['inventory'][] = [
        'name' => $name,
        'category' => $category,
        'price' => $price,
        'quantity' => $quantity,
        'code' => $code
    ];
}

// Function to search for an item
function searchItem($query) {
    $results = [];
    foreach ($_SESSION['inventory'] as $item) {
        if (stripos($item['name'], $query) !== false) {
            $results[] = $item;
        }
    }
    return $results;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        addItem($_POST['name'], $_POST['category'], $_POST['price'], $_POST['quantity'], $_POST['code']);
        $message = "Item added successfully!";
    } elseif (isset($_POST['search'])) {
        $searchResults = searchItem($_POST['query']);
    }
}

// Include the HTML template
include 'template.html';