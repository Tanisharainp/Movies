<?php 
    include 'config.php';
    $sql = "SELECT * FROM movies";
    $result = mysqli_query($conn, $sql);
?>

<html>
    <head>
        <title>Records</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <h2 style="margin-left:500;"> MOVIE RECORDS </h2>
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
  <h1 style = "margin-left:570px;">MOVIES TABLE</h1>
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
            <?php  }
        }?>
  </tbody>
</table>
</body>

</html>