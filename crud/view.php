<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>



<a href="http://localhost/asd/crud/index.php"><h2><b>HOME PAGE</b></h2></a>
<form>
<select name="schools">
<?php
	$con = mysqli_connect("localhost", "root", "", "crud");
    $result = $con->query("SELECT * FROM students");
	while($row=mysqli_fetch_array($result)):
?>
    
    <option value="<?php echo $row['school']; ?>"><?php echo $row['school']; ?></option>

    <?php endwhile; ?>
    <input type="submit">
    </select>
</form>

                        <?php
                            $choosenSchool="";
                            $choosenSchool=$_GET['schools'];
							$con = mysqli_connect("localhost", "root", "", "crud");
    						$result = $con->query("SELECT * FROM students WHERE school='$choosenSchool'");
							while($row=mysqli_fetch_array($result)):
						?>
                            		<p><?php echo $row['first_name']; ?>    <?php echo $row['last_name'];  ?>    <?php echo $row['birthdate'];  ?></p>
							<?php endwhile; ?>
						


<h2 style="text-align:center">Student Info</h2>

<div class="card">
    <?php
    if (isset($_GET['id']))
    {
        $id=($_GET['id']);
        $con = mysqli_connect("localhost", "root", "", "crud");
    	$result = $con->query("SELECT * FROM students WHERE id='$id'");
        $row=mysqli_fetch_array($result);
    }
    ?>
    <img src="<?php echo $row['pictureUrl']; ?>" alt="<?php echo $row['first_name']; ?>" style="width:100%">
    <h1><?php echo $row['first_name']; ?></h1>
    <h1><?php echo $row['last_name']; ?></h1>
    <p><?php echo $row['birthdate']; ?></p>
    <p><?php echo $row['school']; ?></p>
</div>

</body>
</html>
