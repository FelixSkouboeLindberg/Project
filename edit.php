<?php
include "mysql.php";
session_start();

$table = $_SESSION["tablename"];

if(isset($_POST["submit"]))
{
	$id = $_POST["id"];
	if($table == "schools")
	{
		$input1 = $_POST["name"];
		$input2 = $_POST["location"];
		$sql = "UPDATE ".$table." SET name='$input1' location='$input2' WHERE id='$id'";
	}
	elseif($table == "students")
	{
		$input1 = $_POST["name"];
		$input2 = $_POST["schoolID"];
		$input3 = $_POST["classroomID"];
		$sql = "UPDATE ".$table." SET name='$input1', schoolID='$input2', classroomID='$input3' WHERE id='$id'";
	}
	elseif($table == "teachers")
	{
		$input1 = $_POST["name"];
		$input2 = $_POST["school"];
		$sql = "UPDATE ".$table." SET name='$input1' school='$input2' WHERE id='$id'";
	}
	elseif($table == "studentteacher")
	{
		$input1 = $_POST["studentID"];
		$input2 = $_POST["teacherID"];
		$sql = "UPDATE ".$table." SET studentID='$input1' teacherID='$input2' WHERE id='$id'";
	}
	elseif($table == "classrooms")
	{
		$input1 = $_POST["name"];
		$sql = "UPDATE ".$table." SET name='$input1' WHERE id='$id'";
	}
	$result = mysqli_query($conn, $sql);
	if($result)
	{
		echo "Success";
	}else{
		echo mysqli_error($conn);
	}
}else{
	$id = $_POST["id1"];
}

$sqli = "SELECT * FROM ".$table." WHERE id='$id' LIMIT 1";
$result1 = mysqli_query($conn, $sqli);

if (mysqli_num_rows($result1) > 0) 
{
	echo "<form action='edit.php' method='post'>";
    while($row = mysqli_fetch_assoc($result1)) 
	{
		foreach($row as $name => $value)
		{
			if($name != "id")
			{
				echo $name.":<br>";
				echo "<input type='text' name='$name' value='$value'><br>";
			}
			else
			{
				echo "<input type='hidden' name='$name' value='$value'>";
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