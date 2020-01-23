<!DOCTYPE html>
<link rel="stylesheet" href="./css/style.css">
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD</title>
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
						<h2><b>Students</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							ID
						</th>
                        <th>First Name</th>
                        <th>Last Name</th>
						<th>Birthdate</th>
                        <th>School</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
						

						<?php
							$con = mysqli_connect("localhost", "root", "", "crud");
    						$result = $con->query("SELECT * FROM students");
							while($row=mysqli_fetch_array($result)):
						?>
							<tr>
									<td>
									<?php echo $row['id']; ?>
									</td>
                            		<td><?php echo $row['first_name']; ?> </td>
									<td><?php echo $row['last_name'];  ?></td>
									<td><?php echo $row['birthdate'];  ?></td>
									<td><?php echo $row['school'];  ?></td>

									<td>							
									<button type="button" name="edit" class="btn btn-success editbtn"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE254;</i> </a>
									<button type="button" name="deleterow" class="btn btn-success deleterow"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE872;</i> </a>
                        			</td>
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
						<h4 class="modal-title">Add Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Firs Name</label>
							<input type="text" name="student_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="student_last_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Birth Date</label>
							<input type="date" name="bday" required>
						</div>
						<div class="form-group">
							<label>School</label>
							<input type="text" name="school_name" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="add" value="Add">
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

							<input type="hidden" id="update_id" name="update_id">


						<div class="form-group">
							<label>First Name</label>
							<input type="text" id="student_name2" name="student_name2" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" id="student_last_name2" name="student_last_name2" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Birth Date</label>
							<input type="date" id="bday2" name="bday2" required>
						</div>
						<div class="form-group">
							<label>School</label>
							<input type="text" id="school_name2" name="school_name2" class="form-control" required>
						</div>					
					</div>
					
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="saveChanges" class="btn btn-success" value="Save">
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
							<h4 class="modal-title">Delete Student</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">					
							<p>Are You sure you want to delete?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-danger" name="delete" value="Delete">
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
							<input type="submit" class="btn btn-danger" name="deleterow" value="Delete">
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

			$('#update_id').val(data[0]);
			$('#student_name2').val(data[1]);
			$('#student_last_name2').val(data[2]);
			$('#bday2').val(data[3]);
			$('#school_name2').val(data[4]);

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