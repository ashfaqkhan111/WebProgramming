<?php

session_start();

require __DIR__ . '/../includes/connection.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Lcation: addBook.php');
    exit;
}

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

if ($year === '' || !filter_var($year, FILTER_VALIDATE_INT)){
    $errors[] = 'Year must be a valid integer';
}

if ($stock ==='' || !filter_var($stock, FILTER_VALIDATE_INT)){
    $errors[] = 'Stock must be a valid integer';
}



// if (!isset($_SESSION['book'])) {

//     $_SESSION['book'] = [];

// }

$stmt = $pdo->prepare("insert into books (title,author,year,isbn,stock,category) values(:title, :author, :year, :isbn, :stock, :category) RETURNING id");

$stmt -> execute ([
    'title' => $title,
    'author' => $author,
    'year' => (int)$year,
    'isbn' => $isbn !== ''? $isbn : null,
    'stock' => (int)$stock,
    'category' => $category
]);
// $_SESSION['book'][] = [

//     'title' => $title,

//     'author' => $author,

//     'year' => (int) $year,

//     'isbn' => $isbn,

//     'stock' => (int) $stock,

//     'category' => $category

// ];

$_SESSION['flash'] = [

    'type' => 'success',

    'message' => 'Book successfully added.'

];

header('Location: list.php');

exit;