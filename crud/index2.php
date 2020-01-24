<!DOCTYPE html>
<link rel="stylesheet" href="./css/style.css">
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD2</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
</style>
<script type="text/javascript">

</script>
</head>
<body>

<?php if (isset($_SESSION['message'])): ?>
        <p><?php echo $_SESSION['message'];
        unset ($_SESSION['message']);
		endif;
		?>
	

<td></td>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                    <h2><b> --> Schools <-- </b></h2> <a href="http://localhost/asd/crud/index.php"><h2><b>Students</b></h2></a>
                        
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New School</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete data</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							ID
						</th>
                        <th>Name</th>
                        <th>Adress</th>
						<th>Max. students allowed</th>
                        <th>Courses yearly fee</th>
						<th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
						

						<?php
							$con = mysqli_connect("localhost", "root", "", "crud");
    						$result = $con->query("SELECT * FROM schools");
							while($row=mysqli_fetch_array($result)):
                        ?>
							<tr>
									<td>
									<?php echo $row['id']; ?>
									</td>
                            		<td><?php echo $row['name']; ?> </td>
									<td><?php echo $row['address']; ?></td>
									<td><?php echo $row['max_students_alw'];  ?></td>
									<td><?php echo $row['courses_fee'];  ?></td>
							
									<td colspan="2"><button type="button" name="edit" class="btn btn-success editbtn"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i> </a>
									<button type="button" name="deleterow" class="btn btn-success deleterow"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i> </a> </td>
                        			
							</tr>
							<?php endwhile; ?>
						
                	</tbody>
            </table>
        </div>
    </div>

	<!-- ADD Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php require_once("insert.php")?>
				<form action="insert.php" method=post>
					<div class="modal-header">						
						<h4 class="modal-title">Add School</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>School Name</label>
							<input type="text" name="school_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Adress</label>
							<input type="text" name="adress" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Maximum students allowed</label>
							<input type="number" name="max_students" required>
						</div>
						<div class="form-group">
							<label>Courses yearly fee</label>
							<input type="number" name="fee" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="add_school" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- EDIT Modal HTML -->
	<div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

			<?php require_once("edit.php"); ?>

					<div class="modal-header">						
						<h4 class="modal-title" id="exampleModalLabel">Edit Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form action="edit.php" method=POST>
						<div class="modal-body">	

							<input type="hidden" id="update_idSch" name="update_idSch">


						<div class="form-group">
							<label>School Name</label>
							<input type="text" id="school_name2" name="school_name2" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Adress</label>
							<input type="text" id="adress2" name="adress2" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Maximum student allowed</label>
							<input type="number" id="max_students2" name="max_students2" required>
						</div>
						<div class="form-group">
							<label>Courses yearly fee</label>
							<input type="number" id="fee2" name="fee2" class="form-control" required>
						</div>					
					</div>
					
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="saveChangesSch" class="btn btn-success" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- DELETE Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php require_once("delete.php")?>
					<form action="delete.php" method=post>
						<div class="modal-header">						
							<h4 class="modal-title">Delete Schools</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">					
							<p>Are You sure you want to delete all data?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-danger" name="deleteSch" value="Delete">
						</div>
					</form>
			</div>
		</div>
	</div>


	<div id="deleteRowModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php require_once("delete.php")?>
					<form action="delete.php" method=post>
						<div class="modal-header">						
							<h4 class="modal-title">Delete</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<input type="hidden" id="update_id2" name="update_id2">
						</div>
						<div class="modal-body">					
							<p>Are You sure you want to delete?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-danger" name="deleterowSch" value="Delete">
						</div>
					</form>
			</div>
		</div>
	</div>


<script>
	$(document).ready(function()
	{
		$('.editbtn').on("click", function()
		{
			$('#editmodal').modal('show');
			$tr=$(this).closest('tr');
			var data=$tr.children("td").map(function()
			{
				return $(this).text();
			}).get();

			console.log(data);

			$('#update_idSch').val(data[0]);
			$('#school_name2').val(data[1]);
			$('#adress2').val(data[2]);
			$('#max_students2').val(data[3]);
			$('#fee2').val(data[4]);

		});

								

	});


	$(document).ready(function()
	{
		$('.deleterow').on("click", function()
		{
			$('#deleteRowModal').modal('show');
			$tr=$(this).closest('tr');
			var data=$tr.children("td").map(function()
			{
				return $(this).text();
			}).get();

			console.log(data);

			$('#update_id2').val(data[0]);
		});

								

	});

</script>
	
</body>
</html>