<?php

session_start();

require __DIR__ . '/../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: addMember.php');
    exit;
}

$member_number = trim($_POST['member_no'] ?? '');

$name = trim($_POST['name'] ?? '');

$address = trim($_POST['address'] ?? '');

$phone_number = trim($_POST['phone'] ?? '');

$errors = [];

if ($member_number === '') {

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

    header('Location: addMember.php');

    exit;

}

$stmt = $pdo -> prepare("insert into member (member_number, name, address, phone_number) values (:member_number, :name, :address, :phone_number) RETURNING id");

$stmt -> execute([
    'name' => $name,
    'member_number' => $member_number,
    'address' => $address !== ''? $address : null,
    'phone_number' => $phone_number !== ''? $phone_number : null
]);

// if (!isset($_SESSION['member'])) {

//     $_SESSION['member'] = [];

// }

// $_SESSION['member'][] = [

//     'member_no' => $member_no,

//     'name' => $name,

//     'address' => $address,

//     'phone' => $phone

// ];

$_SESSION['flash'] = [

    'type' => 'success',

    'message' => 'Member successfully added.'

];

header('Location: list.php');

exit;