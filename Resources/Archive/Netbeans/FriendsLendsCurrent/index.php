<?php

include "Class/User.php";
include "Class/Admin.php";
include "Class/Item.php";
include "frontend.html";

$user1 = new User('borisj', 'Boris', 'Johnson','','10 Downing Street', '','London', 'SW1A 2AA', '', '');
$item1 = new Item('', 'Hobbies', 'Skateboard', 'Powell Peralta Ripper, Complete, Red/Blue, 7.5inch', '', '','My House', 'sandyf', '','active', '', '');
$item2 = new Item('', 'Hobbies', 'Pogo Stick', 'Krunk Pogo Stick - Black/Red', '', '','My House', 'sandyf', '','inactive', '', '');
$item3 = new Item('', 'Outdoors', 'Barbecue', 'Portable Barrel Barbecue', '', '','My House', 'sandyf', '','active', '2020-03-01', '2020-03-31');
$admin1 = new Admin('donaldt', 'Donald', 'Trump','','The White House', '','Washington DC', '', '', '');
$user1->welcome();
$item1->getAvailableItems();
$item2->getAvailableItems();
$item3->getAvailableItems();
$user1->getPickupAddress();
$admin1->whoAreYou();

