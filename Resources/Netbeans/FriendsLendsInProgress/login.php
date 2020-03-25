<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "config.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Prepare a select statement
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && ($_POST['groupid'] === $user['groupid1'] | $_POST['groupid'] === $user['groupid2'] | $_POST['groupid'] === $user['groupid3']) && password_verify($_POST['password'], $user['password'])) {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['username'] = filter_input(INPUT_POST, 'username');
        $_SESSION["uid"] = $user['uid'];
        // echo 'Welcome ' . $_SESSION['username'];
        header('Location: welcome.php');
    } else {
        // Display an error message if password is not valid
        echo "Your logon details have not been recognised";
    }
}

// Close statement
unset($stmt);

// Close connection
unset($pdo);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link href="CSS-stylesheet/FriendsLendsCSS.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>
    </head>
    <body>
        <img src="user-images/AmysLogo.png" alt="logo" align="left" width="300px"/>
        <div class="wrapper">
            <h2>Login</h2>
            <p>Please fill in your credentials to login.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <label>Group ID</label>
                    <input type="text" name="groupid" class="form-control" autocomplete='off' required>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" autocomplete='off' required>
                </div>    
                <div>
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Don't have an account? </br><a href="register.php">Sign up now</a>.</p>
            </form>
        </div>
    </body>
</html>


