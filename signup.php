<?php
require_once './account.class.php';
require_once './functions.php';

$accountObj = new Account();
session_start();
if (isset($_SESSION['account'])) {
    header('Location: dashboard.php');
}



$firstname = $lastname = $username = $password = $passwordc = '';
$firstname_err = $lastname_err = $username_err = $password_err = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = clean_input($_POST['firstname']);
    $lastname = clean_input($_POST['lastname']);
    $username = clean_input($_POST['username']);
    $password = clean_input($_POST['password']);

    //checking if password contains at least 8 characters
    if (strlen($password) < 8) {
        $password_err = "Password must contain at least 8 characters";
    }

    //checking if password contains at least one number, capital letter, small letter, and special character
    if (!preg_match('/[0-9]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[^a-zA-Z\d]/', $password)) {
        $password_err = "Password must contain at least one number, one capital letter, one small letter, and one special character";
    }

    //password should not contain words the same as its firstname, lastname, and username
    // Password should not contain the same words as firstname, lastname, or username
    if (strpos($password, $firstname) !== false || strpos($password, $lastname) !== false || strpos($password, $username) !== false) {
        $password_err = "Password should not contain your firstname, lastname, or username";
    }

    if (empty($firstname)) {
        $firstname_err = "Firstname is required";
    }

    if (empty($lastname)) {
        $lastname_err = "Lastname is required";
    }

    if (empty($username)) {
        $username_err = "Username is required";
    }

    if (empty($password)) {
        $password_err = "Password is required";
    }

    if ($password != clean_input($_POST['passwordc'])) {
        $password_err = "Passwords do not match";
    }

    if (empty($firstname_err) && empty($lastname_err) && empty($username_err) && empty($password_err)) {
        $accountObj->first_name = $firstname;
        $accountObj->last_name = $lastname;
        $accountObj->username = $username;
        $accountObj->password = $password;
        $accountObj->role = 'customer';

        if ($accountObj->add()) {
            header('Location: login.php');
        } else {
            echo "Error while adding the account";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>

<body>
    <h1>Sign up page</h1>
    <form action="signup.php" method="post">
        <p><?php echo $firstname_err ?></p>
        <label for="">First Name:</label><br>
        <input type="text" name="firstname" placeholder="Firstname">
        <br>
        <p><?php echo $lastname_err ?></p>
        <label for="">Last Name:</label><br>
        <input type="text" name="lastname" placeholder="Lastname">
        <br>
        <p><?php echo $username_err ?></p>
        <label for="">Username:</label><br>
        <input type="text" name="username" placeholder="Username">
        <br>
        <p><?php echo $password_err ?></p>
        <label for="">Password:</label><br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <label for="">Confirm Password:</label><br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <input type="submit" value="SignUp">
    </form>
    <br>
    <a href="login.php">Login</a>
</body>

</html>