<?php
session_start();

$valid_email = 'shipohwost2003@gmail.com';
$valid_pass = '12345';

if (isset($_GET['logout']) && $_GET['logout'] == 'yes') {
    setcookie('email', '', time() - 3600);
    setcookie('pass', '', time() - 3600);
    session_destroy();
    header('Location: /'); 
    exit();
}

if (isset($_COOKIE['email']) && isset($_COOKIE['pass']) && !isset($_SESSION['user'])) {
    $_SESSION['user'] = $_COOKIE['email'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['pass']) && $_POST['pass'] != "") {
        if ($_POST['email'] == $valid_email && $_POST['pass'] == $valid_pass) {
            setcookie('email', $_POST['email'], time() + 3600);
            setcookie('pass', $_POST['pass'], time() + 3600);
            $_SESSION['user'] = $_POST['email'];
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            header('Location: ' . $_SERVER['PHP_SELF'] . '?error=1');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>authentification</title>
    <style>
        body {
            background: #000;
            color: #0f0;
            font-family: 'Courier New', monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            border: 2px solid #0f0;
            padding: 20px;
            background: #111;
            box-shadow: 0 0 10px #0f0;
        }

        h1 {
            color: #0f0;
            text-align: center;
            margin-bottom: 20px;
        }

        .error-msg {
            color: #f00;
            text-align: center;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input {
            background: #000;
            border: 1px solid #0f0;
            color: #0f0;
            padding: 10px;
            font-family: 'Courier New', monospace;
        }

        input:focus {
            outline: none;
            border-color: #0f0;
            box-shadow: 0 0 5px #0f0;
        }

        button {
            background: #000;
            border: 1px solid #0f0;
            color: #0f0;
            padding: 10px;
            font-family: 'Courier New', monospace;
            cursor: pointer;
        }

        button:hover {
            background: #0f0;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['user'])): ?>
            <h1>Welcome, <?= htmlspecialchars($_SESSION['user']) ?></h1>
            <a href="?logout=yes"><button>Logout</button></a>
        <?php else: ?>
            <?php if (isset($_GET['error'])): ?>
                <div class="error-msg">Access Denied</div>
            <?php endif; ?>
            
            <form method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="pass" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
