<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file to make the connection to the database
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>My Account Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <link href="CSS-stylesheet/FriendsLendsCSS.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            body{ font: 14px sans-serif; text-align: center; }
        </style>
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

        <div>         
            <h1>Hey there <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, welcome to your dashboard!</h1>           
        </div>
        <br>

        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-1" style="background-color:#FFFFFF;">
                </div>

                <div class="col-sm-3" style="background-color:#00FFC5;">
                    <h3>Your Details</h3>

                    <?php
                    //displays logged in user's details
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE uid = ?");
                    $stmt->execute([$_SESSION['uid']]);
                    foreach ($stmt as $row) {
                        echo '<img src="' . $row['userpic'] . '"alt="Profile Pic" style="width:140px;height:auto;">' . "<br>";
                        echo '<h4> Username:  ' . $row['username'] ."</h4>";
                        echo '<h4> Name:  ' . $row['firstname'] . " " . $row['surname'] . "</h4>";
                        echo '<h4>Your Groups:<br>';
                    echo $row['groupid1'].'<br>';
                    if ($row['groupid2'] !== NULL){
                        echo $row['groupid2']."<br>";
                        };
                    if ($row['groupid3'] !== NULL){
                        echo $row['groupid3']."</h4><br>";
                        };    
                    echo '<br>';    
                    }
                    unset($stmt);

                    //displays logged in user's address
                    $stmt = $pdo->prepare("SELECT * FROM addresses WHERE userid = ?");
                    $stmt->execute([$_SESSION['uid']]);
                    foreach ($stmt as $row) {
                        echo "<h4>" . 'Address:  ' . $row['addrline1'] . "</h4>" . "<h4>" . 'City:  ' . $row['city'] . "</h4>" . "<h4>" . 'Postcode: ' . $row['postcode'] . "</h4>" . "<h4>" . 'Telephone: ' . $row['contactnumber'] . "</h4>";
                    }
                    unset($stmt);
                    ?>   
                    <br>

                    <p><a href="reset-password.php" class="btn btn-primary">Reset Your Password</a></p> 
                </div>

                <div class="col-sm-1" style="background-color:#FFFFFF;">
                </div>

                <div class="col-sm-6" style="background-color:#CCF9FF;" align="left">
                    <h3>Your Listings</h3>
                    <p align='left'>

                        <?php
//displays logged in user's listings
//$stmt = $pdo->prepare("SELECT * FROM items WHERE owner = ?");
                        $stmt = $pdo->prepare("SELECT items.iid, items.headline, items.description, items.itempic, items.owner, items.borrower, items.start_loan, items.end_loan, users.firstname FROM items INNER JOIN users ON items.owner=users.uid WHERE owner = ?");
                        $stmt->execute([$_SESSION['uid']]);
                        foreach ($stmt as $row) {
                            echo '<img src="' . $row['itempic'] . '"alt="Item Pic" style="float:right;width:40px;height:auto;margin-right:15px;">';
                            echo '<a href="itemPageView.php?itemname=' . $row['headline'] . '">' . $row['headline'] . '</a>' . "<br>";
                            echo 'Description:  ' . $row['description'] . "<br>";
                            if ($row['borrower'] !== NULL) {
                                echo 'Out on loan until ' . $row['end_loan'] . "<br>";
                            } else {
                                echo 'Not currently on loan';
                            }
                            echo '<a href="mydashboard.php" class="btn btn-primary" style="float:right">Update Listing</a>' . "<br>" . "<br>" . "<br>";
                        }
                        unset($stmt);
                        ?>
                </div>

                <div class="col-sm-1" style="background-color:#FFFFFF;">
                </div>            

            </div>

        </div>
        <br>
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-1" style="background-color:#FFFFFF;">
                </div>    

                <div class="col-sm-3" style="background-color:#59BFFF;">
                    <h3>Your Borrowing History</h3>
                    <p align="left">
                        <?php
