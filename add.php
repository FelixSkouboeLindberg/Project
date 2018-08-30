<?php
include "mysql.php";
session_start();

$table = $_SESSION["tablename"];

if(isset($_POST["submit"]))
{
	if($table == "schools")
	{
		$input1 = $_POST["name"];
		$input2 = $_POST["location"];
		$sql = "INSERT INTO ".$table." (name, location) VALUES ('$input1', '$input2')";
	}
	elseif($table == "students")
	{
		$input1 = $_POST["name"];
		$input2 = $_POST["schoolID"];
		$input3 = $_POST["teacherID"];
		$sql = "INSERT INTO ".$table." (name, schoolID, teacherID) VALUES ('$input1', '$input2', '$input3')";
	}
	elseif($table == "teachers")
	{
		$input1 = $_POST["name"];
		$input2 = $_POST["school"];
		$sql = "INSERT INTO ".$table." (name, school) VALUES ('$input1', '$input2')";
	}
	elseif($table == "studentteacher")
	{
		$input1 = $_POST["studentID"];
		$input2 = $_POST["teacherID"];
		$sql = "INSERT INTO ".$table." (studentID, teacherID) VALUES ('$input1', '$input2')";
	}
	elseif($table == "classrooms")
	{
		$input1 = $_POST["name"];
		$sql = "INSERT INTO ".$table." (name) VALUES ('$input1')";
	}
	$result = mysqli_query($conn, $sql);
	if($result)
	{
		echo "Success";
	}else{
		echo mysqli_error($conn);
	}
}

$sqli = "SELECT * FROM ".$table." LIMIT 1";
$result1 = mysqli_query($conn, $sqli);

if (mysqli_num_rows($result1) > 0) 
{
	echo "<form action='add.php' method='post'>";
    while($row = mysqli_fetch_assoc($result1)) 
	{
		foreach($row as $name => $value)
		{
			if($name != "id")
			{
				echo $name.":<br>";
				echo "<input type='text' name='".$name."'><br>";
			}
		}
		echo "<input type='submit' name='submit' value='Submit'>";
		echo "<button><a href='post.php'>Back</a></button>";
    }
	echo "</form>";
} else {
    echo "0 results";
} 
?>