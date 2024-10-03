<?php
session_start();

if (!isset($_SESSION['account'])) {
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Page</title>
</head>

<body>
    <h2><?= 'Ad astra abyssosque. Welcome my dear ' . $_SESSION['account']['first_name'] ?></h2>

    <a href="logout.php">Logout</a>
</body>

</html>