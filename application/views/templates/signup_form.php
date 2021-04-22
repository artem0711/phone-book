<? $error = $this->session->flashdata('error'); ?>
<? $attributes = array('class' => 'col-lg-12 animated fadeIn'); ?>
<ul class="nav navbar-nav navbar-right">
	<li class="dropdown button <? echo $error ? 'open' : ''; ?>">
		<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
			<span class="glyphicon glyphicon-new-window"></span>
			Sign Up
		</a>
		<ul class="dropdown-menu animated fadeIn">
			<li>
				<? echo form_open('auth/signup', $attributes); ?>
				<h3>Sign Up</h3>
				<? echo $error ? '<div class="alert alert-warning">' . $error . '</div>' : ''; ?>

				<!-- Textedit Username -->
				<div class="form-group">
					<? $error = form_error('username_signup', '<p class="text-danger">', '</p>'); ?>
					<div class="input-group <? echo $error ? 'has-error' : ''; ?>">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-user">
							</span>
						</span>
						<input type="text" id="username_signup" name="username_signup" class="form-control" placeholder="Username" autofocus />
					</div>
					<? echo $error; ?>
				</div>

				<!-- Textedit Password -->
				<div class="form-group">
					<? $error = form_error('password_signup', '<p class="text-danger">', '</p>'); ?>
					<div class="input-group <? echo $error ? 'has-error' : ''; ?>">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock">
							</span>
						</span>
						<input type="password" id="password_signup" name="password_signup" class="form-control" placeholder="Password" />
					</div>
					<? echo $error; ?>
				</div>

				<!-- Textedit Password -->
				<div class="form-group">
					<? $error = form_error('passconf_signup', '<p class="text-danger">', '</p>'); ?>
					<div class="input-group <? echo $error ? 'has-error' : ''; ?>">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock">
							</span>
						</span>
						<input type="password" id="passconf_signup" name="passconf_signup" class="form-control" placeholder="Password confirmation" />
					</div>
					<? echo $error; ?>
				</div>

				<!-- Login button -->
				<div class="form-group">
					<button type="submit" class="btn btn-success">Register</button>
				</div>
				<? echo form_close(); ?>
			</li>
		</ul>
	</li>
</ul>