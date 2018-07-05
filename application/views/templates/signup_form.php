<ul class="nav navbar-nav navbar-right">
	<li class="dropdown button">
		<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
			<span class="glyphicon glyphicon-new-window"></span>
			Sign Up
		</a>
		<ul class="dropdown-menu animated fadeIn">
			<li>
				<?php echo form_open('auth/signup'); ?>
					<div class="col-lg-12 animated fadeIn">
						<h3>Sign Up</h3>
						<?php $success = $this->session->flashdata('success'); ?>
						<?php echo $success ? '<div class="alert alert-success">'.$success.'</div>' : ''; ?>

						<!-- Textedit Username -->
						<div class="form-group">
							<?php $error = form_error('username_signup', '<p class="text-danger">', '</p>') ?>
								<div class="input-group <?php echo $error ? 'has-error' : '' ?>">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-user">
										</span>
									</span>
									<input type="text" id="username_signup" name="username_signup" class="form-control" placeholder="Username" autofocus />
								</div>
							<?php echo $error; ?>
						</div>
						
						<!-- Textedit Password -->
						<div class="form-group">
						<?php $error = form_error('password_signup', '<p class="text-danger">', '</p>') ?>
							<div class="input-group <?php echo $error ? 'has-error' : '' ?>">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock">
									</span>
								</span>
								<input type="password" id="password_signup" name="password_signup" class="form-control" placeholder="Password" />
							</div>
						<?php echo $error; ?>
						</div>

						<!-- Textedit Password -->
						<div class="form-group">
						<?php $error = form_error('passconf_signup', '<p class="text-danger">', '</p>') ?>
							<div class="input-group <?php echo $error ? 'has-error' : '' ?>">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock">
									</span>
								</span>
								<input type="password" id="passconf_signup" name="passconf_signup" class="form-control" placeholder="Password confirmation" />
							</div>
						<?php echo $error; ?>
						</div>
				
						<!-- Login button -->
							<button type="submit" class="btn btn-success">Register</button>
					</div>
				</form>
			</li>
		</ul>
	</li>
</ul>