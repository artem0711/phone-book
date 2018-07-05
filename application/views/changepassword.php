<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<?php echo form_open(''); ?>
			<div class="col-lg-12 animated bounceIn">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Change password</h3>
					</div>
					<div class="panel-body">
						<?php $error = $this->session->flashdata('error'); ?>
						<?php $success = $this->session->flashdata('success'); ?>
						<?php echo $error ? '<div class="alert alert-warning">'.$error.'</div>' : ''; ?>
						<?php echo $success ? '<div class="alert alert-success">'.$success.'</div>' : ''; ?>

						<!-- Textedit Old password -->
						<div class="form-group">
							<?php $error = form_error('old_password', '<p class="text-danger">', '</p>') ?>
								<div class="input-group <?php echo $error ? 'has-error' : '' ?>">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-lock">
										</span>
									</span>
									<input type="password" id="old_password" name="old_password" class="form-control" placeholder="Old password" autofocus />
								</div>
							<?php echo $error; ?>
						</div>
						
						<!-- Textedit New password -->
						<div class="form-group">
						<?php $error = form_error('new_password', '<p class="text-danger">', '</p>') ?>
							<div class="input-group <?php echo $error ? 'has-error' : '' ?>">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock">
									</span>
								</span>
								<input type="password" id="new_password" name="new_password" class="form-control" placeholder="New password" />
							</div>
						<?php echo $error; ?>
						</div>

						<!-- Textedit New password confirmation -->
						<div class="form-group">
						<?php $error = form_error('new_passconf', '<p class="text-danger">', '</p>') ?>
							<div class="input-group <?php echo $error ? 'has-error' : '' ?>">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock">
									</span>
								</span>
								<input type="password" id="new_passconf" name="new_passconf" class="form-control" placeholder="New password confirmation" />
							</div>
						<?php echo $error; ?>
						</div>

						<!-- Change button -->
						<button type="submit" class="btn btn-success">Change</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>