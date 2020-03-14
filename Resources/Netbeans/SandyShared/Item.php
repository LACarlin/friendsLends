<?php

class Item {
    private $id;
    private $category;
    private $headline;
    private $description;
    private $terms;
    private $pictureLocation;
    private $pickupLocation;
    private $owner;
    private $borrower;         /* default to null */
    private $activeStatus;    /* default to inactive */
    private $startLoan;       /* default to null */
    private $endLoan;         /* default to null */
    
    public function __construct($ID, $Category, $Headline, $Description, $Terms, $PictureLocation, $PickupLocation, $Owner, $Borrower, $active_status, $start_loan,$end_loan){
        $this->id = $ID;
        $this->category = $Category;
        $this->headline = $Headline;
        $this->description = $Description;
        $this->terms = $Terms;
        $this->pictureLocation = $PictureLocation;
        $this->pickupLocation = $PickupLocation;
        $this->owner = $Owner;
        $this->borrower = $Borrower;
        $this->activeStatus = $active_status;
        $this->startLoan = $start_loan;
        $this->endLoan = $end_loan;
    }   
    
    public function getAvailableItems() {
        if ($this->startLoan == NULL && $this->activeStatus == 'active'){
            echo "The" . " $this->headline" . " is available to loan" . PHP_EOL;
        } 
        elseif($this->activeStatus !== 'active'){
            echo "Sorry, the" . " $this->headline" . " is currently unavailable" . PHP_EOL;
        } 
        elseif($this->startLoan !== NULL){
            echo "Sorry, the" . " $this->headline" . " is already out on loan until" . " $this->endLoan" . PHP_EOL;
        }
    }
    
}

