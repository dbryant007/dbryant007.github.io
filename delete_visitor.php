
<?php
/*      9-18-20      Dustin Bryant       created page 
             
*/
require_once('./model/database.php');
require_once('./model/visitor.php');
// Get IDs
$visitor_id = filter_input(INPUT_POST, 'visitor_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($visitor_id != false) {
    deleteVisitor($visitor_id);
//    $query = 'DELETE FROM visitor
//              WHERE visitorID = :visitor_id';
//    $statement = $db->prepare($query);
//    $statement->bindValue(':visitor_id', $visitor_id);
//    $statement->execute();
//    $statement->closeCursor();    
}

// Display the Product List page
include('admin.php');