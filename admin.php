<!DOCTYPE html>
<html>
	<head>
		<title>Web Technology</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="stylesheet" href="bs.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
<body>
	<nav class = 'navbar navbar-inverse'>
		<div class = 'container-fluid'>
			<div class = 'row'>
				<div class = 'col-md-6'>
					<div class="navbar-header">
					<a class="navbar-brand" href="#">ReadersAreLeaders</a>
					</div>
					<ul class="nav navbar-nav">
						<li><a href="aboutus.html">Add Book</a></li>
						<li><a href="books.html">Update Book Info</a></li>
						<li><a href="contactus.html">Contact Us</a></li>
					</ul>
				</div>
		<div class = "col-md-6">
			<form class="navbar-form navbar-right">
				<div class="form-group">
					<label class = 'sr-only' for="email">Email address:</label>
					<input type="text" class="form-control" id="email" placeholder = 'Enter Keyword' required>
				</div>
				<div class="form-group">
				  <label for="option" class = "sr-only">Searching Criteria</label>
				  <select class="form-control" id="option">
					<option>ISBN Id</option>
					<option>Book Title</option>
					<option>Author Name</option>
					<option>Publisher</option>
				</select>
				</div>
				<button type="submit" class="btn btn-primary">Search</button>
			</form>
		</div>
			</div>
		</div>
	</nav>
	<div class = "container">
		<div class = "row">
			<form class = "form-horizontal" method = "POST">
			<h2>Add new book</h2>
				<div class="form-group">
					<label class = "control-label  col-sm-2" for="isbnid">ISBN Id:</label>
					<div class="col-sm-10">
					<input type="number" class="form-control" id="isbnid" value = "<?php $connection= mysqli_connect("localhost","root","","readersareleaders"); $query = "SELECT bookid FROM books ORDER BY bookid DESC LIMIT 1"; $stmt=    $connection->prepare($query); $stmt->execute();
					$stmt->bind_result($id);
					if($stmt->fetch()){echo $id+1; $stmt->close();}else echo 33; ?>" disabled>
				</div>
				</div>
				<div class="form-group">
					<label class = "control-label  col-sm-2" for="booktitle">Book Name:</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" name = "booktitle" id="booktitle" placeholder = 'Book Name' required>
				</div>
				</div>
				<div class="form-group">
					<label class = "control-label  col-sm-2" for="bookauthor">Author Name:</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" name = "bookauthor" id="bookauthor" placeholder = 'Author Name' required>
				</div>
				</div>
				<div class="form-group">
					<label class = "control-label  col-sm-2" for="bookpublisher">Publisher:</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" name = "bookpublisher" id="publisher" placeholder = 'Publisher' required>
				</div>
				</div>
				  <div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" name = "submit" class="btn btn-success">Add Book</button>
					  <button type="Reset" class="btn btn-danger">Clear All</button>
					</div>
				  </div>
				</form>
					<?php
						if(isset($_POST["submit"])){
							$btitle=$_POST["booktitle"];
							$bauthor=$_POST["bookauthor"];
							$bpublisher=$_POST["bookpublisher"];
							$conn= mysqli_connect("localhost","root","","readersareleaders");
							$stmt=    $conn->prepare("insert into books ( booktitle, bookauthor, bookpublisher) values (?,?,?)");
							$stmt->bind_param("sss",$btitle,$bauthor,$bpublisher);
							echo $stmt->execute();
							$stmt->close();
						}
					?>
		</div>
	</div>
	<footer class = 'navbar-fixed-bottom navbar-default'><center><p class = "navbar-text">&copy;Right Reserved ReadersAreLeaders</p></center></footer>
</body>
</html>