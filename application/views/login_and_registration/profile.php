<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student's Profile</title>
	<link rel="stylesheet" href="/user_guide/css/profile-style.css">
</head>
<body>
	<div class='container'>
		<h1>Welcome <?= $this->session->userdata('student_name') ?>!</h1>
		<h2>First Name: <?= $this->session->userdata('first_name') ?></h2>
		<h2>Last Name: <?= $this->session->userdata('last_name') ?></h2>
		<h2>Email Address: <?= $this->session->userdata('student_email') ?></h2>
		<a href="/students/logout">Log off</a>
	</div>
</body>
</html>