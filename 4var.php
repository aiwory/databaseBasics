<?php
include("Class/Template.php");
$template = new Template();
include("Class/Database.php");
include("Class/Prieksmeti.php");
include("Class/userClass.php");
$user=new userClass();
$user->sessionCheck();
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
			<aside class="col-md-2">
				<?php
				$template->getUserInfo();
				?>
			</aside>
			<main class="col-md-8 jumbotron">


			<?php
				$prieksmets = new Prieksmeti();
				if(isset($_GET['delete'])){
					$prieksmets->checkID($_GET['programmas']);
					$prieksmets->deletePrieksmets();
				}
				$prieksmets->selectAll();

			?>

			<form action = "4var.php" method = "get">
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
			</main>
			<aside class="col-md-2"></aside>
		</section>
	</section>
    </body>
</html>

