<?php

function printLoginForm($askedPage) {
    echo <<<doc
    <form action="index.php?todo=login&page=$askedPage" method="post">
        <p>Login:<input type="text" name="login" required placeholder="entrer your login please"/></p>
        <p>Password: <input type="text" name="mdp" required placeholder="entrer your password please"/></p>
        <p>Supprimer: <input type="reset" name="reset"></p>
        <p><input type="submit" value="Valider" /></p>

    </form>
    
    
doc;
}

function printLogoutForm($askedPage) {

    echo <<<doc
    
    
    
    
    <form action="index.php?todo=logout&page=$askedPage" method="post">
        <p>Deconnection? <input type="submit" value="yes" /></p>

    </form> 
doc;
}

function printLoginFormMini($askedPage) {

    echo <<<doc
    <form class="navbar-form navbar-right" action="index.php?todo=login&page=$askedPage" method="post">
            <div class="form-group">
        <input type="text" name="login" required placeholder="login"/>
                <input type="text" name="mdp" required placeholder="password"/>
                
            </div>
<button type="submit" class="btn btn-default">Submit</button>
    </form>
    
    
doc;
}

function printLogoutFormMini($askedPage) {


    echo <<<doc
    <form class="navbar-form navbar-right" action="index.php?todo=logout&page=$askedPage" method="post">
        <button type="submit" class="btn btn-default">Log out</button>

    </form> 
doc;
}

?>