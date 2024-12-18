<?php
session_start();

// User credentials
$my_email = "shipohwost2003@gmail.com";
$my_pass = "12341234";

// Logout functionality
if (!empty($_GET['logout']) && $_GET['logout'] === "yes") {
    session_unset();
    session_destroy();
    header("Location: /");
    exit;
}

// Login functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_email = $_POST['email'] ?? '';
    $user_pass = $_POST['pass'] ?? '';

    if ($user_email === $my_email && $user_pass === $my_pass) {
        $_SESSION['username'] = $user_email;
        $_SESSION['authenticated'] = true;
        header("Location: /");
        exit;
    } else {
        $error_message = "Invalid email or password.";
    }
}

$is_authenticated = $_SESSION['authenticated'] ?? false;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Session Demo - Cyberpunk 2077</title>
    <style>
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: #e0e0e0;
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            color: #ff9800;
            text-shadow: 0 0 10px #ff9800, 0 0 20px #ff5722;
            font-weight: bold;
            text-align: center;
        }
        .form-label {
            color: #03dac6;
            font-weight: bold;
        }
        .form-control {
            background-color: #2c2c54;
            border: 2px solid #03dac6;
            color: #e0e0e0;
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
        }
        .form-control:focus {
            border-color: #ff9800;
            box-shadow: 0 0 5px #ff9800;
        }
        .btn-primary {
            background: linear-gradient(90deg, #ff9800, #ff5722);
            border: none;
            color: #fff;
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-primary:hover {
            transform: scale(1.1);
            background: linear-gradient(90deg, #ff5722, #ff9800);
        }
        .btn-danger {
            background: linear-gradient(90deg, #d50000, #c51162);
            border: none;
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .btn-danger:hover {
            transform: scale(1.1);
        }
        .alert-danger {
            background-color: #b71c1c;
            color: #ffcccb;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #f44336;
        }
        .neon-border {
            border: 2px solid;
            border-image-slice: 1;
            border-width: 3px;
            border-image-source: linear-gradient(90deg, #ff9800, #ff5722);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 20px #ff9800, 0 0 40px #ff5722;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (!$is_authenticated): ?>
                <h2 class="text-center">Login</h2>
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($error_message) ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="/">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="pass" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            <?php else: ?>
                <h2 class="text-center">Welcome Back</h2>
                <p class="text-center">You have successfully logged in.</p>
                <div class="text-center">
				<a href="/?logout=yes" class="btn btn-danger">Logout</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>