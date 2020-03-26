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

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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