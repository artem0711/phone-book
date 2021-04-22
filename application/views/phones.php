<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-success animated bounceIn">
			<div class="panel-heading">
				<h3 class="panel-title text-center">
					<span class="glyphicon glyphicon-earphone"></span>
					My Phones
				</h3>
			</div>
			<div class="panel-body">
				<? $error = $this->session->flashdata('error'); ?>
				<? $success = $this->session->flashdata('success'); ?>
				<? echo $error ? '<div class="alert alert-warning">'.$error.'</div>' : ''; ?>
				<? echo $success ? '<div class="alert alert-success">'.$success.'</div>' : ''; ?>
				<div id="phones">
					<? if (count($phones) > 0): ?>
					<? foreach ($phones as $phone): ?>
					<div class="form-group">
						<div class="input-group" id="group-<? echo $phone->id; ?>">
							<input type="text" class="form-control" id="edit-<? echo $phone->id; ?>" value="<? echo $phone->telephone ?>" readonly />
							<span class="input-group-btn" id="span-<? echo $phone->id; ?>">
								<a class="btn btn-primary" id="<? echo $phone->id; ?>">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="<? echo base_url() . 'contacts/delete/' . $phone->id; ?>" class="btn btn-danger btn-delete" id="del-<? echo $phone->id; ?>">
									<span class="glyphicon glyphicon-remove"></span>
								</a>
							</span>
						</div>
					</div>
					<? endforeach ?>
					<? else: ?>
					<div class="form-group text-center" id="noPhones">
						<h4>No numbers</h4>
					</div>
					<? endif; ?>
					<div class='form-group' id='newPhone' style="display: none">
						<div class='input-group'>
							<input type='text' class='form-control' id='newPhoneEdit' placeholder="Number phone (digit only)" />
							<span class='input-group-btn'>
								<a class='btn btn-success' id='btnOk'>
									<span class='glyphicon glyphicon-ok'></span>
								</a>
								<a class='btn btn-danger' id='btnCancel'>
									<span class='glyphicon glyphicon-remove'></span>
								</a>
							</span>
						</div>
					</div>
				</div>
				<div class="text-center">
					<a class="btn btn-default" id="addPhone">
						<span class="glyphicon glyphicon-plus"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>