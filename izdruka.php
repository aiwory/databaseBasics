<?php
//ini_set('display_errors', 0);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

include("Class/Template.php");
$template = new Template();
include("Class/Database.php");
include("Class/Prieksmeti.php");
include("Class/userClass.php");
include("Class/pdfClass.php");

$user=new userClass();
$user->sessionCheck();


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    $template->getHeader();
    ?>
    <title>PDF izdruka</title>
</head>

<body>
<section class= "container-fluid">
    <nav class="row">
        <?php
        $template->getMenu();
        ?>
    </nav>
    <section class="row">
        <aside class="col-md-2">
            <?php
            $template->getUserInfo();
            ?>
        </aside>
        <main class="col-md-8 jumbotron">
            <?php
            $prieksmets = new Prieksmeti();
            $prieksmets->selectAll();

            ?>


            <form action = "pdf.php" method = "post" target="_blank">
               <input class="btn btn-primary" type = "submit" name = "apstiprinat" value = "Apstiprināt izdruku"/>
                <br/><br/><hr/><br/>
            </form>
        </main>
        <aside class="col-md-2"></aside>
    </section>
</section>
</body>
</html>

