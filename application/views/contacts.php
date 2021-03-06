<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="row">
			<div class="col-sm-8">
				<div class="panel panel-info animated bounceIn">
					<div class="panel-heading">
						<h3 class="panel-title text-center">
							<span class="glyphicon glyphicon-info-sign"></span>
							About me
						</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<td>Fullname</td>
								<td>
									<? echo $user['full_name']; ?>
								</td>
							</tr>
							<tr>
								<td>Date of birth</td>
								<td>
									<? echo $user['dob']; ?>
								</td>
							</tr>
							<tr>
								<td>Position</td>
								<td>
									<? echo $user['position']; ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-success animated bounceIn">
					<div class="panel-heading">
						<h3 class="panel-title text-center">
							<span class="glyphicon glyphicon-earphone"></span>
							My phones
						</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<? if (count($phones) > 0): ?>
							<? foreach ($phones as $phone): ?>
							<tr>
								<td align="center">
									<? echo $phone->telephone; ?>
								</td>
							</tr>
							<? endforeach ?>
							<? else: ?>
							<tr>
								<td align="center">No numbers</td>
							</tr>
							<? endif; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>