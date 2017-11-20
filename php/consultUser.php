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

			<div id="moduleDeleteUser" >
				<form action="../Actions/DeleteUsers.php" method="post">
					<table id="tableDeleteUsers">
						<thead>
							<tr>
								<th>RFC</th>
								<th>Nombre</th>
								<th>Apellidos</th>
								<th>Passwd</th>
								<th>Carrera</th>
								<th>Turno</th>
								<th>Tipo de Usuario</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$connect = mysql_connect("localhost","root","dwarfest");
								if(!$connect){
									die(mysql_error());
								}	
								mysql_select_db("sgaep");
								$results = mysql_query("SELECT * FROM tableUsers");
								while ($row = mysql_fetch_array($results)) {
							?>
								<tr>
									<td><?php echo $row["vcRFC"]?></td>
									<td><?php echo $row["vcName"]?></td>
									<td><?php echo $row["vcApellidos"]?></td>
									<td><?php echo $row["vcPasswd"]?></td>
									<td><?php echo $row["vcCareer"]?></td>
									<td><?php if($row["intTurn"]==1){
										echo "Matutino";
									}elseif ($row["intTurn"]==2) {
										echo "Vespertino";
									}else{
										echo "Mixto";
									}
												?></td>
									<td><?php if($row["bType"] == 0){
										echo "Admin";
									}else{
										echo "user";
									}
									?></td>
								<!--TENER PRECAUCIÓN CON ESTE TR-->	
								</tr>
							<?php
								}
							?>
						</tbody>
					</table><br/>
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

