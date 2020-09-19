<?php

// Get all visitors
function getVisitorByEmp($employeeID) {
    global $db;
    $queryVisitors = 'SELECT * FROM visitor
                      WHERE employeeID = :employeeID
                      ORDER BY visitorID';
    $statement3 = $db->prepare($queryVisitors);
    $statement3->bindValue(':employeeID', $employeeID);
    $statement3->execute();
    $visitors = $statement3->fetchAll();
    $statement3->closeCursor();

return $visitors;
}
 
// delete a visitor
function deleteVisitor($visitor_id) {
    global $db;
    $query = 'DELETE FROM visitor
          WHERE visitorID = :visitor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':visitor_id', $visitor_id);
    $statement->execute();
    $statement->closeCursor();    
}

// Add the visitor to the database  
function addVisitor($visitor_name, $visitor_company, $visitor_phonenumber, 
                 $visitor_email, $visitor_contactbyphone, $visitor_contactbytext,
                 $visitor_contactbyemail, $visitor_helpselected, $visitor_message)
                 {
    global $db;
    $query = 'INSERT INTO visitor
                 (visitor_name, visitor_company, visitor_phonenumber, 
                 visitor_email, visitor_contactbyphone, visitor_contactbytext,
                 visitor_contactbyemail, visitor_helpselected, visitor_message,
                 visit_date, employeeID)
              VALUES
                 (:visitor_name, :visitor_company, :visitor_phonenumber, 
                 :visitor_email, :visitor_contactbyphone, :visitor_contactbytext, 
                 :visitor_contactbyemail, :visitor_helpselected, :visitor_message,
                 NOW(), 1)';
    $statement = $db->prepare($query);
    $statement->bindValue(':visitor_name', $visitor_name);
    $statement->bindValue(':visitor_company', $visitor_company);
    $statement->bindValue(':visitor_phonenumber', $visitor_phonenumber);
    $statement->bindValue(':visitor_email', $visitor_email);
    $statement->bindValue(':visitor_contactbyphone', $visitor_contactbyphone);
    $statement->bindValue(':visitor_contactbytext', $visitor_contactbytext);
    $statement->bindValue(':visitor_contactbyemail', $visitor_contactbyemail);
    $statement->bindValue(':visitor_helpselected', $visitor_helpselected);
    $statement->bindValue(':visitor_message', $visitor_message);
    $statement->execute();
    $statement->closeCursor();
    //echo "Fields: " . $visitor_name . $visitor_company . $visitor_email . 
     //       $visitor_email;
}
?>

