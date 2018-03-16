<?php
	include "headsection.php";
	include "nav.php";
?>
<div class = 'container-fluid'>
		<div class = 'row'>
			<div class = 'col-md-8'>
				
			</div>
			<div class = 'col-md-4'>
				<h2>Sign Up For Free</h2>
				<form action="" method = 'POST'>
				<div class="form-group form-inline">
					<label class = 'sr-only' for="fname">First Name:</label>
					<input type="text" class="form-control" id="fname" placeholder = 'First Name' name = 'fname' required>
					<label class = 'sr-only' for="lname">Last Name</label>
					<input type="text" class="form-control" id="lname" placeholder = 'Last Name' name = 'lname' required>
				</div>
				<div class="form-group">
					<label class = 'sr-only' for="email">Email:</label>
					<input type="email" class="form-control" id="email" placeholder = 'Email' name = 'email' required>
				</div>
				<div class="form-group">
					<label class = 'sr-only' for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" placeholder = 'Password' name = 'password' required>
				</div>
				<h4>Gender:</h4>
				<div class="form-group">
					<label class = 'sr-only' for="pwd">gender:</label>
					<input type="password" class="form-control" id="pwd" placeholder = 'Gender' name = 'gender' required>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" value="">Agree to terms and conditions....</label>
				</div>
				<button type="submit" class="btn btn-success" name = 'cprofile'>Create Profile</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</form>
			<?php
			if(isset($_POST['cprofile'])){
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$gender = $_POST['gender'];
				$conn = mysqli_connect("localhost", "root", "", "eadersareleaders");
				$query = "Insert into users (fname, lname, email, password, gender) values (?,?,?,?,?);";
				$stmt = $conn->prepare($query);
				$stmt->bind_param("sssss", $fname, $lname, $email, md5($password), $gender);
				if($stmt->execute())
					echo "Profile created successfully";
				else
					echo "Failed to signup! Try again";
			}
			?>
			</div>
		</div>
	</div>
	<footer class = 'navbar-fixed-bottom'><center><p>&copy;Right Reserved ReadersAreLeaders</p></center></footer>
</body>
</html>