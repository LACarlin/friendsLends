<?php
session_start();
$item_value = $_GET['itemname'];
require_once "config.php";
?>
<html>
    <head>
        <title><?php echo $item_value; ?></title>

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="CSS-stylesheet/FriendsLendsCSS.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!-- Sarah Navbar -->
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><img src="user-images/AmysLogo.png" alt="Friends Lends" style="width: 200px;"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
         <a class="nav-link active" href="welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="createnewitem.php">Create New Item</a>
      </li>
      <li class="nav-item active">
         <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="mydashboard.php">My Account Dashboard</a>
      </li>
      <li class="nav-item active">
         <a class="nav-link" href="logout.php">Logout</a>
      </li>
         </ul>
      </div>
</nav>
        </div>
       <!-- Sarah Navbar End -->  

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
        <?php echo '<img src="' . $item->itempic . '" alt="Item Pic" style="float:center;width:200px;height:auto;margin-right:15px;">'; ?>
        <h2><?php echo "Description:" . "</br>" . "<p>" . $item->description;
        "</p>"
        ?></h2></br>
        <h2><?php echo "Terms:" . "</br>" . "<p>" . $item->terms;
            "</p>"
        ?></h2></br>
        <h2><?php echo "I belong to:" . "</br>" . "<p>" . $item->owner;
            "</p>"
        ?></h2></br>
        <h2><?php echo "Pick me up at:" . "</br>" . "<p>" . $item->pickuplocation;
            "</p>"
        ?></h2></br>

        <?php
//if there's no borrower set in the $item object,
//display the 'borrow' button, and if there is a borrower set, display a 'sorry' message
        $NameofItem = $item->headline;
        $uName = $_SESSION["uid"];
        if ($item->borrower == NULL) {
            echo '<form method = "post" action = "">
        <button type = "submit" name = "borrow" value = "borrow button"> Borrow me now!</button></form>';
        } elseif ($item->borrower !== NULL) {
            echo "<h2> So sorry! I'm out on loan until $item->end_loan! Try borrowing me later.</h2></br>";
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


