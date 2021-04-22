<!DOCTYPE html>
<html>

<head>
	<title>Company phone book</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/helper.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/animate.css" />
</head>

<body>
	<nav class="navbar navbar-default navbar-expand-lg">
		<div class="container">
			<a class="navbar-brand" href="/">
				<span class="glyphicon glyphicon-book"></span> Phone book
			</a>
			<? if ($logged_in): ?>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="/auth/logout">
						<span class="glyphicon glyphicon-log-in"></span>
						Logout
					</a>
				</li>
			</ul>
			<? else: ?>
			<? $this->view('templates/signin_form'); ?>
			<? $this->view('templates/signup_form'); ?>
			<? endif; ?>
		</div>
	</nav>

	<div class="container">