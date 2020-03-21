<?php

class User {
    protected $uid;
    protected $username;
    protected $firstName;
    protected $surname;
    protected $accessLevel;
    protected $userPic;
    protected $password;
    protected $groupId1;
    protected $groupId2;
    protected $groupId3;
    protected $addrLine1;
    protected $addrLine2;
    protected $city;
    protected $postcode;
    protected $email;
    protected $contactNumber;
    
    public function __construct($username, $firstname, $surname, $accesslevel, $userpic, $password, $groupid1, $groupid2, $groupid3, $addrline1, $addrline2, $city, $postcode, $email, $contactnumber){
        $this->username = $Username;
        $this->firstName = $FirstName;
        $this->surname = $Surname;
        $this->accessLevel = $accesslevel;
        $this->userPic = $userpic;
        $this->password = $password;
        $this->groupId1 = $groupid1;
        $this->groupId2 = $groupid2;
        $this->groupId3 = $groupid3;
        $this->addrLine1 = $addrline1;
        $this->addrLine2 = $addrline2;
        $this->city = $city;
        $this->postcode = $postcode;
        $this->email = $email;
        $this->contactNumber = $contactnumber;
        
    }
    
    public function welcome(){
        echo "Welcome to FriendsLends, ". $this->firstName .PHP_EOL;
    }
    
    public function getFirstName(){
        return $this->firstName .PHP_EOL;
    }
    
    public function getSurname(){
        return $this->surname .PHP_EOL;
    }
    
    public function getPickupAddress(){
        echo "Items borrowed from " . "$this->firstName $this->surname" . " can be collected from " . "$this->addrLine1, $this->city, $this->postcode." . PHP_EOL;
    }
}
