<?php

session_start();

$member_no = trim($_POST['member_no'] ?? '');

$name = trim($_POST['name'] ?? '');

$address = trim($_POST['address'] ?? '');

$phone = trim($_POST['phone'] ?? '');

$errors = [];

if ($member_no === '') {

    $errors[] = "Member number is required.";

}

if ($name === '') {

    $errors[] = "Name is required.";

}

if (!empty($errors)) {

    $_SESSION['flash'] = [

        'type' => 'error',

        'message' => implode(' ', $errors)

    ];

    header('Location: tambah.php');

    exit;

}

if (!isset($_SESSION['member'])) {

    $_SESSION['member'] = [];

}

$_SESSION['member'][] = [

    'member_no' => $member_no,

    'name' => $name,

    'address' => $address,

    'phone' => $phone

];

$_SESSION['flash'] = [

    'type' => 'success',

    'message' => 'Member successfully added.'

];

header('Location: list.php');

exit;