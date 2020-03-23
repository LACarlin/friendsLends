<?php
    // Initialize the session
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
                    
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE uid = ?");
                    $stmt->execute([$_SESSION['uid']]);
                    foreach ($stmt as $row){
                    echo '<img src="'.$row['userpic'].'"alt="Profile Pic" style="width:140px;height:140px;">'."<br>".
                    'Username:  '.$row['username']."<br>". 'Name:  '.$row['firstname']." ".$row['surname']."<br>"."Your Groups:".$row['groupid1']."<br>"."<br>";
                    }
                    unset($stmt);
                    
                    $stmt = $pdo->prepare("SELECT * FROM addresses WHERE userid = ?");                    
                    $stmt->execute([$_SESSION['uid']]);
                    foreach ($stmt as $row){
                        echo 'Address:  '.$row['addrline1']."<br>". 'City:  '.$row['city']."<br>". 'Postcode: ' .$row['postcode']."<br>"."<br>". 'Telephone: ' .$row['contactnumber']."<br>";
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
                    $stmt = $pdo->prepare("SELECT * FROM items WHERE owner = ?");
                    $stmt->execute([$_SESSION['uid']]);
                    foreach ($stmt as $row){
                    echo '<img src="'.$row['itempic'].'"alt="Item Pic" style="float:left;width:50px;height:30px;margin-right:15px;">'.
                    '<a href="itemPageView.php?itemname='.$row['headline'].'">'.$row['headline'].'</a>'."<br>". 'Description:  '.$row['description']."<br>".'Borrower:  '.$row['borrower'].'<a href="mydashboard.php" class="btn btn-primary" style="float:right">Update Listing</a>'."<br>"."<br>"."<br>";
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
                <?php
                $stmt = $pdo->prepare("SELECT * FROM history WHERE borrowerid = ?");
                $stmt->execute([$_SESSION['uid']]);
                foreach ($stmt as $row){
                echo 'Item: '.$row['itemid']."<br>". 'Borrowed on:  '.$row['startloan']."<br>".'Returned on: '.$row['endloan']."<br>"."<br>";
                }
                unset($stmt);
                ?>
            </div>
        
            <div class="col-sm-1" style="background-color:#FFFFFF;">
            </div>

            <div class="col-sm-6" style="background-color:#C4D8FF;">
            <h3>Items You're Borrowing</h3>
            <p align='left'>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM items WHERE borrower = ?");
                $stmt->execute([$_SESSION['uid']]);
                foreach ($stmt as $row){
                echo '<img src="'.$row['itempic'].'"alt="Item Pic" style="float:left;width:50px;height:30px;margin-right:15px;">'.
            '   <a href="itemPageView.php?itemname='.$row['headline'].'">'.$row['headline'].'</a>'."<br>".$row['description']."<br>".'T&Cs: '.$row['terms']."<br>".'Owner:  '.$row['owner']."<br>".'<a href="mydashboard.php" class="btn btn-primary" style="float:right">Return Item</a>'."<br>"."<br>";
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


