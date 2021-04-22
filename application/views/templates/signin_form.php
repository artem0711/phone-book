<? $error_signin = $this->session->flashdata('error_signin'); ?>
<? $success = $this->session->flashdata('success'); ?>
<? $attributes = array('class' => 'col-lg-12 animated fadeIn'); ?>
<ul class="nav navbar-nav navbar-right">
	<li class="dropdown button <? echo ($error_signin) ? 'open' : ''; ?>">
		<a class="dropdown-toggle" data-toggle="dropdown" role="button">
			<span class="glyphicon glyphicon-log-in"></span>
			Sign In
		</a>
		<ul class="dropdown-menu animated fadeIn">
			<li>
				<? echo form_open('auth/signin', $attributes); ?>
				<h3>Sign In</h3>
				<? echo $success ? '<div class="alert alert-success">'.$success.'</div>' : ''; ?>
				<? echo $error_signin ? '<div class="alert alert-warning">'.$error_signin.'</div>' : ''; ?>

				<!-- Textedit Username -->
				<div class="form-group">
					<? $error_signin = form_error('username_signin', '<p class="text-danger">', '</p>'); ?>
					<div class="input-group <? echo $error_signin ? 'has-error' : ''; ?>">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
						</span>
						<input type="text" id="username_signin" name="username_signin" class="form-control" placeholder="Username" autofocus />
					</div>
					<? echo $error_signin; ?>
				</div>

				<!-- Textedit Password -->
				<div class="form-group">
					<? $error_signin = form_error('password_signin', '<p class="text-danger">', '</p>'); ?>
					<div class="input-group <? echo $error_signin ? 'has-error' : ''; ?>">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
						</span>
						<input type="password" id="password_signin" name="password_signin" class="form-control" placeholder="Password" />
					</div>
					<? echo $error_signin; ?>
				</div>

				<!-- Login button -->
				<div class="form-group">
					<button type="submit" class="btn btn-success">Login</button>
				</div>
				<? echo form_close(); ?>
			</li>
		</ul>
	</li>
</ul>