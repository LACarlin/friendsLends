<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title> Contact Form</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="CSS-stylesheet/FriendsLendsCSS.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
       <!-- Sarah Navbar -->
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
        <h1> Contact us! We love to hear from you.</h1>
        <div class="container">
            <form action="action_page.php">


                <div class="container" style="background-color:white">
                    <style>
                        .container{
                            background-color: #e7f3fe;
                            border-left: 6px solid #2196F3;
                        }
                        body {
                            background-color: lightblue;
                        }

                    </style>
                </div>
                <div class ="row">
                    <div class ="col-50">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Your name..">
                    </div>
                </div>

                <div class ="row">
                    <div class = "col-50"> 
                        <label for="gname">Group Id</label>
                        <input type="text" id="gid" name="groupid" placeholder="Your group..">
                    </div> 
                </div>
                <div class ="row">
                    <div class ="col-50">
                        <label for ="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Your email..">
                    </div>
                </div>

                <div class ="row">
                    <div class = "col-50"> 
                        <label for="cnumber">Contact Number</label>
                        <input type="text" id="cnumber" name="cnumber" placeholder="Your contact number..">
                    </div> 
                </div>

                <label for="Reason for contact">Reason for contact</label>
                <select id="Reason for contact" name="Reason for contact">
                    <option value="for admin">For Admin</option>
                    <option value="for compliant">For Complaint</option>
                    <option value="to request an item">To Request An Item</option>

                </select>

                <div class="row">
                    <div class ="col-50"> 
                        <textarea id="subject" name="subject" placeholder="Write something.." 
                                  style="height:200px"></textarea>
                    </div>
                </div>
        </div>
        </br>
        <div class ="row">
            <div style="border: 0px solid">
                <input type="submit" value="Submit" style="display: block; margin: 0 auto;">
            </div>
        </div>

    </form>
            </br>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
