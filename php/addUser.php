<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sistema Generador Aleatorio de Exámenes Parciales</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
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
						<ul><a href="../index.php">Salir</a></ul>
					</li>
				</div>
			</nav>
		</header>
		<section>
			<div id="moduleAddUser">
				<form name="formAddUser" id="formAddUser" class="formAddUser" method="post" action="../Actions/AddUser.php">
					<table>
						<td><th>Datos</th></td>
						<tr><td><label>RFC</label></td><td><input type="text" name="formAddUserRFC" required="required"></td></tr>
						<tr><td><label>Nombres</label></td><td><input type="text" name="formAddUserName" required="required"></td></tr>
						<tr><td><label>Apellidos</label></td><td><input type="text" name="formAddUserLastName" required="required"></td></tr>
						<tr><td><label>Contraseña</label></td><td><input type="text" name="formAddUserPasswd" required="required"></td></tr>
						<tr><td><label>Carrera</label></td><td><select name="formAddUserCareer"><option value="Informática">Informática</option><option value="ITSE">ITSE</option><option value="IME">IME</option></select></td></tr>
						<tr><td><label>Turno</label></td><td><select name="formAddUserTurn"><option value="1">Matutino</option><option value="2">Vespertino</option><option value="3">Mixto</option></select></td></tr>
						<tr hidden="hidden"><td><label>UserType</label></td><td><input type="number" name="formAddUserType" value="1"></td></tr>
					</table><br/>
					<input type="submit" value="Añadir Usuario">
					<input type="reset" value="Limpiar">
				</form>
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

