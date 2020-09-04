<?php
    
    $visitor_name = filter_input(INPUT_POST, 'name');
    $visitor_company = filter_input(INPUT_POST, 'company');
    $visitor_telephone = filter_input(INPUT_POST, 'telephone');
    $visitor_email = filter_input(INPUT_POST, 'email');
    $visitor_howcontact = filter_input(INPUT_POST, 'howcontact');
    /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg;  */
    
    // Validate inputs
    if ($visitor_name == null || $visitor_company == null ||
             $visitor_telephone == null || $visitor_email == null ||
        $visitor_howcontact == null) {
        $error = "Invalid input data. Check all fields and try again.";
        /* include('error.php'); */
        echo "Form Data Error: " . $error; 
        exit();
        } else {
            $dsn = 'mysql:host=localhost;dbname=my_portfolio';
            $username = 'portfolio_user';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }

            // Add the product to the database  
            $query = 'INSERT INTO visitor
                         (visitor_name, visitor_company, visitor_telephone, 
                         visitor_email, visitor_howcontact, visit_date, employeeID)
                      VALUES
                         (:visitor_name, :visitor_company, :visitor_telephone, 
                         :visitor_email, :visitor_nowcontact, NOW(), 1)';
            $statement = $db->prepare($query);
            $statement->bindValue(':visitor_name', $visitor_name);
            $statement->bindValue(':visitor_company', $visitor_company);
            $statement->bindValue(':visitor_telephone', $visitor_telephone);
            $statement->bindValue(':visitor_email', $visitor_email);
            $statement->bindValue(':visitor_howcontact', $visitor_howcontact);
            $statement->execute();
            $statement->closeCursor();
            /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg; */

}

?>
<h2>Thank you, <?php echo $visitor_name; ?>, for contacting me! I will get back to you shortly.</h2>
