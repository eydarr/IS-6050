<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Tunes</title>
</head>

<body>
<h1>My tunes</h1>

<?php

	$host = "localhost";
	$user = "vince";
	$pass = "vince";
	$database = "test";
	
	$conn = new mysqli($host, $user, $pass, $database);
	
	if ($conn->connect_error) 
		die ("Unable to connect to database: " . $conn->connect_error );

	$sql = "select * from song_table";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    		echo "<table><tr><th>Song Name</th><th>Artist or Group</th><th>Album</th></tr>";
	    	while($row = $result->fetch_assoc()) {
        		echo "<tr><td>".$row["Song Name"]."</td><td>".$row["Artist or Group"]."</td><td>".$row["Album"]."</td></tr>";
    		}
    		echo "</table>";
	} 	
	else {
    		echo "You have no songs";
	}
	$conn->close();	
?>

</body>
</html>
