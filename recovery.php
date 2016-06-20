<?php
include("Class/Template.php");
include("Class/Database.php");
//include("Class/userClass.php");
require_once "lib/phpmail/PHPMailerAutoload.php";
include("Class/EmailConf.php");
$template = new Template();
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    $template->getHeader();
    ?>
    <title>paroles atjaunošana</title>
</head>

<body>
<section id="saturs" class = "container-fluid">
    <section class="row">
        <aside class = "col-md-4"></aside>
        <main class= "col-md-4 jumbotron">
            <div>
                <?php
                $email=new EmailCOnf();
                if(isset($_POST["atjaunot"])){
                    $email->checkUserMail($_POST["epasts"]);
                    if($email->getFoundEmail()==true){
                        $email->genPw();
                        $email->genAndUpdateHash();
                        $email->sendPw();
                        echo '<div class="alert alert-success">Atjaunota parole nosūtīta uz jūsu epastu!</div>';
                    }
                    else echo '<div class="alert alert-danger">Nepareiza e-pasta adrese!</div>';
                }
               else if(isset($_POST["back"])){
                    header("Location:index.php");
               }
                ?>
            </div>
            <form method = "post" action = "recovery.php" role="form">

                <div class="form-group">
                    <label for="usr">Ievadiet savu e-pastu:</label>
                    <input type="text" class="form-control" id="mail" name = "epasts">
                </div>

                <button type="submit" name = "atjaunot" class="btn btn-primary">Atjaunot paroli</button>
                <button name = "back" class="btn btn-default pull-right">Atpakaļ</button>
            </form>

            <div class>

            </div>


        </main>

        <aside class = "col-md-4"></aside>
    </section>
</section>
</body>
</html>