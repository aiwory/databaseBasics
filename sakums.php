<?php
include("Class/Database.php");
include("Class/Template.php");
$template = new Template();
include("Class/userClass.php");
$user=new userClass();
$user->sessionCheck();
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
	<section class = "container-fluid">
		<nav class="row">
			<?php
				$template->getMenu();
			?>
		</nav>
		<section class = "row">
			<aside class ="col-md-2">
				<?php
				$template->getUserInfo();
				?>
			</aside>
			<main class ="col-md-8 jumbotron">
				<div>
					<?php
					echo "<h2>Esi sveicināts: {$_SESSION['lietotajvards']}</h2>";
					?>
				</div>

			</main>

			<aside class ="col-md-2"></aside>
		</section>
	</section>
</body>
</html>
