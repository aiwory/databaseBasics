<?php
include("Class/template.php");
include("Class/Database.php");
include("Class/userClass.php");
$template= new Template();
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
	<section class="container-fluid">
		<div class ="row">
			<aside class = "col-md-4"></aside>
			<main class = "col-md-4 jumbotron">
				<form action = "register.php" method = "post" enctype="multipart/form-data">
							<div class="form-group">
						<label for="name">Vārds:</label>
						<input type="text" class="form-control" id="name" name = "vards">
					</div>
					<div class="form-group">
						<label for="surname">Uzvārds:</label>
						<input type="text" class="form-control" id="surname" name = "uzvards">
					</div>
					<div class="form-group">
						<label for="nickname">Lietotājvārds:</label>
						<input type="text" class="form-control" id= "nickname" name = "lietotajvards">
					</div>
					<div class="form-group">
						<label for="password">Parole:</label>
						<input type="password" class="form-control" id="password" name = "parole1">
					</div>
					<div class="form-group">
						<label for="password2">Atkārtot paroli:</label>
						<input type="password" class="form-control" id = "password2" name = "parole2">
					</div>
					<div class="form-group">
						<label for="email">Epasts:</label>
						<input type="email" class="form-control" id = "email" name = "epasts">
					</div>
					<button type="submit" name = "saglabat" class="btn btn-primary">Reģistrēties</button>
				</form>
				<?php
				if(isset($_POST['saglabat'])){
					if($_POST['parole1'] == $_POST['parole2']) {
						$user = new userClass();
						$user->checkUser($_POST['vards'], $_POST['uzvards'], $_POST['lietotajvards'], $_POST['parole1'], $_POST['epasts']);
						$user->insertUser();
					    echo '<div class = "alert alert-success">Reģistrācija veiksmīga!</div>';
					}
					else echo '<div class = "alert alert-danger">Paroles nesakrīt, lūdzu ievadiet nepieciešamo informāciju vēlreiz!</div>';
				}

				?>
				<div>
					<a href = "index.php"><button name = "back" class="btn btn-default">Atpakaļ</button></a>
				</div>
			</main>
			<aside class = "col-md-4"></aside>
		</div>
	</section>



</body>
</html>