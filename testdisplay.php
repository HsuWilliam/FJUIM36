<!DOCTYPE html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eticket";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $res = mysqli_query($conn,"SELECT * FROM images");
    echo "<table>";
    while($row=mysqli_fetch_array($res)){

        echo "<tr>";
        echo "<td>";?> <img src="<?php echo $row["img-dir"]; ?>" height="300" width="300"> 
        <?php echo "</td>";
        echo "<td>"; echo $row["name"]; echo "</td>";
        
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>"
?>
<html>
<head>
<meta charset="utf-8">
<title>display</title>
    <body>
</body>
</head>