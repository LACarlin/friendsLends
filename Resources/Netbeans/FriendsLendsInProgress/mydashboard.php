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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <link href="CSS-stylesheet/FriendsLendsCSS.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            body{ font: 14px sans-serif; text-align: center; }
        </style>
    </head>

    <body>
        <img src="user-images/AmysLogo.png" alt="logo" align="left" width="200px"/>
        <!--Paste this section below at the top of your 'body' section for the navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="welcome.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="createnewitem.php">Create new item</a>
                <a class="nav-item nav-link" href="contact.php">Contact</a>
                <a class="nav-item nav-link" href="mydashboard.php">My account dashboard</a>
                <a class="nav-item nav-link" href="logout.php">Log out</a>
            </div>
        </nav>

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
                        echo '<img src="' . $row['userpic'] . '"alt="Profile Pic" style="width:140px;height:auto;">' . "<br>" .
                        "<h4>" . 'Username:  ' . $row['username'] . "</h4>" . "<h4>" . 'Name:  ' . $row['firstname'] . " " . $row['surname'] . "</h4>" . "<h4>" . "Your Groups:" . $row['groupid1'] . "</h4>";
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

    </body>
</html>


