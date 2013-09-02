<?php
class validate {

    public $errors = array();

    public function validateStr($postVal, $postName, $min = 5, $max = 500) {
        if(strlen($postVal) < intval($min)) {
            $this->setError($postName, ucfirst($postName)." must be at least {$min} characters long.");
        } else if(strlen($postVal) > intval($max)) {
            $this->setError($postName, ucfirst($postName)." must be less than {$max} characters long.");
        }
    }// end validateStr

    public function validateEmail($emailVal, $emailName) {
        if(strlen($emailVal) <= 0) {
            $this->setError($emailName, "Please enter an Email Address");
        } else if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $emailVal)) {
            $this->setError($emailName, "Please enter a Valid Email Address");
        }
    }// end validateEmail

    private function setError($element, $message) {
        $this->errors[$element] = $message;
    }// end logError

    public function getError($elementName) {
        if($this->errors[$elementName]) {
            return $this->errors[$elementName];
        } else {
            return false;
        }
    }// end getError

    public function hasErrors() {
        if(count($this->errors) > 0) {
            return true;
        } else {
            return false;
        }
    }// end hasErrors
}// end class