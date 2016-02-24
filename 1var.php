<?php
include("/Class/Template.php");
include("/Class/Database.php");
include("/Class/Prieksmeti.php");
$template = new Template();
session_start();
if(!isset($_SESSION['lietotajvards']))
{ header("location:index.php"); }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		$template->getHeader();
	?>
	<title>1. daļa - infromācijas atspoguļošana, izmantojot "select tag"</title>
</head>

<body>
<section class = "container-fluid">
	<nav class="row">
		<?php
			$template->getMenu();
		?>
	</nav>
	<section class="row">
		<aside class="col-md-4"></aside>
		<main class="col-md-4 jumbotron">
			<form action = "1var.php" method = "post">
						<!-- OTRAIS SELECT TAG-->
				<select class="form-control" name="programmas">
					<!-- Funkcijas izsauksana-->
					<option value = 'visi ieraksti' selected> Visi ieraksti </option>
					<?php
					$prieksmeti = new Prieksmeti();
					$prieksmeti->selectPrieksmets();
					?>
				</select>
				<div>
				<button class="btn btn-primary" type = "submit" name = "sutit">Apstiprināt</button>
				</div>
				</form>
			<span class="alert-info">
			<?php



			if(isset($_POST['sutit'])){
				$programmas = $_POST['programmas'];
				echo "Jūs izvēlējāties priekšmetu: <b>{$programmas}<b/>";
			}



			?>
			</span>
		</main>
		<aside class="col-md-4"></aside>
	</section>
</section>
</body>
</html>

<!--Noderīgi linki
http://snippets.dzone.com/posts/show/376 - valstis
http://www.pantz.org/software/mysql/mysqlcommands.html
http://www.w3schools.com/php/php_ajax_database.asp
-->