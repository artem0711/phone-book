<?php $error_signin = $this->session->flashdata('error_signin'); ?>
<?php $success = $this->session->flashdata('success'); ?>
<ul class="nav navbar-nav navbar-right">
	<li class="dropdown button <?php echo ($error_signin or $success) ? 'open' : '' ?>">
		<a class="dropdown-toggle" data-toggle="dropdown" role="button">
			<span class="glyphicon glyphicon-log-in"></span>
			Sign In
		</a>
		<ul class="dropdown-menu animated fadeIn">
			<li>
				<?php echo form_open('auth/signin'); ?>
					<div class="col-lg-12 animated fadeIn">
						<h3>Sign In</h3>
						<?php echo $success ? '<div class="alert alert-success">'.$success.'</div>' : ''; ?>
						<?php echo $error_signin ? '<div class="alert alert-warning">'.$error_signin.'</div>' : ''; ?>

						<!-- Textedit Username -->
						<div class="form-group">
							<?php $error_signin = form_error('username_signin', '<p class="text-danger">', '</p>') ?>
								<div class="input-group <?php echo $error_signin ? 'has-error' : '' ?>">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-user">
										</span>
									</span>
									<input type="text" id="username_signin" name="username_signin" class="form-control" placeholder="Username" autofocus />
								</div>
							<?php echo $error_signin; ?>
						</div>
						
						<!-- Textedit Password -->
						<div class="form-group">
						<?php $error_signin = form_error('password_signin', '<p class="text-danger">', '</p>') ?>
							<div class="input-group <?php echo $error_signin ? 'has-error' : '' ?>">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock">
									</span>
								</span>
								<input type="password" id="password_signin" name="password_signin" class="form-control" placeholder="Password" />
							</div>
						<?php echo $error_signin; ?>
						</div>
				
						<!-- Login button -->
							<button type="submit" class="btn btn-success">Login</button>
					</div>
				</form>
			</li>
		</ul>
	</li>
</ul>