<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
session_start();
include "mysql.php";
if(isset($_POST["submit"]))
{
	$_SESSION["tablename"] = $_POST["submit"];
}
$tablename = $_SESSION["tablename"];
$_SESSION["tablename"] = $tablename;
$sql = "SELECT * FROM ".$tablename;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
{
	echo "<table>";
	echo "<th>$tablename</th>";
    while($row = mysqli_fetch_row($result)) 
	{
		echo "<tr>";
		$rowid = 0;
		foreach($row as $name => $value)
		{
			if($rowid == 0)
			{
				$id = $value;
			}
			echo "<td>".$value."</td>";
			$rowid = $rowid + 1;
		}
		echo "<td><form action='edit.php' method='post'><input type='hidden' name='id1' value='$id'><input type='submit' value='Edit'></form></td>";
		echo "<td><form action='delete.php' method='post'><input type='hidden' name='id' value='$id'><input type='submit' value='Delete' name='submit'></form></td>";
		echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
} 
?>
<button><a href='add.php'>Add</a></button>
<button><a href='show.php'>Back</a></button>
</html>