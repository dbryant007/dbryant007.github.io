<!DOCTYPE html>
<?php
/*      9-18-20      Dustin Bryant       created page 
             
*/
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
        <br>
        <form name="contact" id="contact" method="POST" action="admin.php">
            <fieldset>
                <fieldset id="contactinfo">
                    <legend>Please enter your credentials:</legend>
                    <table>
                        <tr>
                            <td><label for="name">Employee Name: </label></td>
                            <td><input type="text" id="name" name="name" required></td>
                        </tr>
                        <tr>
                            <td><label for="company">Password: </label></td>
                            <td><input type="password" id="company" name="company" required></td>
                        </tr>
                    </table>    
                </fieldset>       
                <br>           
                <input type="submit" >
            </fieldset>
        </form>
    </main>
    <br>
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