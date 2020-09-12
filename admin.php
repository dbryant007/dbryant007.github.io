<!-- Dustin Bryant 9/4/20 -->
<?php
    require_once('database.php');  

    //echo "Connection ok.";
    // Get category ID
    if (!isset($employeeID)) {
        $employeeID = filter_input(INPUT_GET, 'employeeID',
            FILTER_VALIDATE_INT);
    if ($employeeID == NULL || $employeeID == FALSE) {
        $employeeID = 1;
    }
}
    // Get all employees
    $query = 'SELECT * FROM employee
                           ORDER BY employeeID';
    $statement = $db->prepare($query);
    $statement->execute();
    $employees = $statement->fetchAll();
    $statement->closeCursor();

    // Get all visitors
    $queryVisitors = 'SELECT * FROM visitor
                      WHERE employeeID = :employeeID
                      ORDER BY visitorID';
    $statement3 = $db->prepare($queryVisitors);
    $statement3->bindValue(':employeeID', $employeeID);
    $statement3->execute();
    $visitors = $statement3->fetchAll();
    $statement3->closeCursor();

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
    <title>Dustin Bryant - Admin</title>
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
        <h3>Select an employee:</h3>
            <?php foreach ($employees as $employee) : ?>
                <li>
                    <a href="?employeeID=<?php echo $employee['employeeID']; ?>"> <!--building a link to the employeeID number-->
                        <?php echo $employee['first_name']; ?>
                        <?php echo $employee['last_name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
            
            <table class="pagevisitors">
                <thead>    
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Phone</th>
                        <th>Interest</th>
                        <th>Message</th>
                        <th>Date Visited</th>
                        <th>Company</th>
                    </tr>
                </thead>
                <tbody>
                        

            <?php foreach ($visitors as $visitor) : ?>
                <tr>
                    <td class="firstcolumn"><?php echo $visitor['visitorID']; ?></td>            
                    <td><?php echo $visitor['visitor_name']; ?></td>
                    <td><?php echo $visitor['visitor_company']; ?></td>
                    <td><?php echo $visitor['visitor_phonenumber']; ?></td>
                    <td><?php echo $visitor['visitor_helpselected']; ?></td>
                    <td><?php echo $visitor['visitor_message']; ?></td>
                    <td><?php echo $visitor['visit_date']; ?></td>
                    <td class="right"><?php echo $visitor['visitor_company']; ?></td>
                    <td><form action="delete_visitor.php" method="post">
                        <input type="hidden" name="visitor_id"
                               value="<?php echo $visitor['visitorID']; ?>">

                        <input type="submit" value="Delete">
                    </form></td>
                </tr>
            
            <?php endforeach; ?>
                    </tbody>
        </table>
    </main>
</html>