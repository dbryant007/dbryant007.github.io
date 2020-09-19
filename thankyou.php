<?php
/*      9-4-20      Dustin Bryant       created page 
        9-18-20     Dustin Bryant       Added function calls to the database 
*/
    $visitor_name = filter_input(INPUT_POST, 'name');
    $visitor_company = filter_input(INPUT_POST, 'company');
    $visitor_phonenumber = filter_input(INPUT_POST, 'telephone');
    $visitor_email = filter_input(INPUT_POST, 'email');
    $nochecks = null;
    if(isset($_POST['contact_phone'])) {
        $visitor_contactbyphone = true;
        $nochecks = true;
    } else {
        $visitor_contactbyphone = false;
    }
    if(isset($_POST['contact_text'])) {
        $visitor_contactbytext = true;
        $nochecks = true;
    } else {
        $visitor_contactbytext = false;
    }
    if(isset($_POST['contact_email'])) {
        $visitor_contactbyemail = true;
        $nochecks = true;
    } else {
        $visitor_contactbyemail = false;
    }
    $visitor_helpselected = filter_input(INPUT_POST, 'help');
    $visitor_message = filter_input(INPUT_POST, 'comments');
    /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg;  */
    
    // Validate inputs
    if ($visitor_name == null || $visitor_company == null ||
        $visitor_phonenumber == null || $visitor_email == null ||
        $nochecks == null || $visitor_helpselected == null || 
        $visitor_message == null) {
        //$error = "Invalid input data. Check all fields and try again.";
        include('error.php');
        //echo "Form Data Error: " . $error; 
        exit();
        } else {
            require_once('./model/database.php');
            require_once('./model/visitor.php');
            addVisitor($visitor_name, $visitor_company, $visitor_phonenumber,
                    $visitor_email, $visitor_contactbyphone, $visitor_contactbytext,
                    $visitor_contactbyemail, $visitor_helpselected, $visitor_message);

}

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
    <title>Dustin Bryant - Thank You!</title>
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
        <h2>Thank you, <?php echo $visitor_name ?>, for contacting me! I will get back to you shortly.</h2>   
    </main>
</html>