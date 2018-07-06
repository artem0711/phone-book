<nav class="navbar navbar-default animated fadeIn">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">
				Contacts
			</a>
		</div>
		<ul class="nav navbar-nav">
			<li <?php echo $this->uri->segment(2) == 'editinfo' ? 'class="active"' : ''; ?>>
				<a href="<?php echo base_url(); ?>contacts/editinfo">Edit My info</a>
			</li>
			<li <?php echo (($this->uri->segment(2) == 'changepassword') ? 'class="active"' : ''); ?>>
				<a href="<?php echo base_url(); ?>contacts/changepassword">Change password</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a>Welcome, <?php echo $user['username']; ?>!</a></li>
		</ul>
	</div>
</nav>