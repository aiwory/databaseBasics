<?php

/**
 * Created by PhpStorm.
 * User: Aigars
 * Date: 24.02.2016
 * Time: 10:51
 */
class Template
{
    function getHeader(){
        echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="icon" type="icon" href="/pics/favicon.ico"/>
	<link rel="stylesheet" href="./lib/bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="./lib/bootstrap-3.3.6-dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="noformejums.css" />
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script src="./lib/jquery-2.1.4.min.js"></script>
	<script src="./lib/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="./js/mainmenu.js"></script>

    ';


    }

    function getMenu() {
        echo '
            	<div class = "col-md-12">
                <nav class="navbar navbar-default">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#izvelne">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <div class="navbar-brand">Datu apstrāde</div>
				    </div>
				    <div class="collapse navbar-collapse" id="izvelne">
				      <ul id="pageMenu" class="nav navbar-nav">
				            <li><a href="sakums.php">Sākums</a></li>
					        <li><a href="1var.php">Atlasīt</a></li>
					        <li><a href="2var.php">Pievienot</a></li>
							<li><a href="3var.php">Mainīt</a></li>
							<li><a href="4var.php">Dzēst</a></li>
							<li><a href="izdruka.php">Izdrukāt</a></li>

				      </ul>
				      <ul  class = " nav navbar-nav pull-right">
				        <li class="alert-info"><a href="index.php">Iziet</a></li>
                      </ul>

                      </div>
				</nav>
				</div>
        ';

    }
    function getUserInfo(){

				echo"<div class=\"well\">
					<p><h3>{$_SESSION['lietotajvards']}</h3></p>
                    <img class=\"img-responsive img-thumbnail\" src = \"{$_SESSION['foto']}\"/>
					<p><b>Vārds: {$_SESSION['vards']}</b></p>
					<p><b>Uzvards: {$_SESSION['uzvards']}</b></p>


				</div>";

    }
}