<nav class = 'navbar navbar-inverse'>
		<div class = 'container-fluid'>
			<div class = 'row'>
				<div class = 'col-md-6'>
					<div class="navbar-header">
					<a class="navbar-brand" href="#">ReadersAreLeaders</a>
					</div>
					<ul class="nav navbar-nav">
						<li><a href="aboutus.php">About Us</a></li>
						<li><a href="books.php">Books</a></li>
						<li><a href="contactus.php">Contact Us</a></li>
					</ul>
				</div>
		<div class = "col-md-6">
			<form class="navbar-form navbar-right" action = '' method = 'POST'>
				<div class="form-group">
					<label class = 'sr-only' for="email">Email address:</label>
					<input type="email" class="form-control" id="email" placeholder = 'Email' name = 'loginemail' required>
				</div>
				<div class="form-group">
					<label class = 'sr-only' for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" placeholder = 'Password' name = 'loginpassword'required>
				</div>
				<button type="submit" class="btn btn-primary" name = 'login'>Login</button>
			</form>
			<?php
			error_reporting(0);
			$login_session = session_start();
				if(isset($_POST['login'])){
					$email = $_POST['loginemail'];
					$password = $_POST['loginpassword'];
					$conn = mysqli_connect("localhost", "root", "", "readersareleaders");
					$query = "Select * from users where email =? and password=?";
					$stmt = $conn->prepare($query);
					$stmt->bind_param("ss", $email, md5($password));
					if($stmt->execute()){
						if($stmt->fetch())
						echo "<font color ='white'>User loged In</font>";
					else
						echo "<font color = 'white'>Failed to login</font>";
					}
					else
						echo "<font color = 'white'>Failed to login</font>";
				}
			?>
		</div>
			</div>
		</div>
	</nav>