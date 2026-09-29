<?php

session_start();

$__jobsheetRoot = dirname(__DIR__);
$__scriptDir = dirname($_SERVER['SCRIPT_FILENAME']);

$__rel = ltrim(
    str_replace('\\', '/', substr(
        $__scriptDir,
        strlen($__jobsheetRoot)
    )),
    '/'
);
$base = $__rel === '' ? '' : str_repeat('../', substr_count($__rel, '/')+1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initail-scale=1">

    <title>SIMPUS<?php echo isset($page_title) ? ' | '. $page_title: ''; ?></title>

    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>

<body>
    <header>
        <h1>SIMOUS-Mini</h1>

        <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776;</button>

        <nav>
            <ul>
                <li>
                    <a href="<?php echo $base;?>index.php">Home</a>
                   
                </li>
                <li>
                     <a href="<?php echo $base; ?>books/list.php">Book List</a>
                   
                </li>
                <li>
                     <a href="<?php echo $base; ?>books/addBook.php">Add Book</a>
                </li>

                <li>
                    <a href="<?php echo $base; ?>members/list.php">Members List</a>
                </li>

                <li>
                    <a href="<?php echo $base; ?>members/addMember.php">Add member</a>
                </li>
            </ul>
        </nav>
    </header>
<main>
