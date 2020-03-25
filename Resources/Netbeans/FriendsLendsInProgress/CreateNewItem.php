<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
include 'includes/autoloader.php';

if (isset($_POST['submit'])) {
    //validate entries
    $validation = new NewItemValidation($_POST, $_FILES);
    $errors = $validation->validateform();
    if ($errors == NULL) {
        $validation->addItem();
    }
}
?>



<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>sign in page</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link href="CSS-stylesheet/FriendsLendsCSS.css" rel="stylesheet" type="text/css"/>

        <style>
            .newitem {
                margin: 0 auto;
                display: table;
                border: 1px solid black;
                padding: 10px;
            }
        </style>


    </head>

    <body>
        <img src="user-images/AmysLogo.png" alt="logo" align="left" width="200px"/>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="welcome.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="CreateNewItem.php">Create new item</a>
                <a class="nav-item nav-link" href="Contact.php">Contact</a>
                <a class="nav-item nav-link" href="mydashboard.php">My account dashboard</a>
                <a class="nav-item nav-link" href="logout.php">Log out</a>
            </div>
        </nav>
        <div class ="newitem"> 
            <h2>Create new item</h2>


            <form  enctype="multipart/form-data"  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                <label>category</label>
                <select name="category">
                    <option value="Outdoors">Outdoors</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Tools">Tools</option>
                    <option value="People_Pets">People & Pets</option>
                    <option value="Skills">Skills</option>
                    <option value="Household">Household</option>
                    <option value="Hobbies">Hobbies</option>
                    <option value="Other">Other</option>
                </select>
                <div class ="error">
                    <?php echo $errors['category'] ?? '' ?>
                </div>

                <label>headline</label>
                <input type="text" name="headline">
                <div class ="error">
                    <?php echo $errors['headline'] ?? '' ?>
                </div>

                <label>description</label>
                <input type="text" name="description">
                <div class ="error">
                    <?php echo $errors['description'] ?? '' ?>
                </div>

                <label>terms</label>
                <input type="text" name="terms">
                <div class ="terms">
                    <?php echo $errors['terms'] ?? '' ?>
                </div>

                <label>picture</label>
                <label for="img">Select image:</label>
                <input type="file" id="img" name="picture" accept="image/*">

                <div class ="error">
                    <?php echo $errors['picture'] ?? '' ?>


                    <label>Pickup location</label>
                    <input type="text" name="pickuplocation">
                    <div class ="error">
                        <?php echo $errors['pickuplocation'] ?? '' ?>
                    </div>

                    <input type="Submit" value="submit" name="submit">

                    <a class="button" href="welcome.php">return</a>

            </form>
        </div>


    </body>
</html>