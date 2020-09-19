<!-- Dustin Bryant 9/16/20 Added listemployees using classes and objects.-->
<?php
    class Database {
    private static $dsn = 'mysql:host=localhost;dbname=my_portfolio';
    private static $username = 'portfolio_user';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('../errors/database_error.php');
                echo "Connection error";
                exit();
            }
        }
        return self::$db;
    }
}
  
class Employee {
    private $id;
    private $first_name;
    private $last_name;
    
    public function __construct($id, $first_name, $last_name) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function setID() {
        $this->id = $value;
    }
    
    public function getFirstName() {
        return $this->first_name;
    }
    
    public function setFirstName() {
        $this->first_name = $value;
    }
    
    public function getLastName() {
        return $this->last_name;
    }
    
    public function setLastName() {
        $this->last_name = $value;
    }
}          

class EmployeeDB {
    public static function getEmployees() {
        $db = Database::getDB();
        $query = "SELECT * FROM employee
            ORDER BY last_name";
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['employeeID'],
                    $row['first_name'], $row['last_name']);
            $employees[] = $employee;
        }
        return $employees;
                
    }
}

$employees = EmployeeDB::getEmployees();
           
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Dustin Bryant's software development portfolio">
    <meta name="keywords" content="Dustin Bryant, portfolio, programmer, sofware development">
    <meta name="author" content="Dustin Bryant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/portfolioStyles.css">
    <title>Dustin Bryant - Contact</title>
</head>
<body>    
    <header>
        <div class="top">
            <a href="index.html"><img src="images/default_user_icon.png" alt="user icon" style="height:150px;width:auto;"/></a>
            <h1>Dustin Bryant</h1>
        </div>
        <nav>
            <ul>
                <li class="fade"><a href="index.html">Home</a></li>
                <li class="fade"><a href="about.html">About</a></li>
                <li class="fade"><a href="experience.html">Experience</a></li>
                <li class="fade"><a href="contact.html">Contact</a></li>                
            </ul>
        </nav>
    </header>
    <main>
        <h2>Employee LIsting</h2>
        <p>&nbsp</p>
        <ul>
            <?php foreach ($employees as $employee) : ?>
            <li>
                <?php echo $employee->getLastName() . ", " . $employee->getFirstName(); ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </main>
</html>