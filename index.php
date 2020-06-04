<?php include("db.php") ?>
<?php include("includes/header.php") ?>	
 	
 	<div class="container p-4">

 		<div class="row">

 			<div class="col-md-4">
 				
 			</div>

 			<div class="col-md-4">

 				<?php if(isset($_SESSION['message'])) { ?>
 						<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
  						 		<?= $_SESSION['message']?> 
  						 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  						 		<span aria-hidden="true">&times;</span>
  						 		</button>
						</div>
 				<?php session_unset();} ?>
 				<div class="card card-body">
 					<form action="guardar.php" method="POST">
 						
 						<div class="form-group">
                   		 	<label for="">Fecha Vencimiento</label>
                    		<input type="date" name="fecha_vencimiento" id="" required>
               			 </div>


 						<div class="form-group">
 							<input type="text" name="title" class="form-control" placeholder="Nombre de Tarea" autofocus>						
 						</div>
 						<div class="form-group">
 						
 						
 						<div class="form-group">
 							<input type="text" name="responsable" class="form-control" placeholder="responsable" autofocus>						
 						</div>

 						



 						<div class="form-group">
 							<select type="text" name="prioridad" class="form-control" placeholder="prioridad"
 							<option></option><option>Alta</option><option>Media</option> <option>Baja</option></select>						
 						</div>
 						<textarea name="description" rows="2" class="form-control" placeholder="Descripcion"></textarea>

 						</div>
 						<input type="submit" class="btn btn-success btn-block" name="save_task" value="agregar tarea">
 					</form>
 					
 				</div>
 				
 			</div>
 			<div class="col-md-8">
 				<table class="table table-bordered">
 					<thead>
 						<tr>
 							<th>Nombre de tarea</th>
 							<th>Descripcion</th>
 							<th>Fecha Creacion</th>
 							<th>Fecha Vencimiento</th>
 							<th>Prioridad</th>
 							<th>Responsable</th>
 							<th>Editar/Eliminar</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php 

 							$query = "SELECT * FROM tareas ORDER BY fecha_vencimiento ASC";
 							$result_tasks = mysqli_query($conn, $query);

 							while($row = mysqli_fetch_array($result_tasks)) { ?>
 								<tr>
 									<td><?php echo $row['titulo'] ?></td>
 									<td><?php echo $row['descripcion'] ?></td>
 									<td><?php echo $row['Fecha_Creacion'] ?></td>
 									<td><?php echo $row['fecha_vencimiento'] ?></td>
 									<td><?php echo $row['prioridad'] ?> </td>
 									<td><?php echo $row['responsable'] ?></td>
 									<td>
 										<a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
 											<i class="fas fa-marker"> </i>
 										</a>
 											
 										<a href="borrar.php?id=<?php echo $row['id']?>"class="btn btn-danger">
 											<i class="far fa-trash-alt"></i>
 										</a>	

 									</td>
 								</tr>
 						<?php } ?> 						
 					</tbody>
 				</table>
 		</div>
 	 </div>	
 	</div>

<?php include("includes/footer.php") ?>	






		