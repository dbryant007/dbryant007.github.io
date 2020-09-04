<?php
    
    $visitor_name = filter_input(INPUT_POST, 'name');
    $visitor_company = filter_input(INPUT_POST, 'company');
    $visitor_phonenumber = filter_input(INPUT_POST, 'telephone');
    $visitor_email = filter_input(INPUT_POST, 'email');
    $visitor_contactbyphone = true;
    $visitor_contactbytext = true;
    $visitor_contactbyemail = true;
    $visitor_helpselected = 'test';
    $visitor_message = 'this is my message';
    /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg;  */
    
    // Validate inputs
    if ($visitor_name == null || $visitor_company == null ||
             $visitor_phonenumber == null || $visitor_email == null //||
        /*$visitor_howcontact == null*/) {
        $error = "Invalid input data. Check all fields and try again.";
        /* include('error.php'); */
//        echo "Form Data Error: " . $error; 
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
//            echo "Fields: " . $visitor_name . $visitor_company . $visitor_email . 
//                    $visitor_email;

}

?>
<h2>Thank you, <?php echo "Fields: " . $visitor_name . $visitor_company . $visitor_phonenumber . 
                    $visitor_email; ?>, for contacting me! I will get back to you shortly.</h2>
