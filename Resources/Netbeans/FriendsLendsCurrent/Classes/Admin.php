<?php

class Admin extends User{
    public function whoAreYou(){
        echo "I am " .$this->firstName . ' ' . $this->surname . ". I am an Administrator. I AM ALL POWERFUL...MWAH HA HA HA" . PHP_EOL;
    }
}

