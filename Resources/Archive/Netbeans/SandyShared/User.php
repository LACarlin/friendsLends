<?php

class User {
    protected $username;
    protected $firstname;
    protected $surname;
    protected $pw;
    protected $addrLine1;
    protected $addrLine2;
    protected $city;
    protected $postcode;
    protected $email;
    protected $contactNumber;
    
    public function __construct($Username, $FirstName, $Surname, $PW, $AddrLine1, $AddrLine2, $City, $Postcode, $Email, $ContactNumber){
        $this->username = $Username;
        $this->firstName = $FirstName;
        $this->surname = $Surname;
        $this->pw = $PW;
        $this->addrLine1 = $AddrLine1;
        $this->addrLine2 = $AddrLine2;
        $this->city = $City;
        $this->postcode = $Postcode;
        $this->email = $Email;
        $this->contactNumber = $ContactNumber;
        
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
