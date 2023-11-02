<?php
namespace app\validator;
class FormValidator extends \Validator {
    protected function initVariables() {
        return array('my_rb', 'my_cb_1', 'my_dropdown', 'my_multi_select', 'my_text','my_date');
    }

    protected function check_my_text($value) {
        if (!is_null($value) && strlen($value) < 3) {
            $this->setErrorMessage('<b>VALIDATOR</b>: a minimum of 3 characters are expected.');
            return FALSE;
        } 
        return TRUE;
    }

    protected function check_my_date($value) {
        if (is_null($value)) {
            return TRUE;
        }
        $dateTime = new \DateTime($value);        
        if (!\General::isW3cDateValid($value) || strlen($dateTime->format('Y')) !== 4) {
            $this->setErrorMessage("<b>VALIDATOR</b>: this date is invalid.");
            return FALSE;
        }
        $today = new \DateTime('now');
        if ($dateTime < $today) {
            $this->setErrorMessage("<b>VALIDATOR</b>: entered date must greater than today.");
            return FALSE;
        }
        return TRUE;
    }
    
    protected function check_my_rb($value) {
        if (is_null($value)) {
            $this->setErrorMessage('<b>VALIDATOR</b>: choose a value.');
            return FALSE;
        }
        if ($value !== '3') {
            $this->setErrorMessage('<b>VALIDATOR</b>: select Option 3.');
            return FALSE;
        }
        return TRUE;
    }
    
    protected function check_my_cb_1($value) {
        $cb2Val = $this->getValue('my_cb_2');
        if (is_null($value) && is_null($cb2Val)) {
            $this->setErrorMessage('<b>VALIDATOR</b>: check at least one value');
            return FALSE;
        }
        return TRUE;
    }
    
    protected function check_my_dropdown($value) {
        if (is_null($value)) {
            $this->setErrorMessage('<b>VALIDATOR</b>: choose a value.');
            return FALSE;
        }
        return TRUE;
    }
    
    protected function check_my_multi_select($value) {
        if (!is_array($value)) {
            $this->setErrorMessage('<b>VALIDATOR</b>: selection is invalid.');
            $this->setErrorVariable('my_multi_select[]');
            return FALSE;
        }
        if (count($value) < 2) {
            $this->setErrorMessage('<b>VALIDATOR</b>: select at least two values.');
            $this->setErrorVariable('my_multi_select[]');
            return FALSE;
        }        
        return TRUE;
    }
}