<?php
session_start();

if (isset($_SESSION['account'])) {
    if (!$_SESSION['account']['is_staff']) {
        header('location: login.php');
    }
    if ($_SESSION['account']['role'] == 'customer') {
        header('location: customerPage.php');
    }
} else {
    header('location: login.php');
}
?>
<h2><?= 'Ad astra abyssosque, Welcome ' . $_SESSION['account']['first_name'] ?></h2>

<a href="product.php">Product</a>

<br>

<a href="logout.php">Logout</a>