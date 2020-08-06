<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projektu Valdymas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
 require_once 'process.php';
?>
<?php
$servername = "localhost";
$username = "root";
$password = "mysql";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE crud";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} 

mysqli_close($conn);
?>



<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "crud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE data (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
course VARCHAR(30) NOT NULL

)";

if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} 

mysqli_close($conn);
?>


<?php
    

  $sql = "SELECT id, name, course FROM data";
    $result = mysqli_query($mysqli, $sql);

    print "<table>";
    print "<th>Vardas</th><th>Kursas</th><th>Veiksmai</th>";    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            print "<tr>";
            echo "<td>" . $row["name"]. "</td>";
            echo "<td>" . $row["course"]. "</td>";
            echo "<td> <a href='index.php?edit=".$row["id"]."'> Edit </a>
            <a class='red' href='index.php?delete=".$row["id"]."'>    Delete </a>
            </td>";
            
        }
        print "</tr>";
    }
    
    print "</table>";
    
    mysqli_close($mysqli);
  
?>

<form action="process.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Vardas</label>
    <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Įveskite vardą"><br>
    <label>Kursas</label>
    <input type="text" name="course"value="<?php echo $course; ?>" placeholder="Įveskite kursą"><br>  
    <?php
    if($update==true):
?>
    <button class="update" type="submit" name="update">Atnaujinti</button>
    <?php else: ?>
        <button type="submit" name="save">Sukurti</button>
    <?php endif; ?>
</form>
</body>
</html>