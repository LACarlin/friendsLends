<?php
// Initialize the session
session_start();
require_once "config.php";
?>

<?php
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
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

        <div class="page-header">
            <img src="user-images/AmysLogo.png" alt="logo" align="middle" width="450px"/> 
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]) . '!'; ?></b></br>
                <h2>Welcome to your hub for borrowing and lending with your friends!</h2></br>
        </div>
        <?php
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
            $borrower = $value['borrower'];
            ?>
            <?php echo '<img src="' . $picvar . '" alt="Item Pic" style="float:center;width:200px;height:auto;margin-right:15px;">'; ?>
            <h4 class="item-title"><a href="itemPageView.php?itemname=<?php echo $itemname ?>"><?php echo $itemname; ?></a></h4>
                <?php
                if ($borrower !== null) {
                    echo "<p>On loan currently!</p></br>";
                }
                ?> 
            <?php }
            ?>
    </div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>