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
                <a class="nav-item nav-link" href="mydashboard.php">My account dashboard</a>
                <a class="nav-item nav-link" href="logout.php">Log out</a>
            </div>
        </nav>

        <?php
        //setting start loan timestamp
        $timestamp = date('Y-m-d');

        //adding 1 week to start loan
        //have to convert a date string back to a time string
        $stamped_time = strtotime($timestamp);

        //adding 1 week to the time of $timestamp  
        $end_date = strtotime("+1 weeks", $stamped_time);

        //setting variable as the end loan date, telling php to convert above time back to a date
        $end_loan = date('Y-m-d', $end_date);

        $stmt = $pdo->prepare('SELECT * FROM items WHERE headline = ?');
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
    echo "<p> So sorry! I'm out on loan until $item->end_loan! Try borrowing me later.</p></br>";
}
if (isset($_POST['borrow'])) {
    $newstmt = $pdo->prepare('UPDATE items SET borrower=?, start_loan=?, end_loan=? WHERE headline=?');
    $newstmt->execute([$uName, $timestamp, $end_loan, $NameofItem]);
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


