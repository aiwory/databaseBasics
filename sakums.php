<?php
include("Class/template.php");
$template = new Template();
session_start();
if(!isset($_SESSION['lietotajvards']))
{ header("location:index.php"); }

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
			<aside class ="col-md-4"></aside>
			<main class ="col-md-4 jumbotron">
				<div>
					<?php
					echo "<h2>Esi sveicināts: {$_SESSION['lietotajvards']}</h2>";
					?>
				</div>

			</main>

			<aside class ="col-md-4"></aside>
		</section>
	</section>
</body>
</html>