<?php
	$conn= mysqli_connect("localhost","root","","readersareleaders"); 
	$query = "SELECT bookid FROM books ORDER BY bookid DESC LIMIT 1";
	$stmt=    $conn->prepare($query); 
	f($stmt->execute()){
			$stmt->bind_result($id);
			echo $id+1;
			$stmt->close();}
			else
				echo 33;
?>