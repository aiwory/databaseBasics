<?php
include("Class/Template.php");
include("Class/Database.php");
include("Class/userClass.php");
$template = new Template();
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		$template->getHeader();
	?>
	<title>Sākums</title>
</head>

<body>
	<section id="saturs"class = "container-fluid">
		<section class="row">
		<aside class = "col-md-4"></aside>
		<main class= "col-md-4 jumbotron">
			<div>
				<?php
				/*
                if(isset($_POST["pieslegties"])){
                    $lietotajvards = mysql_real_escape_string($_POST["lietotajvards"]);
                    $parole = md5(mysql_real_escape_string($_POST["parole"]));
                    $i = 0;
                    $result = mysql_query("SELECT lietotajvards, parole FROM lietotaji WHERE lietotajvards = '$lietotajvards' AND parole = '$parole'");
                    while(mysqli_fetch_array($result)){
                        $i++;
                    }
                    if($i == 0) {echo "Nepareizs lietotājvārds vai parole";}
                    if($i == 1) {
                        header("location:sakums.php");
                        session_start();
                        $_SESSION['lietotajvards'] = $lietotajvards;
                    }
                }
            */
				if(isset($_POST["pieslegties"])){
					$user = new userClass();
					$user->checkUserLogin($_POST['lietotajvards'], $_POST['parole']);
					$user->userLogin();
				}
				else if(isset($_POST["register"])){
					header("Location:register.php");
				}
				?>
			</div>
			<form method = "post" action = "index.php" role="form">

				<div class="form-group">
					<label for="usr">Ievadiet lietotājvārdu:</label>
					<input type="text" class="form-control" id="usr" name = "lietotajvards">
				</div>
				<div class="form-group">
					<label for="password">Ievadiet paroli:</label>
					<input type="password" class="form-control" id="password" name = "parole">
				</div>
				<button type="submit" name = "pieslegties" class="btn btn-primary">Pieslēgties</button>
				<button name = "register" class="btn btn-default pull-right">Reģistrēties</button>
				<div class="col-centered"><a href="recovery.php">Atjaunot paroli</a></div>
			</form>

			<div class>

			</div>


		</main>

		<aside class = "col-md-4"></aside>
		</section>
	</section>
</body>
</html>