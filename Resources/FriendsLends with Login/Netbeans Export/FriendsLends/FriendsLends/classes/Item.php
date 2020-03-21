<?php

class Item {
    private $iId;
    private $category;
    private $headline;
    private $description;
    private $terms;
    private $itemPic;
    private $pickupLocation;
    private $owner;
    private $borrower;
    private $start_Loan;
    private $end_Loan;
    private $active;    /* db field defaults to inactive */
    
    
    public function __construct($category, $headline, $description, $terms, $itempic, $pickuplocation, $owner, $borrower, $start_loan,$end_loan, $active){
        $this->category = $category;
        $this->headline = $headline;
        $this->description = $description;
        $this->terms = $terms;
        $this->pictureLocation = $itempic;
        $this->pickupLocation = $pickuplocation;
        $this->owner = $owner;  //this will be the owner's user ID
        $this->borrower = $borrower;
        $this->startLoan = $start_loan;
        $this->endLoan = $end_loan;
        $this->active = $active;
    }   
    
    public function getAvailableItems() {
        if ($this->startLoan == NULL && $this->active == '1'){
            echo "The" . " $this->headline" . " is available to loan" . PHP_EOL;
        } 
        elseif($this->active !== '1'){
            echo "Sorry, the" . " $this->headline" . " is currently unavailable" . PHP_EOL;
        } 
        elseif($this->startLoan !== NULL){
            echo "Sorry, the" . " $this->headline" . " is already out on loan until" . " $this->endLoan" . PHP_EOL;
        }
    }
    
}

