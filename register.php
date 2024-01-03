<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    // Basic validations (you can add more as needed)
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Perform additional validations and database operations here
        // For simplicity, this example only echoes the submitted data
        echo "Registration successful! <br>";
        echo "Username: $username <br>";
        echo "Email: $email";
        // You can add code to insert data into a database or perform other actions.
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

