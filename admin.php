
<?php
/*      9-4-20      Dustin Bryant       created page 
        9-18-20     Dustin Bryant       Added function calls to the database 
*/
    require_once('./model/database.php');  
    require_once('./model/employee.php');
    require_once('./model/visitor.php');

    //echo "Connection ok.";
    // Get category ID
    if (!isset($employeeID)) {
        $employeeID = filter_input(INPUT_GET, 'employeeID',
            FILTER_VALIDATE_INT);
    if ($employeeID == NULL || $employeeID == FALSE) {
        $employeeID = 1;
    }
}
    $employees = getEmployees();    //calling function in employee.php
    $visitors = getVisitorByEmp($employeeID);   //calling function in visitor.php

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
            <a href="index.html"><img src="images/logo.svg" alt="user icon" /></a>
            <h1>Dustin Bryant</h1>
        </div>
        <nav>
            <ul>
                <li class="fade"><a href="index.html">Home</a></li>
                <li class="fade"><a href="about.html">About</a></li>
                <li class="fade"><a href="experience.html">Experience</a></li>
                <li class="fade"><a href="contact.html">Contact</a></li>
                <li class="fade"><a href="login.php">Admin</a></li>                
            </ul>
        </nav>
    </header>
    <main>
        <h3>Select an employee:</h3>
        
            <?php foreach ($employees as $employee) : ?>
        <tr>
            <td>
                    <a class="employees" href="?employeeID=<?php echo $employee['employeeID']; ?>"> <!--building a link to the employeeID number-->
                        <?php echo $employee['first_name'];?>
                        <br>
                        <?php echo $employee['last_name']; ?>
                    </a>
            </td>
                </tr>
<!--                <li>
                    <a class="delete" href="?employeeID=<?php echo $employee['employeeID']; ?>"> building a link to the employeeID number
                        <?php echo $employee['first_name']; ?>
                        <?php echo $employee['last_name']; ?>
                    </a>
                </li>-->
            <?php endforeach; ?>
        
                <br>
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
                        
            <h3>List of Visitors:</h3>            
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
                <br>
    </main>
    <footer>
    <div id="bottom"><!-- The bottom id aligns the contact info. -->        
        Email: <a href="mailto:dustinbryant@my.cwi.edu">dustinbryant@my.cwi.edu</a><br>
        Phone: <a href="tel:+12088907307">208-890-7307</a>              
        <div>
            <a href="https://www.github.com" target="_blank"><img src="images/github-48_gray.png" alt="githup logo"></a>
            <a href="https://www.linkedin.com" target="_blank"><img src="images/linkedin-48_gray.png" alt="githup logo"></a>
        </div> 
    </div>                   
</footer>

</body>
</html>