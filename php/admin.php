<?php
	session_start();
	if($_SESSION["vcRFC"]==''){
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sistema Generador Aleatorio de Exámenes Parciales</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<script type="text/javascript" src="../js/script.js"></script>
	</head>
	<body>
		<header>
			<div id="dHeader">
				<img src="../Images/logo.png" alt="unam.png"/>
			</div>
			<nav>
				<div id="dNav">
					<li>
						<ul><a href="addUser.php">Agregar Usuario</a></ul>
						<ul><a href="deleteUsers.php">Eliminar Usuarios</a></ul>
						<ul><a href="modifyUser.php">Modificar Usuario</a></ul>
						<ul><a href="consultUser.php">Consultar Usuario</a></ul>
						<ul><a href="consultManual.php">Consultar Manual</a></ul>
						<ul><a href="faq.php">FAQ</a></ul>
						<ul><a href="index.php">Salir</a></ul>
					</li>
				</div>
			</nav>
		</header>
		<section>
			<div id="whoami">
				<?php
					echo "<h2>¡Hola!</h2>";
					echo "<h3>".$_SESSION["vcName"];
					echo "<h3>".$_SESSION["vcRFC"];
				?>
			</div>
		</section>
		<footer>
			<p>Hecho en México, Universidad Nacional Autónoma de México (UNAM), todos los derechos reservados 2017.</p>
			<p>Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica.</p>
			<p>De otra forma, requiere permiso previo por escrito de la institución.</p>
			<div id="dFooter">
				<li>
					<ul class="ulFooter"><a href="#">Créditos</a></ul>
					<ul class="ulFooter"><a href="#">Conoce el portal</a></ul>
				</li>
			</div><br><br>
			<p>Última actualización: 14/11/2017</p>
		</footer>
	</body>
</html>
