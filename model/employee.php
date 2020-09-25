<?php
/* 9-18-20  Dustin Bryant   created page
 * 9-23-20  Dustin Bryant   added static call to getDB()
*/

// Get all employees
    function getEmployees() {
        //global $db;
        try {
            $db = Database::getDB();
        $query = 'SELECT * FROM employee
                           ORDER BY employeeID';
        $statement = $db->prepare($query);
        $statement->execute();
        $employees = $statement->fetchAll();
        $statement->closeCursor();
        } catch (PDOException $e) {
            include('../model/error.php');
        }   
        
        return $employees;
    }
?>