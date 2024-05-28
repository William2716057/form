<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);

    // Basic email validation
    if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Process form data
        echo "<h1>Thank you, $name!</h1>";
        echo "<p>We have received your email address: $email</p>";

        // Save data to CSV file
        $data = [$name, $email, $phone, $address];
        $file = 'data.csv';
        if (!file_exists($file)) {
            $header = ['Name', 'Email', 'Phone', 'Address'];
            file_put_contents($file, implode(',', $header) . PHP_EOL);
        }
        file_put_contents($file, implode(',', $data) . PHP_EOL, FILE_APPEND);
    } else {
        echo "<h1>Error</h1>";
        if (empty($name) || empty($email)) {
            echo "<p>All fields are required.</p>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Invalid email address.</p>";
        }
    }
} else {
    echo "<h1>Error</h1>";
    echo "<p>Invalid request method.</p>";
}
?>
