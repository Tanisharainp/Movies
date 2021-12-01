<?php
include 'config.php';
if(isset($_POST['submit'])){
	$movie = mysqli_real_escape_string($conn, $_POST['movie']);
	$actor = mysqli_real_escape_string($conn, $_POST['actor']);
	$actress = mysqli_real_escape_string($conn, $_POST['actress']);
	$year = mysqli_real_escape_string($conn, $_POST['year']);
	$director = mysqli_real_escape_string($conn, $_POST['director']);

	$stmt = $conn->prepare("insert into movies(movie, actor, actress, year, director) values (?, ?, ?, ?, ?)");
	$stmt->bind_param('sssis', $movie, $actor, $actress, $year, $director);
	$stmt->execute();
	echo "<script>alert('Added Successfully!'); window.location = 'index.php'; </script>";
	$stmt->close();
	$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Movie Page</title>
	<link rel="stylesheet" href="index.css">
</head>

<body id="register">
	
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="registeruser" name="myform">
		<p>Movie Name</p><input type="text" placeholder="Enter movie name" name="movie"><br>
		<p>Actor Name</p><input type="text" placeholder="Enter actor name" name="actor"><br>
		<p>Actress Name</p><input type="text" placeholder="Enter actress name" name="actress"><br>
		<p>Year of release</p><input type="text" placeholder="Enter the year of release" name="year"><br>
		<p>Director Name</p><input type="text" placeholder="Enter director name" name="director"><br>
		
		<button type="submit" name="submit" id="submit">Submit</button><br>
		<button class="show" type="submit"><a href="view_records.php">Display Table</a></button><br>
		<button class="show" type="submit"><a href="get_record.php">Display Table by actor name</a></button>
	</form>  

</body>

</html>