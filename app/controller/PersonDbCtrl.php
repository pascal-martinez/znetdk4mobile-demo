<?php
namespace app\controller;

/**
 * This controller can be called from the 'view/persons.php' view in replacement
 * of the PersonCtrl controller for data stored in database.
 */
class PersonDbCtrl extends \AppController {

    static protected function action_all() {
        $persons = array();
        $dao = new \SimpleDAO('persons');
        $dao->setKeywordSearchColumn('name');
        $total = $dao->getRows($persons, 'id');
        $response = new \Response();
        $response->rows = $persons;
        $response->total = $total;
        return $response;
    }
    
    static protected function action_detail() {
        $request = new \Request();
        $dao = new \SimpleDAO('persons');
        $detail = $dao->getById($request->id);
        $response = new \Response();
        $response->setResponse($detail === FALSE ? array() : $detail);
        return $response;
    }
        
    static protected function action_store() {
        $request = new \Request();
        $formData = $request->getValuesAsMap('id', 'name', 'birthdate',
                'address', 'zip', 'city', 'country', 'phone', 'email');
        $dao = new \SimpleDAO('persons');
        $personId = $dao->store($formData);
        $response = new \Response();
        $response->setSuccessMessage(NULL, "Storage of the person with ID={$personId} succeeded.");
        return $response;
    }
       
    static protected function action_suggestions() {
        $dao = new \SimpleDAO('persons');
        $dao->setKeywordSearchColumn('name');
        $suggestions = $dao->getSuggestions();
        $response = new \Response();
        $response->setResponse($suggestions);
        return $response;
    }
    
}