//displays logged in user's borrowing history
//$stmt = $pdo->prepare("SELECT * FROM history WHERE borrowerid = ? ORDER BY startloan DESC");
                        $stmt = $pdo->prepare("SELECT items.headline, items.itempic, history.startloan, history.endloan FROM history INNER JOIN items ON history.itemid=items.iid WHERE borrowerid = ? ORDER BY startloan DESC");
                        $stmt->execute([$_SESSION['uid']]);
                        foreach ($stmt as $row) {
                            echo '<img src="' . $row['itempic'] . '" alt="Item Pic" style="float:right;width:40px;height:auto;margin-right:15px;">';
                            //echo $row['headline']."<br>";
                            echo '<a href="itemPageView.php?itemname=' . $row['headline'] . '">' . $row['headline'] . '</a>' . "<br>";
                            echo 'Borrowed on:  ' . $row['startloan'] . "<br>";
                            echo 'Returned on: ' . $row['endloan'] . "<br>" . "<br>" . "<br>";
                        }
                        unset($stmt);
                        ?>
                    </p>    
                </div>

                <div class="col-sm-1" style="background-color:#FFFFFF;">
                </div>

                <div class="col-sm-6" style="background-color:#C4D8FF;">
                    <h3>Items You're Borrowing</h3>
                    <p align="left">
                        <?php
//displays logged in user's borrowed items
//$stmt = $pdo->prepare("SELECT * FROM items WHERE borrower = ?");
                        $stmt = $pdo->prepare("SELECT items.iid, items.headline, items.description, items.terms, items.owner, items.itempic, items.start_loan, items.end_loan, users.firstname, users.surname FROM items INNER JOIN users ON items.owner=users.uid WHERE borrower = ? ORDER BY start_loan DESC");
                        $stmt->execute([$_SESSION['uid']]);
                        foreach ($stmt as $row) {
                            echo '<img src="' . $row['itempic'] . '" alt="Item Pic" style="float:right;width:auto;height:60px;margin-right:15px;">';

                            echo '<p align="left"><a href="itemPageView.php?itemname=' . $row['headline'] . '">' . $row['headline'] . '</a>' . "<br>";
                            echo $row['description'] . "<br>";
                            if ($row['terms'] !== NULL) {
                                echo 'T&Cs: ' . $row['terms'] . "<br>";
                            };
                            echo 'Owner:  ' . $row['firstname'] . "<br>";
                            echo 'Date borrowed: ' . $row['start_loan'] . "<br>";
                            echo 'Return by: ' . $row['end_loan'];
                            echo '<form method = post action ="">
                <button type ="submit" class="btn btn-primary" name="return" value="Return Button" style="float:left">Return Item</button></form>' . "<br><br><br>";
                            if (isset($_POST['return'])) {
                                $today = date("Y-m-d");
                                $populatehistory = $pdo->prepare("INSERT INTO history(itemid, borrowerid, startloan, endloan)
                                    VALUES (:itemid, :borrowerid, :startloan, :endloan)");
                                $populatehistory->execute([
                                    'itemid' => $row['iid'],
                                    'borrowerid' => $_SESSION['uid'],
                                    'startloan' => $row['start_loan'],
                                    'endloan' => $today
                                ]);
                                $returnitem = $pdo->prepare("UPDATE items SET borrower = NULL, start_Loan =NULL, end_Loan =NULL WHERE headline =?");
                                $returnitem->execute([$row['headline']]);
                                if ($returnitem->execute()) {
                                    echo 'Thanks for returning the ' . $row['headline'] . '!';
                                    exit();
                                } else {
                                    echo "Oh no, something went wrong. Please contact our administrators.";
                                }
                            };
                        }
                        unset($stmt);
                        $conn = null;
                        ?>        
                    </p>
                </div>  

                <div class="col-sm-1" style="background-color:#FFFFFF;">
                </div> 

            </div>
        </div>
        <br>

        <div class="page-footer">
            <p>
                <a href="logout.php" class="btn btn-primary">Sign Out of Your Account</a>
            </p>           
        </div>   
  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>


