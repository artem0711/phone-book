<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<?php echo form_open(''); ?>
			<div class="col-lg-12 animated bounceIn">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Edit My info</h3>
					</div>
					<div class="panel-body">
						<?php $error = $this->session->flashdata('error'); ?>
						<?php $success = $this->session->flashdata('success'); ?>
						<?php echo $error ? '<div class="alert alert-warning">'.$error.'</div>' : ''; ?>
						<?php echo $success ? '<div class="alert alert-success">'.$success.'</div>' : ''; ?>
						
						<!-- Textedit Full name -->
						<div class="form-group">
						<?php $error = form_error('full_name', '<p class="text-danger">', '</p>') ?>
							<div class="input-group <?php echo $error ? 'has-error' : '' ?>">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
									Full name
								</span>
								<input type="text" id="full_name" name="full_name" class="form-control" placeholder="Full name" value="<?php echo $user['full_name'] ?>" />
							</div>
						<?php echo $error; ?>
						</div>

						<!-- Textedit Date of birth -->
						<div class="form-group">
						<?php $error = form_error('dob', '<p class="text-danger">', '</p>') ?>
							<div class="input-group <?php echo $error ? 'has-error' : '' ?>">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-gift"></span>
									Date of birth
								</span>
								<input type="text" id="dob" name="dob" class="form-control" placeholder="Date of birth" value="<?php echo $user['dob'] ?>" />
							</div>
						<?php echo $error; ?>
						</div>

						<!-- Textedit Position -->
						<div class="form-group">
						<?php $error = form_error('position', '<p class="text-danger">', '</p>') ?>
							<div class="input-group <?php echo $error ? 'has-error' : '' ?>">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-star"></span>
									Position
								</span>
								<input type="text" id="position" name="position" class="form-control" placeholder="Position" value="<?php echo $user['position'] ?>" />
							</div>
						<?php echo $error; ?>
						</div>

						<!-- Save button -->
						<button type="submit" class="btn btn-success">Save</button>
						<a class="btn btn-danger pull-right" href="/">Cancel</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>