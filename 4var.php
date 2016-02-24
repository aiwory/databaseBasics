<?php
include("Class/Template.php");
$template = new Template();
include("Class/Database.php");
include("Class/Prieksmeti.php");
session_start();
if(!isset($_SESSION['lietotajvards']))
{ header("location:index.php"); }
//Nodefinājam funkciju, kura tiks izmantota, lai no tabulas priekšmeti tiku atlasīti visi ieraksti. (Distinct - novēršs ierakstu atkārtošanos)

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		$template->getHeader();
	?>
<title>4. daļa - ierakstu dzēšana</title>
</head>

    <body>
	<section class= "container-fluid">
		<nav class="row">
			<?php
				$template->getMenu();
			?>
		</nav>
		<section class="row">
			<aside class="col-md-4"></aside>
			<main class="col-md-4 jumbotron">
			<form action = "4var.php" method = "get">
				<div class = "virsraksti">Vienkāršs select tag:</div>
				<select class="form-control" name='programmas'>
					<!-- Funkcijas izsauksana-->
					<option value = 'visi ieraksti' selected> Visi ieraksti </option>
					<?php
					$prieksmets = new Prieksmeti();
					$prieksmets->selectPrieksmetsAndID()
					?>
					</select><input class="btn btn-primary" type = "submit" name = "delete" value = "Dzēst"/>
					<br/><br/><hr/><br/>
			</form>

			<?php
				$prieksmets = new Prieksmeti();
				if(isset($_GET['delete'])){
					$prieksmets->checkID($_GET['programmas']);
					$prieksmets->deletePrieksmets();
				}
				$prieksmets->selectAll();

			?>
			</main>
			<aside class="col-md-4"></aside>
		</section>
	</section>
    </body>
</html>

