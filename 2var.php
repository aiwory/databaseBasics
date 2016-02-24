<?php
include("Class/Template.php");
include("Class/Database.php");
include("Class/Prieksmeti.php");
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

<title>2. daļa - informācijas ievadīšana, izmantojot formu</title>
</head>

<body>
<section class = "container-fluid">
	<nav class ="row">
		<?php
			$template->getMenu();
		?>
	</nav>
	<section class="row">
		<aside class="col-md-4"></aside>
		<main class="col-md-4 jumbotron">

			<form action = "2var.php" method = "get">
				<div class="form-group">
					<label>Priekšmeta nosaukums:</label>
					<input class="form-control" type = "text" name = "prieksmets"/>
					<button class="btn btn-primary" type = "submit" name = "pievienot">Pievienot</button>
				</div>
			</form>
			<div class="table-responsive">
				<?php

				//pievienosana
				$prieksmets = new Prieksmeti();
				if(isset($_GET['pievienot'])) {

					$prieksmets->checkPrieksmets($_GET['prieksmets']);
					$prieksmets->insertData();
				}
				$prieksmets->selectAll();

				?>
			</div>
		</main>
		<aside class="col-md-4"></aside>
	</section>


</section>
</body>
</html>
