<html>
    <?php
    session_start();
    $item_value = $_GET['itemname'];
    require_once "config.php";
    ?>
    <head>
        <title><?php echo $item_value; ?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <!--Navbar section -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="welcome.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="SARAH'S CREATE ITEM PAGE">Create new item</a>
                <a class="nav-item nav-link" href="SOPHIA'S CONTACT PAGE">Contact</a>
                <a class="nav-item nav-link" href="SANDY'S DASHBOARD PAGE">My account dashboard</a>
                <a class="nav-item nav-link" href="logout.php">Log out</a>
            </div>
        </nav>

        <?php
        //setting constants for php connection


        $stmt = $pdo->prepare('SELECT * FROM items WHERE headline=?');
        $stmt->execute([$item_value]);
        $item = $stmt->fetch(PDO::FETCH_OBJ);
        ?>

        <!--echoing each part of page structure as $obj->attribute -->

        <h1><?php echo $item->headline; ?></h1></br>
        <img src = <?php echo $item->itempic; ?></br>
        <p><?php echo "Description:" . "</br>" . $item->description; ?></p></br>
        <p><?php echo "Terms:" . "</br>" . $item->terms; ?></p></br>
        <p><?php echo "I belong to:" . "</br>" . $item->owner; ?></p></br>
        <p><?php echo "Pick me up at:" . "</br>" . $item->pickuplocation; ?></p></br>

        <?php
        //if there's no borrower set in the $item object, 
        //display the 'borrow' button, and if there is a borrower set, display a 'sorry' message
        $NameofItem = $item->headline;
        $uName = $_SESSION["uid"];
        if ($item->borrower == NULL) {
            echo '<form method = "post" action = "">
        <button type = "submit" name = "borrow" value = "borrow button"> Borrow me now!</button></form>';
        } elseif ($item->borrower !== NULL) {
            echo "<p> So sorry! I'm out on loan! Try borrowing me later.</p></br>";
        }
        if (isset($_POST['borrow'])) {
            $newstmt = $pdo->prepare('UPDATE items SET borrower=? WHERE headline=?');
            $newstmt->execute([$uName, $NameofItem]);
            if ($stmt->execute()) {
                header("Location: SuccessfulBorrow.php");
                exit();
            } else {
                echo "Sorry! There's a connection problem. Please contact our administrators." . "</br";
            }
        }
        ?>
    </body>
</html>