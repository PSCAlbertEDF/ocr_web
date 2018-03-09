<!DOCTYPE html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
session_name("s1");
session_start();
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}
//require 'utilsdb.php';
require 'printForms.php';
require 'logInOut.php';
require 'utils.php';
$dbh = Database::connect();
?>








<?php
if (array_key_exists('page', $_GET)) {
    $askedPage = $_GET['page'];
} else {
    $askedPage = 'home';
}
$authorized = checkPage($askedPage);
$pageTitle;
if ($authorized == true) {
    $pageTitle = getTitle($askedPage);
} else {
    $pageTitle = 'error';
}
generateHeader($pageTitle);
?>

<div class="container-fluid">

    <nav id="menu" class="navbar navbar-inverse" role="navigation">
        <!-- Static navbar -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?page=home">Gorgeous OCR</a>
        </div>
        <div class="container-fluid">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php
                    generateMenu($askedPage);
                    ?>
                    <?php
                    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
                        printLogoutFormMini($askedPage);
                        if (isset($_GET["todo"]) && $_GET["todo"] == "logout") {
                            logOut();
                        }
                        // tout à l'heure on affichera le formulaire de déconnexion
                    } else {
                        printLoginFormMini($askedPage);
                        if (isset($_GET["todo"]) && $_GET["todo"] == "login") {
                            logIn($dbh);
                        }
                    }
                    ?>


                </ul>

            </div>
        </div>
    </nav>
    <?php
    generateSlide();
    ?>



    <div class="jumbotron">
        <h1>Gorgeous OCR</h1>
        <p>Our OCR engine is not finished by now. Please be patient!</p>
    </div>



    <div class="row clearfix">
        <div class="col-md-6 column">
            <?php
            generateDiscrip();
            ?>
        </div>
        <div class="col-md-6 column" id="loginout">
            <?php
            if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
                printLogoutForm();
                if (isset($_GET["todo"]) && $_GET["todo"] == "logout") {
                    logOut();
                }
                // tout à l'heure on affichera le formulaire de déconnexion
            } else {
                printLoginForm($askedPage);
                if (isset($_GET["todo"]) && $_GET["todo"] == "login") {
                    logIn($dbh);
                }
            }
            ?>
        </div>
    </div>


</div>  
<?php
//    echo <<<heredoc
//    <div id="content">
//        <div>
//            <h1> $pageTitle </h1>
//heredoc;
//    if ($authorized) {
//        require 'content_' . $askedPage . '.php';
//    } else {
//        echo 'error: this page is not accessible!';
//    }
//    echo '</div>';
//
//    echo '</div>';
//    
?>



<div class="row clearfix">
    <div class="col-md-6 column">
        <img width="40%" height="40%" src="pic/logoedf.png" />
    </div>
    <div class="col-md-6 column">
        <img width="40%" height="40%" src="pic/logox.jpg" />
    </div>
</div>

<?php
generateFooter();
$dbh = null;
?>





