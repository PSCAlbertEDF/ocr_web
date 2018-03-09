<?php

$page_list = array(
    array(
        "name" => "home",
        "title" => "Welcome to our website",
        "menutitle" => "Home",
    ),
    array(
        "name" => "contacts",
        "title" => "Who we are?",
        "menutitle" => "Please contact us",
    ),
    array(
        'name' => 'inscription',
        'title' => 'Want to know more about us?',
        "menutitle" => "Join us",
    ),
);

function checkPage($askedPage) {
    $flag = FALSE;
    global $page_list;
    foreach ($page_list as $value) {
        if ($value['name'] == $askedPage) {
            $flag = TRUE;
            break;
        }
    }
    return $flag;
}

function getTitle($name) {
    global $page_list;
    foreach ($page_list as $value) {
        if ($value['name'] == $name) {
            return $value['title'];
        }
    }
}

function generateHeader($title) {
//    foreach ($css as $value) {
//        echo "<link href=$value rel='stylesheet'>";
//    }
    echo<<<heredoc
    
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>$title</title>
    </head>
    <body>
heredoc;
}

function generateFooter() {

    echo <<<doc
    <footer class="footer" >
      <div class="container">
        <span class="text-muted">Developped by Team-AlbertPSC</span>
      </div>
    </footer>
doc;
    echo '</body>';
    echo '</html>';
}

function generateContent() {
    echo <<<heredoc
    <div id="content">
        <div>
            <h1>Titre d'un article</h1>
            <p>Contenu du corps principal de la page, dépend de la page affichée</p>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-2">
                <h3>Olivier Serre</h3>
                <p>Olivier se charge des amphis de la période 4…</p>
            </div>
            <div class="col-md-3 col-md-offset-2">
                <h3>Dominique Rossin</h3>
                <p>Dominique est le gourou historique du modal web…</p>
            </div>
        </div>
    </div>
heredoc;
}

function generateSlide() {
    echo <<<doc
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="pic/s1.jpg" alt="Los Angeles">
            </div>

            <div class="item">
                <img src="pic/s2.jpg" alt="Chicago">
            </div>

            <div class="item">
                <img src="pic/s3.jpg" alt="New York">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
doc;
}

function generateDiscrip() {
    echo<<< doc
    <dl>
                        <dt>
                            Description lists
                        </dt>
                        <dd>
                            A description list is perfect for defining terms.
                        </dd>
                        <dt>
                            Euismod
                        </dt>
                        <dd>
                            Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                        </dd>
                        <dd>
                            Donec id elit non mi porta gravida at eget metus.
                        </dd>
                        <dt>
                            Malesuada porta
                        </dt>
                        <dd>
                            Etiam porta sem malesuada magna mollis euismod.
                        </dd>
                        <dt>
                            Felis euismod semper eget lacinia
                        </dt>
                        <dd>
                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </dd>
                    </dl>
doc;
}

function generateLog() {
    echo<<< doc
     <form role="form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label><input type="email" class="form-control" id="exampleInputEmail1" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label><input type="password" class="form-control" id="exampleInputPassword1" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label><input type="file" id="exampleInputFile" />
                            <p class="help-block">
                                Example block-level help text here.
                            </p>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" />Check me out</label>
                        </div> <button type="submit" class="btn btn-default">Submit</button>
                    </form>
doc;
}

function generateMenu($currentPage) {

    global $page_list;


    foreach ($page_list as $value) {
        if ($currentPage != $value['name']) {
            echo "<li><a href = 'index.php?page=" . $value['name'] . "'>" . $value['name'] . "</a></li>";
        } else {
            echo "<li class = 'active'><a href = 'index.php?page=" . $value['name'] . "'>" . $value['name'] . "</a></li>";
        }
    }
    
}
?>

