<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);

    if (!empty($name) && !empty($email)) {
        echo "<h1>Thank you, $name!</h1>";
        echo "<p>We have received your email address: $email</p>";
    } else {
        echo "<h1>Error</h1>";
        echo "<p>All fields are required.</p>";
    }
} else {
    echo "<h1>Error</h1>";
    echo "<p>Invalid request method.</p>";
}
?>