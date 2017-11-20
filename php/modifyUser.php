<?php
	session_start();
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
						<ul><a href="../index.php">Salir</a></ul>
					</li>
				</div>
			</nav>
		</header>
		<section>

			<div id="moduleModifyUser" >
				<form>
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
								<th>Seleccionar Usuario</th>
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
									<td <?php echo "id='Name".$row["vcRFC"]."'"?> ><?php echo $row["vcName"]?></td>
									<td <?php echo "id='Apellidos".$row["vcRFC"]."'"?> ><?php echo $row["vcApellidos"]?></td>
									<td <?php echo "id='Passwd".$row["vcRFC"]."'"?> ><?php echo $row["vcPasswd"]?></td>
									<td><?php echo $row["vcCareer"]?></td>
									<td <?php echo "id='Turn".$row["vcRFC"]."'"?> ><?php if($row["intTurn"]==1){
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
									<td><?php 
											if($row['bType']<>0){
												echo "<input type='radio' name='editUser' value= '".$row["vcRFC"]."'>";
											}
												?></td>
								</tr>
							<?php
								}
							?>
						</tbody>
					</table><br/>
					<input type="button" name="buttonModifyUser" value="Modificar Usuario Seleccionado" onclick="obtainRFC()" />
					<input type="reset" name="buttonResetSelectedUsers" value="Limpiar Selección"/>
				</form>
			</div><br/><br/>
			<div id="showModifyUser">
				<form name="formAddUser" id="formAddUser" class="formAddUser" method="post" action="../Actions/ModifyUser.php">
					<table>
						<td><th>Modificar Datos</th></td>
						<tr><td><label>RFC</label></td><td><input type="text" name="formModifyUserRFC" id="formModifyUserRFC" required="required"></td></tr>
						<tr><td><label>Nombres</label></td><td><input type="text" name="formModifyUserName" id="formModifyUserName" required="required"></td></tr>
						<tr><td><label>Apellidos</label></td><td><input type="text" name="formModifyUserLastName" id="formModifyUserLastName" required="required"></td></tr>
						<tr><td><label>Contraseña</label></td><td><input type="text" name="formModifyUserPasswd" id="formModifyUserPasswd" required="required"></td></tr>
						<tr><td><label>Carrera</label></td><td><select name="formAddUserCareer"><option value="Informática">Informática</option><option value="ITSE">ITSE</option><option value="IME">IME</option></select></td></tr>
						<tr><td><label>Turno</label></td><td><select name="formAddUserTurn"><option value="1">Matutino</option><option value="2">Vespertino</option><option value="3">Mixto</option></select></td></tr>
						<tr hidden="hidden"><td><label>UserType</label></td><td><input type="number" name="formAddUserType" value="1"></td></tr>
					</table><br/>
					<input type="submit" value="Modificar Usuario">
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

