<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        h1 {
            text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
            background-image: url("clg.jpeg");
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            width: 500px;
        }
        label {
            margin-bottom: 10px;
        }
        label span {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"],
        textarea {
            width: calc(100% - 18px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }
        button {
            padding: 8px 16px;
            border: none;
            background-color: gray;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        button:hover {
            background-color: ;
        }
        .required::after {
            content: ' *';
            color: red;
        }
        .error-message {
            color: blue;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
       <h1>Registration Form</h1>
        <label>
            <span class="required">Name:</span>
            <input type="text" id="name" name="name" required>
            <span class="error-message">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nameErr = '';
                    if (isset($_POST['name'])) {
                        $name = $_POST['name'];
                        if (empty($name)) {
                            $nameErr = 'Please enter your name.';
                        } elseif (preg_match('/\d/', $name)) {
                            $nameErr = 'Name should not contain digits.';
                        }
                    } else {
                        $nameErr = 'Name field is required.';
                    }
                    echo $nameErr;
                }
                ?>
            </span>
        </label>

        <label>
            <span class="required">Email:</span>
            <input type="text" id="email" name="email" required>
            <span class="error-message">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $emailErr = '';
                    if (isset($_POST['email'])) {
                        $email = $_POST['email'];
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $emailErr = 'Please enter a valid email address.';
                        }
                    } else {
                        $emailErr = 'Email field is required.';
                    }
                    echo $emailErr;
                }
                ?>
            </span>
        </label>

        <label>
            <span class="required">Phone number:</span>
            <input type="text" id="phone" name="phone" required pattern="\d{10}" title="Phone number should be 10 digits">
            <span class="error-message">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $phoneErr = '';
                    if (isset($_POST['phone'])) {
                        $phone = $_POST['phone'];
                        if (!preg_match('/^\d{10}$/', $phone)) {
                            $phoneErr = 'Phone number should be 10 digits.';
                        }
                    } else {
                        $phoneErr = 'Phone number field is required.';
                    }
                    echo $phoneErr;
                }
                ?>
            </span>
        </label>

        <label>
            <span class="required">Password:</span>
            <input type="password" id="password" name="password" required>
            <span class="error-message">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $passwordErr = '';
                    if (isset($_POST['password'])) {
                        $password = $_POST['password'];
                        if (strlen($password) < 6) {
                            $passwordErr = 'Password must be at least 6 characters long.';
                        }
                    } else {
                        $passwordErr = 'Password field is required.';
                    }
                    echo $passwordErr;
                }
                ?>
            </span>
        </label>

        <label>
            <span class="required">Confirm Password:</span>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <span class="error-message">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $confirmPasswordErr = '';
                    if (isset($_POST['password']) && isset($_POST['confirm_password'])) {
                        $password = $_POST['password'];
                        $confirmPassword = $_POST['confirm_password'];
                        if ($password !== $confirmPassword) {
                            $confirmPasswordErr = 'Passwords do not match.';
                        }
                    } else {
                        $confirmPasswordErr = 'Both Password and Confirm Password fields are
required.';
                    }
                    echo $confirmPasswordErr;
                }
                ?>
            </span>
        </label>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

