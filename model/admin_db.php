<?php
function add_admin($email, $password) {
    //global $db;
    try {
    $db = Database::getDB();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = 'INSERT INTO administrators (emailAddress, password)
              VALUES (:email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->execute();
    $statement->closeCursor();
    } catch (PDOException $e) {
            include('../model/error.php');
        }   
}

function is_valid_admin_login($email, $password) {
    //global $db;
    try {
        $db = Database::getDB();
        $query = 'SELECT password FROM administrators
                  WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        if(isset($row['password'])) {
                $hash = $row['password'];
        } else {
                $hash = false;                
        }
    } catch (PDOException $e) {
            include('../model/error.php');
        }   
    return password_verify($password, $hash);
    
}
?>