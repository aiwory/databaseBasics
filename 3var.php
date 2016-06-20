<?php
include("Class/Template.php");
$template = new Template();
include("Class/Database.php");
include("Class/Prieksmeti.php");
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
<title>3. daļa - ierkstu labošana</title>
</head>

    <body>
	<section class = "container-fluid">
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
					<form action = "3var.php" method = "get">
					<?php

				//informācijas atpoguļošana
					$prieksmets= new Prieksmeti();
					$prieksmets->selectAllToEdit();


					//atrodam ierakstu kuru gribēsim labot. tā kā sākumā nav padots id, pēc kura varētu labot ierakstu ir jāpārbaudatā vērtība true vai false
				if(isset($_GET['ID']) == true){


					$prieksmets->checkID($_GET['ID']);
					$prieksmets->selectByID();
				?>
				<br/>
					<input class="form-control" type = "text" value = "<?php echo $prieksmets->getPrieksmets(); ?>" name = "labpr"/>
					<input class="form-control" type = "text" value = "<?php echo $prieksmets->getSkolotajs(); ?>" name = "labsk"/>
					<input type = 'hidden' name = 'ids' value = '<?php echo $prieksmets->getId(); ?>'/>
					<input class="btn btn-primary" type = "submit" value = "Saglabāt" name = "save"/>


				<?php
				}
					if(isset($_GET['save'])) {
					$prieksmets = new Prieksmeti();
					$prieksmets->checkPrieksmets($_GET['labpr']);
					$prieksmets->checkSkolotajs($_GET['labsk']);
					$prieksmets->checkID($_GET['ids']);
					$prieksmets->updatePrieksmets();


					}




				?>
				</form>
				<a href="3var.php"<button class="btn btn-default">Atjaunot</button></a>
				</main>
			<aside class="col-md-2"></aside>
		</section>
	</section>
    </body>
</html>
