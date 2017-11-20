<?php
	session_unset();
	session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sistema Generador Aleatorio de Exámenes Parciales</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<header>
			<div id="dHeader">
				<img src="Images/logo.png" alt="unam.png"/>
			</div>
			<nav>
				<div id="dNav">
					<li>
						<ul><a href="#">Inicio</a></ul>
						<ul><a href="#">Comunidad</a></ul>
						<ul><a href="#">Oferta Educativa</a></ul>
						<ul><a href="#">Investigación</a></ul>
						<ul><a href="#">Cultura</a></ul>
						<ul><a href="#">Deportes</a></ul>
						<ul><a href="#">Versión Anterior</a></ul>
					</li>
				</div>
			</nav>
		</header>
		<section>
			<div id="divLogin">
				<form action="php/login.php" method="post">
					<table>
						<tr>
							<td><label>Usuario:</label></td><td><input type="text" name="userLogin" id="textboxUser" required="required"/></td>
						</tr>
						<tr>
							<td><label id="labelPasswd">Contraseña: </label></td><td><input type="password" name="passwdLogin" id="textboxPasswd" required="require"></td>
						</tr>
					</table>
					<input type="submit" value="Acceder">
				</form>
			</div>
		</section>
		<footer>
			<p>Hecho en México, Universidad Nacional Autónoma de México (UNAM), todos los derechos reservados 2015.</p>
			<p>Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica.</p>
			<p>De otra forma, requiere permiso previo por escrito de la institución.</p>
			<div id="dFooter">
				<li>
					<ul class="ulFooter"><a href="#">Créditos</a></ul>
					<ul class="ulFooter"><a href="#">Conoce el portal</a></ul>
				</li>
			</div><br><br>
			<p>Última actualización: 11/12/2015</p>
		</footer>
	</body>
</html>

