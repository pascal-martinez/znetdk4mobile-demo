<?php
namespace app\model;

/**
 * DAO used by the app/controller/PersonDbCtrl controller.
 * SQL table 'persons' is required (see app/model/sql/zdk4m-demo-persons.sql)
 */
class PersonDao extends \DAO {

    protected function initDaoProperties() {
        $this->table = 'persons';
    }
    
    public function setKeyWordsAsFilter($keywords) {
        if (is_null($keywords)) {
            return FALSE;
        }
        if ($this->filterClause === FALSE) {
            $this->filterClause = 'WHERE ';
        } else {
            $this->filterClause .= ' AND ';
        }
        $searchedKeywords = explode(',', $keywords);
        foreach ($searchedKeywords as $key => $value) {
            if ($key === 0) {
                $this->filterClause .= '(';
            } else {
                $this->filterClause .= ' OR ';
            }
            $this->filterClause .= "LOWER(name) LIKE LOWER(?)";
            $this->filterValues[] = "%{$value}%";
            if ($key+1 === count($searchedKeywords)) {
                $this->filterClause .= ')';
            }
        }
        return TRUE;
    }
    
    public function setStringAsFilter($queryString) {
        $this->filterClause = "WHERE LOWER(name) LIKE LOWER(?)";
        $this->setFilterCriteria("%{$queryString}%");
    }

}
