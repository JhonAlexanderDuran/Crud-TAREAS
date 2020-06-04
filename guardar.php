<?php

	include("db.php");

	if (isset($_POST['save_task'])) {
		$title = $_POST['title'];
		$description = $_POST['description'];
		$fecha_vencimiento = $_POST['fecha_vencimiento'];
		$prioridad = $_POST['prioridad'];
		$responsable = $_POST['responsable'];


		$query = "INSERT INTO tareas(titulo, descripcion, fecha_vencimiento, prioridad, responsable) VALUES ('$title', '$description', '$fecha_vencimiento', '$prioridad', '$responsable')";		
		$result = mysqli_query($conn, $query);
		
			if(!$result){
				die("query failed");
			}
		
		$_SESSION['message'] = 'Tarea guardada con exito';
		$_SESSION['message_type'] = 'success';
		
		header("Location:index.php"); 
	} 

?>
