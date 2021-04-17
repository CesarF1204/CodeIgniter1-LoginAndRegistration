<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login and Registration</title>
	<link rel="stylesheet" href="user_guide/css/style.css">
</head>
<body>
<div style='text-align: center'>
<!-- login form validation -->
<?php 	if($this->session->flashdata('login_errors')) {
			echo '<span class="login-errors">'.$this->session->flashdata('login_errors').'</span>';
		} else if($this->session->flashdata('invalid_login')) {
			echo $this->session->flashdata('invalid_login');
		}
?>
<!-- registration form validation -->
<?php	if($this->session->flashdata('register_errors')) {
			echo '<span class="register-errors">'.$this->session->flashdata('register_errors').'</span>';
		} else if($this->session->flashdata('added')) {
			echo '<span class="added">'.$this->session->flashdata('added').'</span>';
		}
?>
</div>
<div class='container'>
	<div class='login'>
		<h1>Login</h1>
		<form action="/students/login" method='post'>
			<label for="email">Email Address: </label>
			<input type="email" name='email' id='email'>

			<label for="password">Password: </label>
			<input type="password" name='password' id='password'>

			<input type="submit" value='Login'>
		</form> 
	</div>
	<div class='register'>
		<h1>or Register an Acccount</h1>
		<form action="/students/register" method='post'>
			<label for="first_name">First Name: </label>
			<input type="text" name='first_name' id='first_name'>

			<label for="last_name">Last Name: </label>
			<input type="text" name='last_name' id='last_name'>

			<label for="email">Email Address: </label>
			<input type="email" name='email' id='email'>

			<label for="password">Password: </label>
			<input type="password" name='password' id='password'>

			<label for="confirm-password">Confirm Password: </label>
			<input type="password" name='confirm_password' id='confirm-password'>

			<input type="submit" value='Register'>
		</form>
	</div>
</div>
</body>
</html>