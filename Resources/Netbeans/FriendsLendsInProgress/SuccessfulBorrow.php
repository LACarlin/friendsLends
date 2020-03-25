<?php
// Initialize the session
session_start();
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <title>Success!</title>

        <!--You will need to insert this link below in your 'head' to get the navbar to show-->
        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link href="CSS-stylesheet/FriendsLendsCSS.css" rel="stylesheet" type="text/css"/>
        <style type = "text/css">

            body{ font: 14px sans-serif;
                  text-align: center;
            }
        </style>
    </head>
    <body>

        <!--Paste this section below at the top of your 'body' section for the navbar-->
        <nav class = "navbar navbar-expand-lg navbar-light bg-light">
            <div class = "navbar-nav">
                <a class = "nav-item nav-link active" href = "welcome.php">Home <span class = "sr-only">(current)</span></a>
                <a class = "nav-item nav-link" href = "SARAH'S CREATE ITEM PAGE">Create new item</a>
                <a class = "nav-item nav-link" href = "SOPHIA'S CONTACT PAGE">Contact</a>
                <a class = "nav-item nav-link" href = "SANDY'S DASHBOARD PAGE">My account dashboard</a>
                <a class = "nav-item nav-link" href = "logout.php">Log out</a>
            </div>
        </nav>

        <h1>Success! You've borrowed this item.</h1></br>

    </body>
</html>

