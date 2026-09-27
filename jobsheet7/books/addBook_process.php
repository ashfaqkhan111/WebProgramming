<?php

session_start();

$title = trim($_POST['title'] ?? '');
$author = trim($_POST['author'] ?? '');
$year = $_POST['year'] ?? '';
$isbn = trim($_POST['isbn'] ?? '');
$stock = $_POST['stock'] ?? '';
$category = trim($_POST['category'] ?? '');

$errors = [];

if ($title === '') {
    $errors[] = "Title is required.";
}

if ($author === '') {
    $errors[] = "Author is required.";
}

if (!is_numeric($year) || $year < 1900 || $year > 2026) {
    $errors[] = "The year must be between 1900 and 2026.";
}

if (!is_numeric($stock) || $stock < 0) {
    $errors[] = "Stock cannot be negative.";
}

if (!empty($errors)) {

    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => implode(' ', $errors)
    ];

    header('Location: addBook.php');

    exit;
}

if (!isset($_SESSION['book'])) {

    $_SESSION['book'] = [];

}

$_SESSION['book'][] = [

    'title' => $title,

    'author' => $author,

    'year' => (int) $year,

    'isbn' => $isbn,

    'stock' => (int) $stock,

    'category' => $category

];

$_SESSION['flash'] = [

    'type' => 'success',

    'message' => 'Book successfully added.'

];

header('Location: list.php');

exit;