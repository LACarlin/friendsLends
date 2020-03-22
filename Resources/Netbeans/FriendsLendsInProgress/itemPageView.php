<?php
    session_start();
    $item_value = $_GET['itemname'];
    ?>
<html>
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
        
        const DB_DSN = 'mysql:host=localhost;dbname=friendslends';
        const DB_USER = 'root';
        const DB_PASS = '';

        //testing connection
        try {
            $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //preparing query with ? as a placeholder for our $item_value variable passed from welcome page
        
        $stmt = $pdo->prepare('SELECT * FROM items WHERE headline=?');

        //trying to execute db query and passing in $item_value variable from welcome page to replace '?' placeholder
        
        try {
            $stmt->execute([$item_value]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            $error = $e->errorInfo();
            die();
        }
        
        //fetching our query result as an object called $item
        
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
        
        if ($item->borrower == NULL) {
            echo '<form method = "post" id = "borrow" action = "Handler.php">
        <button type = "submit"> Borrow me now!</button></form>';
        } elseif ($item->borrower !== NULL) {
            echo "<p> So sorry! I'm out on loan!</p>";
        }
        ?>
    </body>
</html>