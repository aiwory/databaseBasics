<?php
include("Class/Template.php");
include("Class/Database.php");
include("Class/Prieksmeti.php");
$template = new Template();
include("Class/userClass.php");
$user=new userClass();
$user->sessionCheck();
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
		<aside class="col-md-2">
			<?php
			$template->getUserInfo();
			?>
		</aside>
		<main class="col-md-8 jumbotron">


			<div class="table-responsive">
				<?php

				//pievienosana
				$prieksmets = new Prieksmeti();

				if(isset($_GET['pievienot'])) {

					$prieksmets->checkPrieksmets($_GET['prieksmets']);
					$prieksmets->checkSkolotajs($_GET['skolotajs']);
					$prieksmets->insertData();
				}
				$prieksmets->selectAll();

				?>
				<form action = "2var.php" method = "get">
					<div class="form-group">
						<label>Priekšmeta nosaukums:</label>
						<input class="form-control" type = "text" name = "prieksmets"/>
						<label>Skolotājs:</label>
						<input class="form-control" type = "text" name = "skolotajs"/>
						<button class="btn btn-primary" type = "submit" name = "pievienot">Pievienot</button>
					</div>
				</form>
			</div>
		</main>
		<aside class="col-md-2"></aside>
	</section>


</section>
</body>
</html>
