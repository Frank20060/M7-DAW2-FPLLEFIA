<?php
/*----------------------------------------------------------------------------------------
 * Copyright (c) Microsoft Corporation. All rights reserved.
 * Licensed under the MIT License. See LICENSE in the project root for license information.
 *---------------------------------------------------------------------------------------*/
function sayName($name) {
	echo "Hola soy $name";
	echo "<br>";
}
?>

<html>
	<head>
		<title>Visual Studio Code Remote :: PHP</title>
		<link rel="stylesheet" href="estilo.css">
	</head>
	<body>
		
		<header>
			<img src="imagenes/logo-fpllefia.jfif" alt="Logo del col·legi FP Llefià">
			<h1>Módulo 7 - Práctica 1. Mi primera aplicación en PHP</h1>
		</header>
		<main>
			<div style="display: flex; gap: 40px;">
				<div class="fotopersonal">
					<div  style="width: 180px; border-radius: 50%; overflow: hidden; ">
						<img src="imagenes/yo.jpg" alt="Una foto mia" style="width: 200px;">
					</div>	

					<h2>Frank Villar Redondo</h2>
				</div>
				<div >
					<h3>Explicacion codigo señalado</h3>
					<p style="white-space: pre-line;"> <!-- el style es para que cuando le de al space me haga un salto de linea y no me lo ponga todo junto-->
						<?= "Lo primero es lo que se usa para abrir un bloque de codigo en php que se va ha ejecutar.
						Lo segudo que esta marcado es una funcion en php que que muestra por pantalla (con el comando echo) \"Hello\" y lo que le pasemos con la variable name. Esta dentro de un bloque de codigo de php.
						El tercer recuadro muestra como se ejecuta la funcion que hemos creado anterirmente, lo que hay entre parentesis es el contenido que tiene la variable name.
						El cuarto llama a una funcion que ya estara creada y que muetestra la info del servidor. l'Alber t dema no va a l'escola "; ?>

					</p>
				</div>
			</div>
		</main>
		<footer>
			<p>Frank Villar Redodno</p>
			<?php 
				
				echo date('d/m/Y');  //Lo se porque es parecido a javascript y es lo que hicimos una vez con carlos o con juan no me acuerdo

			?>
		</footer>
		<br>
			
	</body>
</html>