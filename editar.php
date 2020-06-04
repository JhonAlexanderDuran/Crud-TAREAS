<?php

	include("db.php");

	if (isset($_GET['id'])) {
		# code...
		$id = $_GET['id'];
		$query = "SELECT * FROM tareas WHERE id = $id";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$title = $row['titulo'];
			$description = $row['descripcion'];
			$fecha_vencimiento = $row['fecha_vencimiento'];
			$prioridad = $row['prioridad'];
			$responsable = $row['responsable'];

		}
	}

	if(isset($_POST['update'])) {
		$id = $_GET['id'];
		$title = $_POST['titulo'];
		$description = $_POST['descripcion'];
		$fecha_vencimiento = $_POST['fecha_vencimiento'];
		$prioridad = $_POST['prioridad'];
		$responsable = $_POST['responsable'];


		$query = "UPDATE tareas set titulo = '$title', descripcion = '$description', fecha_vencimiento = '$fecha_vencimiento', prioridad = '$prioridad', responsable = '$responsable' WHERE id = $id";
		mysqli_query($conn, $query);

		$_SESSION['message'] = 'La tarea fue actualizada correctamente';
		$_SESSION['message_type'] = 'info';
		header("Location: index.php");
	}


?>

<?php include("includes/header.php") ?>

	<div class="container p-4">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
						<div class="form-group">
							Titulo
							<input type="text" name="titulo" value="<?php echo $title; ?>"
							class="form-control" placeholder= "actualizar titulo" >

						</div>

						<div class="form-group">
							Responsable
							<input type="text" name="responsable" value="<?php echo $responsable; ?>"
							class="form-control" placeholder= "actualizar responsable" >
						</div>

						<div class="form-group">
							Prioridad
 							<select type="text" name="prioridad" class="form-control" placeholder="prioridad"
 							<option></option><option>Alta</option><option>Media</option> <option>Baja</option></select>						
 						</div>


						<div class="form-group">
							Descripcion
							<textarea name="descripcion" rows="2" class="form-control" placeholder="actualizar descripcion"> <?php echo $description; ?></textarea>							
						</div>
						<button class="btn btn-success" name="update">
							Actualizar
							
						</button>
					</form>
					
				</div>	
				
			</div>
		</div>
	</div>

<?php include("includes/footer.php") ?>