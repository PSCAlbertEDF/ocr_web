<?php

class Database {

    public static function connect() {
        $dsn = 'mysql:dbname=PSCocr;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $dbh = null;
        try {
            $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $exc) {
            echo 'connection failed' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }

}

class User {

    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $promotion;
    public $naissance;
    public $email;
    public $feuille;

    public function __toString() {
        return $this->login;
    }

    public static function getUtilisateur($dbh, $login) {
        $query = "SELECT * FROM `utilisateurs` WHERE `login`='$login'";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute();
        $user = $sth->fetch();
        $sth->closeCursor();
        return $user;

       
    }
    public static function testerMdp($user,$mdp) {
       
        if ($user == null) {
            return false;
        }
        if(($user->mdp)!= substr(sha1($mdp),0,40)) {
            echo ($user->mdp);
            echo "\n";
            return false;
        }
        return true;
    }

}

function insertUser($dbh, $user) {
    $query = "INSERT INTO `users`(`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`)VALUES(:login,SHA1(:mdp),:nom,:prenom,:promotion,:naissance,:email,:feuille)";
    $sth = $dbh->prepare($query);
$sth->execute((array) ($user));}


?>

