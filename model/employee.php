<?php
/* 9-18-20  Dustin Bryant   created page
*/

// Get all employees
    function getEmployees() {
        global $db;
        $query = 'SELECT * FROM employee
                           ORDER BY employeeID';
        $statement = $db->prepare($query);
        $statement->execute();
        $employees = $statement->fetchAll();
        $statement->closeCursor();
        
        return $employees;
    }
?>