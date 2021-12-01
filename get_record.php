

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="index.css">
        <style>
            form{
                margin: 20px;
            }
        </style>
    </head>
    <body>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <p>Enter name of actor to be searched: </p><br><input type="text" name = "actor">
            <button type="submit" name="submit">Submit</button>
        </form>

        <?php
include 'config.php';
if(isset($_POST['submit'])){
	$actor = mysqli_real_escape_string($conn, $_POST['actor']);
    $sql = "SELECT * FROM movies WHERE actor LIKE '%$actor%'";
    $result = mysqli_query($conn, $sql);
    ?>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr No</th>
      <th scope="col">Movie Name</th>
      <th scope="col">Actor Name</th>
      <th scope="col">Actress Name</th>
      <th scope="col">Year of Release</th>
      <th scope="col">Director Name</th>
    </tr>
  </thead>
  <tbody>
    <?php
        if(mysqli_num_rows($result) > 0){
            $i = 1;
            while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td> <?=$i++?> </td>
                    <td> <?=$row["movie"]?> </td>
                    <td> <?=$row["actor"]?> </td>
                    <td> <?=$row["actress"]?> </td>
                    <td> <?=$row["year"]?> </td>
                    <td> <?=$row["director"]?> </td>
                </tr>
            <?php  
            }}
            else{
                echo "There are no rows!";
            }
        ?>
  </tbody>
</table>
<?php
}
?>

        
        
    </body>
</html>


