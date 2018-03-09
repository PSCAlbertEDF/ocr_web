<?php

require 'utilsdb.php';

function logIn($dbh) {
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];
    $user = User::getUtilisateur($dbh, $login);
    $flag = User::testerMdp($user, $mdp);
    if ($flag == true) {
        $_SESSION['loggedIn'] = true;
       
        echo 'login successed';
    } else {
        $_SESSION['loggedIn'] = FALSE;
        echo "login failed";
    }
}

function logOut() {
    unset($_SESSION['loggedIn']);
}
?>

