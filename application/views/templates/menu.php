<nav class="navbar navbar-default animated fadeIn">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="<? echo base_url(); ?>">
				Contacts
			</a>
		</div>
		<ul class="nav navbar-nav">
			<li <? echo $this->uri->segment(2) == 'editinfo' ? 'class="active"' : ''; ?>>
				<a href="/contacts/editinfo">My Info</a>
			</li>
			<li <? echo $this->uri->segment(2) == 'phones' ? 'class="active"' : ''; ?>>
				<a href="/contacts/phones">My Phones</a>
			</li>
			<li <? echo (($this->uri->segment(2) == 'changepassword') ? 'class="active"' : ''); ?>>
				<a href="/contacts/changepassword">Change password</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<p class="navbar-text">Welcome,
					<? echo $user['username']; ?>!
				</p>
			</li>
		</ul>
	</div>
</nav>