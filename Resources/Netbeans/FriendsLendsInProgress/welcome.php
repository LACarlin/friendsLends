<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>

        <!--You will need to insert this link below in your 'head' to get the navbar to show--> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">

            body{ font: 14px sans-serif; text-align: center; }
        </style>
    </head>
    <body>

        <!--Paste this section below at the top of your 'body' section for the navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="welcome.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="SARAH'S CREATE ITEM PAGE">Create new item</a>
                <a class="nav-item nav-link" href="SOPHIA'S CONTACT PAGE">Contact</a>
                <a class="nav-item nav-link" href="mydashboard.php">My account dashboard</a>
                <a class="nav-item nav-link" href="logout.php">Log out</a>
            </div>
        </nav>

        <div class="page-header">
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]) . '!'; ?></b></br>
                <h2>Welcome to your hub for borrowing and lending with your friends!</h2></br>
        </div>
        <?php
        const DB_DSN = 'mysql:host=localhost;dbname=friendslends';
        const DB_USER = 'root';
        const DB_PASS = '';

        try {
            $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('SELECT * FROM Items WHERE active=TRUE');

        try {
            $stmt->execute($_GET);
        } catch (PDOException $e) {
            echo $e->getMessage();
            $error = $e->errorInfo();
            die();
        }
        $item = $stmt->fetchALL(PDO::FETCH_ASSOC);
        foreach ($item as $key => $value) {
            $picvar = $value['itempic'];
            $itemname = $value['headline'];
            ?>
            <img src = <?php $picvar; ?></br>
            <h2><a href="itemPageView.php?itemname=<?php echo $itemname ?>"><?php echo $itemname; ?></a></h2></br>
        <?php }
        ?>
    </body>
</html>

